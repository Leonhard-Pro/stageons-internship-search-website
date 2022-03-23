<?php 

class Student extends Person {

    //Constructor
    function __construct(int $id, int $id_type, string $login, string $password, array $authorizations, string $name, string $first_name, string $email) {
        $this->setType("Student");
        $this->setDefaultPage('offers');
        parent::__construct($id, $id_type, $login, $password, $authorizations, $name, $first_name, $email);
    }
}
?>