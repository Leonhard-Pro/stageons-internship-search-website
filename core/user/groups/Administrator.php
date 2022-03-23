<?php 

class Administrator extends User {

    //Constructor
    function __construct(int $id, int $id_type, string $login, string $password, array $authorizations) {
        $this->setType('Administrator');
        $this->setDefaultPage('management');
        parent::__construct($id, $id_type, $login, $password, $authorizations);
    }
}
?>