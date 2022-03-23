<?php 
abstract class User {

    //Protected
    protected $type;
    protected $id;
    protected $id_type;
    protected $login;
    protected $password;
    protected $authorizations = array();
    protected $lengthArrayAuthorization = 35;
    protected $default_page;

    //Constructor
    function __construct(int $id, int $id_type, string $login, string $password, array $authorizations) {
        $this->setId($id);
        $this->setIdType($id_type);
        $this->setLogin($login);
        $this->setPassword($password);
        $this->setAuthorizations($authorizations);
    }

    //Protected function
    protected function setType(string $type) {
        $this->type = $type;
    }

    protected function setId(int $id) {
        if ($id > 0)
        {
            $this->id = $id;
        }
    }

    protected function setIdType(int $id_type) {
        if ($id_type > 0)
        {
            $this->id_type = $id_type;
        }
    }

    protected function setLogin(string $login) {
        $this->login = $login;
    }

    protected function setPassword(string $password) {
        $this->password = $password;
    }

    protected function setAuthorizations(array $authorizations) {
        if (sizeof($authorizations) == $this->lengthArrayAuthorization)
        {
            $this->authorizations = $authorizations;
        }
    }

    protected function setDefaultPage(string $default_page) {
        $this->default_page = $default_page;
    }

    //Public function
    public function getType() {
        return $this->type;
    }

    public function getId() {
        return $this->id;
    }

    public function getIdType() {
        return $this->id_type;
    }

    public function getLogin() {
        return $this->login;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getAuthorizations() {
        return $this->authorizations;
    }

    public function getDefaultPage() {
        return $this->default_page;
    }
}
?>