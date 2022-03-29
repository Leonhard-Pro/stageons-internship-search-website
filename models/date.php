<?php
class Date extends Model {

    //create date
    function create($date) {
        $this->table = 'date';
        $this->createWhereNotExists(array(
            'fields' => 'date.Date',
            'fields_dual' => "'$date' as date",
            'conditions' => 'date.Date = temp.date'
        ));
    }
}
?>