<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Stageons ~ offer</title>
    <link rel="stylesheet" href="../Feuilles de styles/style.css">
</head>

<?php
include("header.html");
include("management.php");
?>

<body>

    <input type="text" id="Name" value="Name :">
    <input type="text" id="Date" value="Date :">
    <input type="text" id="Location" value="Location :">
    <input type="button" id="Search" value="Search">

    <br><br>

    <input type="button" id="Create_new_offer" value="Create new offer">

    <div id="offer">
        <!--afficher les offer-->
    </div>

</body>

</html>