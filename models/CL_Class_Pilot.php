<?php 

class Class_Pilot{

    //Private
    private $_User_Type = "Class_Pilot";
    private $_Id_User;
    private $_Id_Class_Pilot;
    private $_Name;
    private $_First_Name;
    private $_Email;
    private $_Login;
    private $_Password_Login;
    private $_Authorizations;
    private $_LengthArrayAuthorization = 35;

    //Constructor
    function __construct(int $id_user, int $id_class_pilot, string $name, string $firstname, string $email,  string $login, string $password_login, array $authorization)
    {
        $this->setId_User($id_user);
        $this->setId_Class_Pilot($id_class_pilot);
        $this->setName($name);
        $this->setFirstName($firstname);
        $this->setEmail($email);
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

    protected function getId_User()
    {
        return $this->_Id_User;
    }

    protected function getId_Class_Pilot()
    {
        return $this->_Id_Class_Pilot;
    }

    protected function getName()
    {
        return $this->_Name;
    }

    protected function getFirstName()
    {
        return $this->_First_Name;
    }

    protected function getEmail()
    {
        return $this->_Email;
    }

    protected function getLogin()
    {
        return $this->_Login;
    }

    protected function getPassword_Login()
    {
        return $this->_Password_Login;
    }

    protected function getAuthorization()
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

    protected function setId_Class_Pilot(int $id_class_pilot)
    {
        if ($id_class_pilot > 0)
        {
            $this->_Id_Class_Pilot = $id_class_pilot;
        }
    }

    protected function setName(string $name)
    {
        $this->_Name = $name;
    }

    protected function setFirstName(string $firstname)
    {
        $this->_First_Name = $firstname;
    }

    protected function setEmail(string $email)
    {
        $this->_Email = $email;
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