<?php 
require("models/CL_Administrator.php");
require("models/CL_Class_Pilot.php");
require("models/CL_Delegate.php");
require("models/CL_Student.php");
session_start();
$user = $_SESSION['user'];
?>