<div id="account-box">
    <div id="account-box-informations">
        <h1>Personal information</h1>

        <label for="login">Login:</label>
        <input readonly="readonly" type="text" id="login" value="<?php echo $user['userObject']->getLogin(); ?>">
            <label for="account_password">Password:</label>
        <div id="account_password">
            <input readonly="readonly" type="password" id="password" value="<?php echo $user['userObject']->getPassword(); ?>">
            <i id="eye" class="fa fa-eye showpwd" onClick="showPwd('password', this)"></i>
        </div>
        <?php if ($user['userType'] == "Student" || $user['userType'] == "Pilot" || $user['userType'] == "Delegate"): ?>
            <label for="First_name">First name:</label>
            <input readonly="readonly" type="text" id="First_name" value="<?php echo $user['userObject']->getFirstName(); ?>">
            <label for="Surname">Last name:</label>
            <input readonly="readonly" type="text" id="Surname" value="<?php echo $user['userObject']->getName(); ?>">
            <label for="Email">Email adress:</label>
            <input readonly="readonly" type="text" id="Email" value="<?php echo $user['userObject']->getEmail();?>">
        <?php endif; ?>
        <form action="" method="POST">
            <input type="submit" id="logout" value="Logout" name="logout">
        </form>
    </div>
</div>