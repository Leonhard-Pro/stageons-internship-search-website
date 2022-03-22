<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Stageons ~ offers</title>
    <link rel="stylesheet" href="views/css/MainStyle.css">
    <script src="jquery-3.6.0.min.js"></script>
    <script src=filter.js async></script>
</head>

<?php
include("Documents Html/header.html");
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
        <div class="tab_list">
            <img src="views/resources/icon_google.png" alt="icon" class="icon_tab_list">
            <p>Google, one of the most famous companies in the world, is known for being the biggest IT company in terms of use per day. Bla bla bla, this is a test verse.</p>
        </div>
        <div class="tab_list">
            <img src="views/resources/icon_google.png" alt="icon" class="icon_tab_list">
            <p>Google, one of the most famous companies in the world, is known for being the biggest IT company in terms of use per day. Bla bla bla, this is a test verse.</p>
        </div>
        <div class="tab_list">
            <img src="views/resources/icon_google.png" alt="icon" class="icon_tab_list">
            <p>Google, one of the most famous companies in the world, is known for being the biggest IT company in terms of use per day. Bla bla bla, this is a test verse.</p>
        </div>
        <div class="tab_list">
            <img src="views/resources/icon_google.png" alt="icon" class="icon_tab_list">
            <p>Google, one of the most famous companies in the world, is known for being the biggest IT company in terms of use per day. Bla bla bla, this is a test verse.</p>
        </div>
        <div class="tab_list">
            <img src="views/resources/icon_google.png" alt="icon" class="icon_tab_list">
            <p>Google, one of the most famous companies in the world, is known for being the biggest IT company in terms of use per day. Bla bla bla, this is a test verse.</p>
        </div>
        <!--affichage des offres-->
    </div>

    <div id="offres_more">
        <!--affichage des offres detaillee-->
    </div>

</body>

</html>