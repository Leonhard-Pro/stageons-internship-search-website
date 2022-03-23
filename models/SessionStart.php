<?php 
require(ROOT.'core/user/User.php');
require(ROOT.'core/user/Person.php');
require(ROOT.'core/user/groups/Administrator.php');
require(ROOT.'core/user/groups/Pilot.php');
require(ROOT.'core/user/groups/Delegate.php');
require(ROOT.'core/user/groups/Student.php');
session_start();
if(isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    $userType = $user->getType();
}
?>