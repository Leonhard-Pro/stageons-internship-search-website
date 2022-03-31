<?php
class ManageDelegate extends Model {
    
    //prepare variables needed to user methods from other classes
    var $obj_person;
    var $obj_school;

    function __construct() {
        parent::__construct();
        $this->obj_person = new ManagePerson();
        $this->obj_school = new School();
    }
    
    function create($login, $password, $name, $first_name, $email, $center, $authorizations){

        //create authorization
        $this->table = 'authorization';
        $this->createWhereNotExists(array(
            'fields' => 'authorization.Authorization_Code',
            'fields_dual' => "'$authorizations' as authorizations",
            'conditions' => 'authorization.Authorization_Code = temp.authorizations'
        ));

        //get id authorization
        $this->table = 'authorization';
        $id_auth = $this->find(array(
            'conditions' => "authorization.Authorization_Code = '$authorizations'",
            'fields' => 'authorization.Id_Authorization',
            'order' => 'Id_Authorization ASC '
        ));

        //create person
        $this->obj_person->create($login, $password, $name, $first_name, $email, $id_auth[0]->Id_Authorization);

        //create school
        $this->obj_school->create($center);

        //create delegate
        $this->table = 'delegate';
        $this->createWhereNotExists(array(
            'fields' => 'delegate.Id_Person, delegate.Id_School',
            'fields_dual' => "(SELECT person.Id_Person FROM person LEFT JOIN user ON person.Id_User = user.Id_User WHERE person.Person_Name = '$name' AND person.Person_First_Name = '$first_name' AND person.Person_Email = '$email' AND user.Login = '$login' AND user.Password_Login = '$password') as id_person, (SELECT school.Id_School FROM school WHERE school.Center = '$center') as id_school",
            'conditions' => 'delegate.Id_Person = temp.id_person AND delegate.Id_School = temp.id_school'
        ));
    }

    function select(array $data) {
        $attribut = array(" person.Person_Name ", " person.Person_First_Name ", " school.Center ");
        $firstloop = true;
        $condition = "";

        for ($i = 0; $i < sizeof($data); $i++){
            if ($data[$i] != "") {
                if ($firstloop)
                {
                    $condition = $condition . $attribut[$i]." LIKE '".$data[$i]."%'";
                    $firstloop =! $firstloop;
                }
                else {
                    $condition = $condition . " AND " . $attribut[$i]." LIKE '".$data[$i]."%'";
                }
            }
        }
        if ($condition == ""){
            $condition = " 1=1 ";
        }

        $this->table = " delegate LEFT JOIN person ON delegate.Id_Person = person.Id_Person LEFT JOIN school ON delegate.Id_School = school.Id_School LEFT JOIN user ON person.Id_User = user.Id_User LEFT JOIN authorization ON user.Id_Authorization = authorization.Id_Authorization ";
        $requete = array(
            'conditions' => $condition,
            'order' => ' delegate.Id_Delegate ASC '
        );
        
        return $this->find($requete);
    }

    function edit($id_delegate, $login, $password, $name, $first_name, $email, $center, $authorizations) {
        //create authorization
        $this->table = 'authorization';
        $this->createWhereNotExists(array(
            'fields' => 'authorization.Authorization_Code',
            'fields_dual' => "'$authorizations' as authorizations",
            'conditions' => 'authorization.Authorization_Code = temp.authorizations'
        ));

        $this->table = 'delegate';
        $id_person = $this->find(array(
            'conditions' => "delegate.Id_Delegate = '$id_delegate'",
            'fields' => 'delegate.Id_Person',
            'order' => 'Id_Person ASC '
            ));
        $id_person = $id_person[0]->Id_Person;
        $this->table = 'person';
        $id_user = $this->find(array(
            'conditions' => "person.Id_Person = '$id_person'",
            'fields' => 'person.Id_User',
            'order' => 'Id_User ASC '
            ));
        $id_user = $id_user[0]->Id_User;
        //edit user
        $this->change("UPDATE user SET user.Login = '$login',  user.Password_Login = '$password' WHERE user.Id_User = '$id_user'");

        //edit person
        $this->change("UPDATE person SET person.Person_Name = '$name', person.Person_First_Name = '$first_name', person.Person_Email = '$email' WHERE person.Id_User = '$id_user'");
    
        //create school
        $this->obj_school->create($center);

        //edit delegate
        $this->change("UPDATE delegate SET delegate.Id_Person = (SELECT person.Id_Person FROM person LEFT JOIN user ON person.Id_User = user.Id_User WHERE person.Person_Name = '$name' AND person.Person_First_Name = '$first_name' AND person.Person_Email = '$email' AND user.Login = '$login' AND user.Password_Login = '$password'), delegate.Id_School = (SELECT school.Id_School FROM school WHERE school.Center = '$center') WHERE delegate.Id_Delegate = '$id_delegate'");
    }

    function delete($id_delegate) {

        $this->table = 'delegate';
        $id_person = $this->find(array(
            'conditions' => "delegate.Id_Delegate = '$id_delegate'",
            'fields' => 'delegate.Id_Person',
            'order' => 'Id_Person ASC '
            ));
        $id_person = $id_person[0]->Id_Person;
        $this->table = 'person';
        $id_user = $this->find(array(
            'conditions' => "person.Id_Person = '$id_person'",
            'fields' => 'person.Id_User',
            'order' => 'Id_User ASC '
            ));
        $id_user = $id_user[0]->Id_User;

        //remove delegate
        $this->change("DELETE FROM user WHERE user.Id_User = '$id_user'");
    }
}
?>