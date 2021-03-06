
<form method="post" id="form_signin">
    <div id="login_left">
        <div>
            <img src="views/resources/logo_cesi_with_text.svg" alt="Logo Cesi" id="logo_cesi">
            <h1>WELCOME TO STAGEONS</h1>
            <h3>The digital internship search environment is accessible to students, pilots, and delegates belonging
                to
                CESI
            </h3>
        </div>
    </div>

    <div id="login_right">
        <div id="text_login">
            <img src="views/resources/logo_cesi_with_text_black.png" alt="Logo Cesi" id="hidden_logo_cesi">
            <h1>LOGIN</h1>

            <h3 class="Error"><?php echo $login['error']; ?></h3>

            <input name="email" type="email" id="email_id" placeholder="Email address" required><br><br>
            <div id="login_password">
                <input name="pwrd" type="password" id="password" placeholder="Password" required>
                <i id="eye" class="fa fa-eye showpwd" onClick="showPwd('password', this)"></i>
            </div><br><br>
            

            <input type="checkbox" id="keep_signed_in">
            <label for="keep_signed_in">Keep me signed in ?</label>

            <br><br>

            <input type="submit" value="Login">
        </div>

    </div>
</form>
<?php if (!isset($_COOKIE['Cookies']) || $_COOKIE['Cookies'] == false): ?>
<div class="blurry_background-cookies"></div>
<div class="cookie-handband">
    <div class="cookie-informations">
        <div class="cookie-tag-management">
            <img src="views/resources/logo_cesi_with_text.svg" alt="Logo Cesi" id="logo_cesi-cookies">
            <div class="cookie-title">THIS SITE USES COOKIES</div>
            <div class="cookies-warning">
            We use cookies to personalize content and advertisements, to provide social media features and to analyze our traffic. We also share information about your use of our site with our social media, advertising and analytics partners who may combine it with other information that you have provided to them or that they have collected from your use of their services. You consent to our cookies if you continue to use our website.
            </div>
        </div>
        <div class="cookie-choose">
            <form action="" method="POST">
                <button class="button-cookies" type="submit" name="accept-cookies" value="">Accept</button>
            </form>
        </div>
    </div>
</div>
<?php endif; ?>
