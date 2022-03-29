<?php
class Date extends Model {
    
    function create($date) {

        //create date
        $this->table = 'date';
        $this->createWhereNotExists(array(
            'fields' => 'date.Date',
            'fields_dual' => "'$date' as date",
            'conditions' => 'date.Date = temp.date'
        ));
    }
}
?>