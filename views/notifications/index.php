<?php
require("models/SessionStart.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <?php
    include("views/layout/header.php");
    ?>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stageons ~ offers</title>
    <link rel="stylesheet" href="views/css/MainStyle.css">
    <link rel="stylesheet" href="views/css/header/headerstyles.css">
    <script src="views/js/jquery-3.6.0.min.js"></script>
    <script src="views/js/filter.js" async></script>
    <script src="views/js/header.js" async></script>
</head>

<body>
    <div class="list">
        <?php
        for ($i = 0; $i < 10; $i++) {
            echo ("<div class=\"tab_list\">");
            echo ("<div>");
            echo ("<h3>Notification n°X </h3>");
            echo ("<p>Site maintenance in 5 minutes</p>");
            echo ("</div>");
            echo ("</div>");
        }
        ?>
    </div>

    <div id="notification_more">
        <!--affichage des notification detaillee-->
    </div>

</body>

</html>