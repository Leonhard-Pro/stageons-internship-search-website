<?php
abstract class Person extends User {

    //Protected
    protected $name;
    protected $first_name;
    protected $email;

    //Constructor
    function __construct(int $id, int $id_type, string $login, string $password, array $authorizations, string $name, string $first_name, string $email) {
        $this->setName($name);
        $this->setFirstName($first_name);
        $this->setEmail($email);
        parent::__construct($id, $id_type, $login, $password, $authorizations);
    }

    //Protected function
    protected function setName(string $name) {
        $this->name = $name;
    }

    protected function setFirstName(string $first_name) {
        $this->first_name = $first_name;
    }

    protected function setEmail(string $email) {
        $this->email = $email;
    }

    //Public function
    public function getName() {
        return $this->name;
    }

    public function getFirstName() {
        return $this->first_name;
    }

    public function getEmail() {
        return $this->email;
    }
}