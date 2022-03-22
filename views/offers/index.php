<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Stageons ~ offers</title>
    <link rel="stylesheet" href="views/css/MainStyle.css">
    <script src="views/js/jquery-3.6.0.min.js"></script>
    <script src="views/js/filter.js" async></script>
</head>


<body>
<?php
include("Documents Html/header.html");
?>
    <div id="Filtres">
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
            <input type="text" id="Date" placeholder="Date of beginning :">
            <input type="text" id="Companies" placeholder="Companies :">
            <input type="text" id="Duration" placeholder="Duration :">
            <br><br>
        </div>
        <div id="Filtre_3" class="Filtre">
            <input type="text" id="Class_concerned" placeholder="Concerned classes :">
            <input type="text" id="Remuneration" placeholder="Remuneration :">
            <input type="text" id="Number_places" placeholder="Number of places :">

        </div>
    </div>
    <div class="list">
        <?php
        for ($i=0; $i<10; $i++)
        {
            echo("<div class=\"tab_list\">");
            //echo("<img src=\"views/resources/icon_google.png\" alt=\"icon\" class=\"icon_tab_list\">");
            echo("<div>");
            echo("<h3>Title of the offer</h3>");
            echo("<p>Google, one of the most famous companies in the world, is known for being the biggest IT company in terms of use per day. Bla bla bla, this is a test verse. We continue, as we want to test responsiveness and any kind of automatic modification.</p>");
            echo("</div>");
            echo("</div>");
        }
        ?>
    </div>

    <div id="offres_more">
        <!--affichage des offres detaillee-->
    </div>

</body>

</html>