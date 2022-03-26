<?php 
require("models/SessionStart.php");
?>

<!DOCTYPE html>
<html lang="en">

<meta name="description" content="This is the liste of offers">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stageons ~ offers</title>
    <link rel="stylesheet" href="views\layout\css\headerstyles.css">
    <link rel="stylesheet" href="views\layout\css\filtresstyles.css">
    <link rel="stylesheet" href="views\layout\css\mainstyles.css">
    <link rel="stylesheet" href="views\offers\css\offersstyles.css">    
    <script src="views\layout\js\jquery-3.6.0.min.js"></script>
    <script src="views\layout\js\filter.js" async></script>
    <script src="views\layout\js\header.js" async></script>
</head>

<body>
    <?php
        include("views/layout/header.php");
        include("views/layout/filters.php");
    ?>
    <div class="list">
        <?php
        for ($i=0; $i<10; $i++)
        {
            echo("<div class=\"tab_list\">");
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