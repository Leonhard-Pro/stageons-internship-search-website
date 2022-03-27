<div id="account-box">
    <div id="account-box-informations">
        <h1>Personnal information</h1>

        <input readonly="readonly" type="text" id="Login" value="<?php echo $user['userObject']->getLogin(); ?>">
        <input readonly="readonly" type="password" id="Password" value="<?php echo $user['userObject']->getPassword(); ?>">
        <?php if ($user['userType'] == "Student" || $user['userType'] == "Pilot" || $user['userType'] == "Delegate"): ?>
            <input readonly="readonly" type="text" id="First_name" value="<?php echo $user['userObject']->getFirstName(); ?>">
            <input readonly="readonly" type="text" id="Surname" value="<?php echo $user['userObject']->getName(); ?>">
            <input readonly="readonly" type="text" id="Email" value="<?php echo $user['userObject']->getEmail();?>">
        <?php endif; ?>
        <form action="" method="POST">
            <input type="submit" id="logout" value="Logout" name="logout">
        </form>
    </div>
</div>