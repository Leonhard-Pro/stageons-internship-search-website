<?php
class ManagePilot extends Model {
    
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
    
    function create($login, $password, $name, $first_name, $email, $center, $classes){

        //create person
        $this->obj_person->create($login, $password, $name, $first_name, $email, 2);

        //create school
        $this->obj_school->create($center);

        //create pilot
        $this->table = 'class_pilot';
        $this->createWhereNotExists(array(
            'fields' => 'class_pilot.Id_Person, class_pilot.Id_School',
            'fields_dual' => "(SELECT person.Id_Person FROM person LEFT JOIN user ON person.Id_User = user.Id_User WHERE person.Person_Name = '$name' AND person.Person_First_Name = '$first_name' AND person.Person_Email = '$email' AND user.Login = '$login' AND user.Password_Login = '$password') as id_person, (SELECT school.Id_School FROM school WHERE school.Center = '$center') as id_school",
            'conditions' => 'class_pilot.Id_Person = temp.id_person AND class_pilot.Id_School = temp.id_school'
        ));

        foreach ($classes as $class) {
        
            //create class
            $this->obj_class->create($class);

            //include classes
            $this->table = 'belongs_3';
            $this->createWhereNotExists(array(
                'fields' => 'belongs_3.Id_Class, belongs_3.Id_Class_Pilot',
                'fields_dual' => "(SELECT class.Id_Class FROM class WHERE class.Class = '$class') as id_class, (SELECT class_pilot.Id_Class_Pilot FROM class_pilot LEFT JOIN person ON class_pilot.Id_Person = person.Id_Person LEFT JOIN user ON person.Id_User = user.Id_User WHERE person.Person_Name = '$name' AND person.Person_First_Name = '$first_name' AND person.Person_Email = '$email' AND user.Login = '$login' AND user.Password_Login = '$password') as id_class_pilot",
                'conditions' => 'belongs_3.Id_Class = temp.id_class AND belongs_3.Id_Class_Pilot = temp.id_class_pilot'
            ));
        }
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

        $this->table = " class_pilot LEFT JOIN person ON class_pilot.Id_Person = person.Id_Person LEFT JOIN school ON class_pilot.Id_School = school.Id_School RIGHT JOIN belongs_3 ON class_pilot.Id_Class_Pilot = belongs_3.Id_Class_Pilot LEFT JOIN class ON belongs_3.Id_Class = class.Id_Class LEFT JOIN user ON person.Id_User = user.Id_User LEFT JOIN authorization ON user.Id_Authorization = authorization.Id_Authorization ";
        $requete = array(
            'conditions' => $condition,
            'order' => ' class_pilot.Id_Class_Pilot ASC '
        );
        
        return $this->find($requete);
    }
}
?>