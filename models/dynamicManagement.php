<?php

//Is to know which type of management we have to display
if (isset($_POST["typeManagement"])){
    $typeManagement = $_POST["typeManagement"];
    $actionManagement = "";
}
//Is to knwo which action the user want to execute
if (isset($_POST["actionManagement"])){
    $actionManagement = $_POST["actionManagement"];
    $typeManagement = $_POST["typeManagement"];
}

?>