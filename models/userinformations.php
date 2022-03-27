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
class userinformations extends Model {

    function getUserInformation(){
        return array('userObject'=> $_SESSION['user'], 'userType'=>$_SESSION['user']->getType(), 'userAuthorization'=>$_SESSION['user']->getAuthorizations());
    }


}

?>