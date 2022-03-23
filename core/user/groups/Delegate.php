<?php 

class Delegate extends Person {

    //Constructor
    function __construct(int $id, int $id_type, string $login, string $password, array $authorizations, string $name, string $first_name, string $email) {
        $this->setType("Delegate");
        $this->setDefaultPage('management');
        parent::__construct($id, $id_type, $login, $password, $authorizations, $name, $first_name, $email);
    }
}
?>