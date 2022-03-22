<?php 

class Administrator{

    //Private
    private $_User_Type = "Administrator";
    private $_Id_User;
    private $_Id_Administrator;
    private $_Login;
    private $_Password_Login;
    private $_Authorizations;
    private $_LengthArrayAuthorization = 35;

    //Constructor
    function __construct(int $id_user, int $id_administrator, string $login, string $password_login, array $authorization)
    {
        $this->setId_User($id_user);
        $this->setId_Administrator($id_administrator);
        $this->setLogin($login);
        $this->setPassword_Login($password_login);
        $this->setAuthorization($authorization);
    }
    //Public

    //Protected
    public function getUserType()
    {
        return $this->_User_Type;
    }

    public function getId_User()
    {
        return $this->_Id_User;
    }

    public function getId_Administrator()
    {
        return $this->_Id_Administrator;
    }

    public function getLogin()
    {
        return $this->_Login;
    }

    public function getPassword_Login()
    {
        return $this->_Password_Login;
    }

    public function getAuthorization()
    {
        return $this->_Authorizations;
    }

    protected function setId_User(int $id_user)
    {
        if ($id_user > 0)
        {
            $this->_Id_User = $id_user;
        }
    }

    protected function setId_Administrator(int $id_administrator)
    {
        if ($id_administrator > 0)
        {
            $this->_Id_Administrator = $id_administrator;
        }
    }

    protected function setLogin(string $login)
    {
        $this->_Login = $login;
    }

    protected function setPassword_Login(string $password_login)
    {
        $this->_Password_Login = $password_login;
    }

    protected function setAuthorization(array $authorization)
    {
        if (sizeof($authorization) == $this->_LengthArrayAuthorization)
        {
            $this->_Authorizations = $authorization;
        }
    }
}


?>