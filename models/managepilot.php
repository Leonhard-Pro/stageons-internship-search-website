<?php
class ManagePilot extends Model {
    

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


    function create(){
        //TODO
    }
}
?>