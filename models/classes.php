<?php
class Classes extends Model {

    function create($class){
        //create class
        $this->table = 'class';
        $this->createWhereNotExists(array(
            'fields' => 'class.Class',
            'fields_dual' => "'$class' as class",
            'conditions' => 'class.Class = temp.class'
        ));
    }
}
?>