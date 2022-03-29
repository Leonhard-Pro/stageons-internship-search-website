<?php 
    require('core/user/User.php');
    require('core/user/Person.php');
    require('core/user/groups/Administrator.php');
    require('core/user/groups/Pilot.php');
    require('core/user/groups/Delegate.php');
    require('core/user/groups/Student.php');
    require('models/convertStringToBinaryArray.php');
?>

<?php
session_start();
class UserLogin extends Model {
    
    var $table = 'user';

    function loginExist($login) {

        $user = $this->find(array(
            'conditions' => "Login = '$login'",
            'order' => 'Id_User ASC'
        ));

        if($user != false) {
            return $user->Id_User;
        } else {
            return -1;
        }
    }

    function getInfos($login, $pwrd) {
        $id_user = $this->loginExist($login);

        if($id_user == -1) return -1;

        $user = $this->find(array(
            'conditions' => "Login = '$login' AND Password_Login = '$pwrd'",
            'order' => 'Id_User ASC'
        ));
        if($user == false) {
            return -2;
        }

        $user = $this->getUserObject($login, $pwrd);
        if($user instanceof User){
            $_SESSION['user'] = $user;
        }
        

        return $user;
    }

    function getAdminObject($id_user) {

        $this->table = ' administrator LEFT JOIN user ON administrator.Id_User = user.Id_User LEFT JOIN authorization ON user.Id_Authorization = authorization.Id_Authorization ';

        $user = $this->find(array(
            'conditions' => " administrator.Id_User = ". $id_user ." ",
            'fields' => ' administrator.Id_Administrator, user.Id_User, user.Login, user.Password_Login, authorization.Authorization_Code ',
            'order' => ' Id_Administrator ASC '
        ));

        if($user == false) return false;

        $authorizations = convertStringToBinaryArray($user->Authorization_Code);
        $administrator = new Administrator($user->Id_User, $user->Id_Administrator, $user->Login, $user->Password_Login, $authorizations);

        return $administrator;
    }

    function getPilotObject($id_user) {

        $this->table = 'class_pilot LEFT JOIN person ON class_pilot.Id_Person = person.Id_Person LEFT JOIN user ON person.Id_User = user.Id_User LEFT JOIN authorization ON user.Id_Authorization = authorization.Id_Authorization';
 
        $user = $this->find(array(
            'conditions' => "person.Id_User = ". $id_user."",
            'fields' => 'class_pilot.Id_Class_Pilot, person.Person_Name, person.Person_First_Name, person.Person_Email, user.Id_User, user.Login, user.Password_Login, authorization.Authorization_Code',
            'order' => 'Id_Class_Pilot ASC'
        ));
        if($user == false) return false;

        $authorizations = convertStringToBinaryArray($user->Authorization_Code);
        $pilot = new Pilot($user->Id_User, $user->Id_Class_Pilot, $user->Login, $user->Password_Login, $authorizations, $user->Person_Name, $user->Person_First_Name, $user->Person_Email);

        return $pilot;
    }

    function getDelegateObject($id_user) {

        $this->table = 'delegate LEFT JOIN person ON delegate.Id_Person = person.Id_Person LEFT JOIN user ON person.Id_User = user.Id_User LEFT JOIN authorization ON user.Id_Authorization = authorization.Id_Authorization';
 
        $user = $this->find(array(
            'conditions' => "person.Id_User = ". $id_user ."",
            'fields' => 'delegate.Id_Delegate, person.Person_Name, person.Person_First_Name, person.Person_Email, user.Id_User, user.Login, user.Password_Login, authorization.Authorization_Code',
            'order' => 'Id_Delegate ASC'
        ));
        if($user == false) return false;

        $authorizations = convertStringToBinaryArray($user->Authorization_Code);
        $delegate = new Delegate($user->Id_User, $user->Id_Delegate, $user->Login, $user->Password_Login, $authorizations, $user->Person_Name, $user->Person_First_Name, $user->Person_Email);

        return $delegate;
    }

    function getStudentObject($id_user) {

        $this->table = 'student LEFT JOIN person ON student.Id_Person = person.Id_Person LEFT JOIN user ON person.Id_User = user.Id_User LEFT JOIN authorization ON user.Id_Authorization = authorization.Id_Authorization';
 
        $user = $this->find(array(
            'conditions' => "person.Id_User = ". $id_user ."",
            'fields' => 'student.Id_Student, person.Person_Name, person.Person_First_Name, person.Person_Email, user.Id_User, user.Login, user.Password_Login, authorization.Authorization_Code',
            'order' => 'Id_Student ASC'
        ));
        if($user == false) return false;

        $authorizations = convertStringToBinaryArray($user->Authorization_Code);
        $student = new Student($user->Id_User, $user->Id_Student, $user->Login, $user->Password_Login, $authorizations, $user->Person_Name, $user->Person_First_Name, $user->Person_Email);

        return $student;
    }

    function getUserObject($login, $pwrd) {

        $user = $this->find(array(
            'conditions' => "Login = '$login' AND Password_Login = '$pwrd'",
            'order' => 'Id_User ASC'
        ));
        
        $id_user = $user->Id_User;
        echo $id_user;
        
        
        $userObject = $this->getAdminObject($id_user);
        if ($userObject != false) return $userObject;
        
        $userObject = $this->getPilotObject($id_user);
        if ($userObject != false) return $userObject;

        $userObject = $this->getDelegateObject($id_user);
        if ($userObject != false) return $userObject;

        $userObject = $this->getStudentObject($id_user);
        if ($userObject == false) return -3;
        
        $this->table = 'user'; //reset the table to user table
 

        return $userObject;
    }
}
?>