<?php 

class Student{

    //Private
    private $_User_Type = "Student";
    private $_Id_User;
    private $_Id_Student;
    private $_Name;
    private $_First_Name;
    private $_Email;
    private $_Login;
    private $_Password_Login;
    private $_Authorizations;
    private $_LengthArrayAuthorization = 35;

    //Constructor
    function __construct(int $id_user, int $id_student, string $name, string $firstname, string $email,  string $login, string $password_login, array $authorization)
    {
        $this->setId_User($id_user);
        $this->setId_Student($id_student);
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

    public function getId_User()
    {
        return $this->_Id_User;
    }

    public function getId_Student()
    {
        return $this->_Id_Student;
    }

    public function getName()
    {
        return $this->_Name;
    }

    public function getFirstName()
    {
        return $this->_First_Name;
    }

    public function getEmail()
    {
        return $this->_Email;
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

    protected function setId_Student(int $id_student)
    {
        if ($id_student > 0)
        {
            $this->_Id_Delegate = $id_student;
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