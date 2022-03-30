<?php
class ManageStudent extends Model {

    //prepare variables needed to user methods from other classes
    var $obj_person;
    var $obj_school;
    var $obj_class;

    function __construct() {
        parent::__construct();
        $this->obj_person = new ManagePerson();
        $this->obj_school = new School();
        $this->obj_class = new Classes();
    }
    
    function create($login, $password, $name, $first_name, $email, $center, $class){

        //create person
        $this->obj_person->create($login, $password, $name, $first_name, $email, 3);

        //create school
        $this->obj_school->create($center);

        //create class
        $this->obj_class->create($class);

        //create student
        $this->table = 'student';
        $this->createWhereNotExists(array(
            'fields' => 'student.Id_Person, student.Id_School, student.Id_Class',
            'fields_dual' => "(SELECT person.Id_Person FROM person LEFT JOIN user ON person.Id_User = user.Id_User WHERE person.Person_Name = '$name' AND person.Person_First_Name = '$first_name' AND person.Person_Email = '$email' AND user.Login = '$login' AND user.Password_Login = '$password') as id_person, (SELECT school.Id_School FROM school WHERE school.Center = '$center') as id_school, (SELECT class.Id_Class FROM class WHERE class.Class = '$class') as id_class",
            'conditions' => 'student.Id_Person = temp.id_person AND student.Id_School = temp.id_school AND student.Id_Class = temp.id_class'
        ));
    }
    
    function select(array $data) {
        $attribut = array(" person.Person_Name ", " person.Person_First_Name ", " school.Center ", " class.Class ");
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

        $this->table = " student LEFT JOIN person ON student.Id_Person = person.Id_Person LEFT JOIN school ON student.Id_School = school.Id_School LEFT JOIN class ON student.Id_Class = class.Id_Class LEFT JOIN user ON person.Id_User = user.Id_User LEFT JOIN authorization ON user.Id_Authorization = authorization.Id_Authorization ";
        $requete = array(
            'conditions' => $condition,
            'order' => ' student.Id_Student ASC '
        );
        
        return $this->find($requete);
    }
}
?>