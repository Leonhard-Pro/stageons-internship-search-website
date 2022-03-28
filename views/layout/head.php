<head>
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
    
    <!-- Current Page Part -->
    <link rel="stylesheet" href="<?php echo "views/". $page['pageName'] ."/css/styles.css"; ?>">

    
    <?php if ($page['pageName'] == "login"): ?>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="views/login/js/show_pwrd.js" async></script>
    <?php endif; ?>

    
    <?php if ($page['pageName'] != "login"): ?>
        <!-- Header Part -->
        <link rel="stylesheet" href="views/layout/css/headerstyles.css">
        <script src="views/layout/js/headerBugerMenu.js" async></script>

        <!-- Footer Part -->
        <link rel="stylesheet" href="views/layout/css/footerstyles.css">

    <?php endif; ?>


    
    <?php if ($page['pageName'] != "account" && $page['pageName'] != "login" && $page['pageName'] && "notifications"): ?>
        <!-- Filters Part -->
        <link rel="stylesheet" href="views/layout/css/filterstyles.css">
    <?php endif; ?>

    

    
    <?php if ($page['pageName'] == "account"): ?>
        <!-- Account Part -->
    <?php endif; ?>

    
    <?php if ($page['pageName'] == "advancement"): ?>
        <!-- Advancement Part -->
    <?php endif; ?>

    
    <?php if ($page['pageName'] == "companies"): ?>
        <!-- Companies Part -->
    <?php endif; ?>

    
    <?php if ($page['pageName'] == "login"): ?>
        <!-- Login Part -->
        <link rel="stylesheet" href="views/login/css/cookies_bannerstyles.css">
    <?php endif; ?>

    
    <?php if ($page['pageName'] == "management"): ?>
        <!-- Management Part -->
    
    <?php endif; ?>

    
    <?php if ($page['pageName'] == "notifications"): ?>
        <!-- Notifications Part -->
        
    <?php endif; ?>

    
    <?php if ($page['pageName'] == "offers"): ?>
        <!-- Offers Part -->
    
    <?php endif; ?>

    
    <?php if ($page['pageName'] == "statistic"): ?>
        <!-- Statistic Part -->
    
    <?php endif; ?>

    <!-- Global CSS -->
    <link rel="stylesheet" href="views/layout/css/mainstyles.css">
</head>