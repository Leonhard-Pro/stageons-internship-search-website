<?php require_once('models/SessionStart.php'); require_once('models/SessionStop.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Stageons ~ myaccount</title>
    <link rel="stylesheet" href="views/css/myaccountstyles.css">
    <link rel="stylesheet" href="views/css/header/headerstyles.css">
    <script src="views/js/header.js" async></script>
</head>

<body>
    <?php
        include("views/layout/header.php");
    ?>
    <div id="account-box">
        <div id="account-box-informations">
            <h3>Personnal information</h3>
            <input readonly="readonly" type="text" id="Login" value="<?php echo $user->getLogin(); ?>">
            <input readonly="readonly" type="password" id="Password" value="<?php echo $user->getPassword(); ?>">
            <?php if ($userType == "Student" || $userType == "Pilot" || $userType == "Delegate"): ?>
                <input readonly="readonly" type="text" id="First_name" value="<?php echo $user->getFirstName(); ?>">
                <input readonly="readonly" type="text" id="Surname" value="<?php echo $user->getName(); ?>">
                <input readonly="readonly" type="text" id="Email" value="<?php echo $user->getEmail();?>">
            <?php endif; ?>
            <form action="" method="POST">
                <input type="submit" id="logout" value="Logout" name="logout">
            </form>
        </div>
    </div>
</body>

</html>