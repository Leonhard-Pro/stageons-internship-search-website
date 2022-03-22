<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Stageons ~ offers</title>
    <link rel="stylesheet" href="../Feuilles de styles/MainStyle.css">
    <script src="jquery-3.6.0.min.js"></script>
    <script src=filter.js async></script>
</head>

<?php
include("header.html");
?>

<body>
    <div id="Filtre_1" class="Filtre">
        <input type="text" id="What" placeholder="What :">
        <input type="text" id="Where" placeholder="Where :">
        <div id="bouton">
            <input type="button" id="Search" value="Search">
        </div>
        <div id=Icon_filtre onclick="Show_all()"></div>
        <div id=Icon_barre onclick="Show_all()"></div>
    </div>
    <div id="Filtre_2" class="Filtre">
        <input type="text" id="Skills" placeholder="Skills :">
        <input type="text" id="Date" placeholder="Date :">
        <input type="text" id="Companies" placeholder="Companies :">
        <input type="text" id="Duration" placeholder="Duration :">
        <br><br>
    </div>
    <div id="Filtre_3" class="Filtre">
        <input type="text" id="Class_concerned" placeholder="Class concerned :">
        <input type="text" id="Remuneration" placeholder="Remuneration :">
        <input type="text" id="Number_places" placeholder="Number places :">

    </div>

    <div class="list">
        <!--affichage des offres-->
    </div>

    <div id="offres_more">
        <!--affichage des offres detaillee-->
    </div>

</body>

</html>