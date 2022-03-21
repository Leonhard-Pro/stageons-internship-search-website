<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Stageons ~ companies</title>
    <link rel="stylesheet" href="../Feuilles de styles/MainStyle.css">
</head>

<?php
include("header.html");
?>

<body>
    <div id="Filtre_1">
        <input type="text" id="What" placeholder="What :">
        <input type="text" id="Where" placeholder="Where :">
        <div id="bouton">
            <input type="button" id="Search" value="Search">
        </div>
        <div id=Icon_filtre></div>
    </div>
    <div id="Filtre_2">
        <input type="text" id="Domain_Activity" placeholder="Domain Activity :">
        <input type="text" id="Number_of_CESI_trainees" placeholder="Number_of_CESI_trainees :">
        <input type="text" id="Confidence" placeholder="Confidence :">
        <input type="text" id="Evaluation_of_trainees" placeholder="Evaluation_of_trainees :">
    </div>
    <div class="list">
        <!--affichage des companies-->
    </div>

    <div id="companies_more">
        <!--affichage des companies detaillee-->
    </div>

</body>

</html>