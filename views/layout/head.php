<head>
    <!DOCTYPE html>
    <html lang="en">
    <meta charset="utf-8">
    <meta content="ie=edge" http-equiv="x-ua-compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <title>Stageons-<?php echo $page['pageName']; ?></title>
    <meta name="author" content="Stageons CESI">
    <meta name="description" content="CESI continues its societal mission by allowing its students to find an internship more easily through their new website Stageons!">
    <meta name="keywords" content="internship search, Stageons, CESI, cesi, internships, internship search engine, internship listings, find internships, career, work, job">

    <meta property="og:title" content="<?php echo $page['pageName']; ?>">
    <meta property="og:type" content="website">
    <meta property="og:description" content="CESI continues its societal mission by allowing its students to find an internship more easily through their new website Stageons!">
    <meta property="og:image" content="views/resources/logo_cesi_with_text_black.png">

    <!-- Global CSS -->
    <link rel="stylesheet" href="views/layout/css/mainstyles.css">
    <script src="views/layout/js/jquery-3.6.0.min.js" async></script>

    <!-- Current Page Part -->
    <link rel="stylesheet" href="<?php echo "views/" . $page['pageName'] . "/css/styles.css"; ?>">


    <?php if ($page['pageName'] != "login") : ?>
        <!-- Header Part -->
        <link rel="stylesheet" href="views/layout/css/headerstyles.css">
        <script src="views/layout/js/headerBugerMenu.js" async></script>

        <!-- Footer Part -->
        <link rel="stylesheet" href="views/layout/css/footerstyles.css">

    <?php endif; ?>



    <?php if ($page['pageName'] != "account" && $page['pageName'] != "login" && $page['pageName'] && "notifications") : ?>
        <!-- Filters Part -->
        <link rel="stylesheet" href="views/layout/css/filterstyles.css">
        <script src="views/layout/js/filter.js" async></script>
    <?php endif; ?>

    <?php

    switch ($page['pageName']) {

        case "account": ?>
            <!-- Account Part -->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <script src="views/layout/js/show_pwrd.js" async></script>

            <link rel="manifest" href="manifest.json">
            <script src="js.js"></script>

        <?php break;

        case "advancement": ?>
            <!-- Advancement Part -->

            <link rel="manifest" href="manifest.json">
            <script src="js.js"></script>

        <?php break;

        case "companies": ?>
            <!-- Companies Part -->

            <link rel="manifest" href="manifest.json">
            <script src="js.js"></script>

        <?php break;

        case "login": ?>
            <!-- Login Part -->
            <link rel="stylesheet" href="views/login/css/cookies_bannerstyles.css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <script src="views/layout/js/show_pwrd.js" async></script>

            <link rel="manifest" href="manifest.json">
            <script src="js.js"></script>

        <?php break;

        case "management": ?>
            <!-- Management Part -->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <script src="views/management/js/find_address.js"></script>
            <script src="views/layout/js/show_pwrd.js" async></script>

            <link rel="manifest" href="manifest.json">
            <script src="js.js"></script>

        <?php break;

        case "notifications": ?>
            <!-- Notifications Part -->

            <link rel="manifest" href="manifest.json">
            <script src="js.js"></script>

        <?php break;

        case "offers": ?>
            <!-- Offers Part -->
            <script src="views/layout/js/jquery-3.6.0.min.js"></script>
            <script src="views/offers/js/infoList.js"></script>

            <link rel="manifest" href="manifest.json">
            <script src="js.js"></script>

        <?php break;

        case "statistic": ?>
            <!-- Statistic Part -->

            <link rel="manifest" href="manifest.json">
            <script src="js.js"></script>

    <?php break;
    } ?>


</head>