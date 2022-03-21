<?php
class UserLogin extends Model {
    
    var $table = 'pilote';

    function getUserById($id = 1) {
        return $this->find(array(
            'order' => 'NoPil DESC'
        ));
    }
}
?>