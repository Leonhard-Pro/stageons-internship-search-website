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
        $this->obj_person->create($login, $password, $name, $first_name, $email, $id_auth->Id_Authorization);

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
}
?>