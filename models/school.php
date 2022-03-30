<?php
class School extends Model {

    function create($center){

        //create school
        $this->table = 'school';
        $this->createWhereNotExists(array(
            'fields' => 'school.Center',
            'fields_dual' => "'$center' as center",
            'conditions' => 'school.Center = temp.center'
        ));
    }
}
?>