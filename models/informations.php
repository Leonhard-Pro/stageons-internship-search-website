<?php 
    require_once('core/user/User.php');
    require_once('core/user/Person.php');
    require_once('core/user/groups/Administrator.php');
    require_once('core/user/groups/Pilot.php');
    require_once('core/user/groups/Delegate.php');
    require_once('core/user/groups/Student.php');
    require_once('models/convertStringToBinaryArray.php');
?>

<?php 
session_start();
class informations extends Model {

    function getUserInformation(){

        $data = array('userObject' => $_SESSION['user'], 
                        'userType' => $_SESSION['user']->getType(), 
                        'userAuthorization' => $_SESSION['user']->getAuthorizations()
                    );
        return $data;
    }

    function getInformationById(int $i){

        $data = $_SESSION['informationOffer'][$i];
        return $data;
    }

    function verifyUserSet(){

        var_dump($_SESSION['userObject']);
        var_dump(isset($_SESSION['userObject']));
        if(isset($_SESSION['userObject'])){
            return true;
        }
        return false;
    }

}

?>