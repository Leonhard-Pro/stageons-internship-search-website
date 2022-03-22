<?php 
    require 'CL_Administrator.php';
    require 'CL_Class_Pilot.php';
    require 'CL_Delegate.php';
    require 'CL_Student.php';

    require 'convertStringToBinaryArray.php'
?>

<?php
session_start();

$query = $db->prepare("SELECT COUNT(user.Id_User) FROM user WHERE user.Login = ". $_POST['Login'] ." AND user.Password_Login = ". $_POST['Password'] ."");
$query->execute();

$result = $query->fetch()[0];
if ($result > 0)
{
    $query = $db->prepare("SELECT user.Id_User FROM user WHERE user.Login = ". $_POST['Login'] ." AND user.Password_Login = ". $_POST['Password'] ."");
    $query->execute();
    $idUser = $query->fetch()[0];

    //For Administrator
    $query = $db->prepare("SELECT COUNT(administrator.Id_Administrator) FROM administrator WHERE administrator.Id_User = ". $idUser ."");
    $query->execute();
    $result = $query->fetch()[0];
    if ($result > 0)
    {
        $query = $db->prepare("SELECT administrator.Id_Administrator, user.Login, user.Password_Login, authorization.Authorization_Code  FROM administrator LEFT JOIN user ON administrator.Id_User = user.Id_User LEFT JOIN authorization ON user.Id_Authorization = authorization.Id_Authorization WHERE administrator.Id_User = ". $idUser ."");
        $query->execute();
        $result = $query->fetch()[0];
        $authorizations = convertStringToBinaryArray($result[3]);
        $administrator = new Administrator($idUser, $result[0], $result[1], $result[2], $authorizations);
        $_SESSION['user'] = $administrator;
    }

    //For Class Pilot
    $query = $db->prepare("SELECT COUNT(class_pilot.Id_Class_Pilot) FROM class_pilot LEFT JOIN person ON class_pilot.Id_Person = person.Id_Person WHERE person.Id_User = ". $idUser ."");
    $query->execute();
    $result = $query->fetch()[0];
    if ($result > 0)
    {
        $query = $db->prepare("SELECT class_pilot.Id_Class_Pilot, person.Person_Name, person.Person_First_Name, person.Email, user.Login, user.Password_Login, authorization.Authorization_Code  FROM class_pilot LEFT JOIN person ON class_pilot.Id_Person = person.Id_Person LEFT JOIN user ON person.Id_User = user.Id_User LEFT JOIN authorization ON user.Id_Authorization = authorization.Id_Authorization WHERE person.Id_User = ". $idUser ."");
        $query->execute();
        $result = $query->fetch()[0];
        $authorizations = convertStringToBinaryArray($result[6]);
        $pilot = new Class_Pilot($idUser, $result[0], $result[1], $result[2], $result[3], $result[4], $result[5], $authorizations);
        $_SESSION['user'] = $pilot;
    }

    //For Delegates
    $query = $db->prepare("SELECT COUNT(delegate.Id_Delegate) FROM delegate LEFT JOIN person ON delegate.Id_Person = person.Id_Person WHERE person.Id_User = ". $idUser ."");
    $query->execute();
    $result = $query->fetch()[0];
    if ($result > 0)
    {
        $query = $db->prepare("SELECT delegate.Id_Class_Pilot, person.Person_Name, person.Person_First_Name, person.Email, user.Login, user.Password_Login, authorization.Authorization_Code  FROM delegate LEFT JOIN person ON delegate.Id_Person = person.Id_Person LEFT JOIN user ON person.Id_User = user.Id_User LEFT JOIN authorization ON user.Id_Authorization = authorization.Id_Authorization WHERE person.Id_User = ". $idUser ."");
        $query->execute();
        $result = $query->fetch()[0];
        $authorizations = convertStringToBinaryArray($result[6]);
        $delegate = new Delegate($idUser, $result[0], $result[1], $result[2], $result[3], $result[4], $result[5], $authorizations);
        $_SESSION['user'] = $delegate;
    }

    //For Delegates
    $query = $db->prepare("SELECT COUNT(student.Id_Student) FROM student LEFT JOIN person ON student.Id_Person = person.Id_Person WHERE person.Id_User = ". $idUser ."");
    $query->execute();
    $result = $query->fetch()[0];
    if ($result > 0)
    {
        $query = $db->prepare("SELECT student.Id_Student, person.Person_Name, person.Person_First_Name, person.Email, user.Login, user.Password_Login, authorization.Authorization_Code  FROM student LEFT JOIN person ON student.Id_Person = person.Id_Person LEFT JOIN user ON person.Id_User = user.Id_User LEFT JOIN authorization ON user.Id_Authorization = authorization.Id_Authorization WHERE person.Id_User = ". $idUser ."");
        $query->execute();
        $result = $query->fetch()[0];
        $authorizations = convertStringToBinaryArray($result[6]);
        $student = new Student($idUser, $result[0], $result[1], $result[2], $result[3], $result[4], $result[5], $authorizations);
        $_SESSION['user'] = $student;
    }

    
}

?>