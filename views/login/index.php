<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Stageons ~ login</title>
    <link rel="stylesheet" href="views/css/style.css">
    <link rel="stylesheet" href="views/css/cookies_banner.css">
</head>

<body>

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

                <input name="email" type="email" id="email_id" placeholder="Email address"><br><br>
                <input name="pwrd" type="password" id="password" placeholder="Password"><br><br>

                <input type="checkbox" id="keep_signed_in">
                <label>Keep me signed in ?</label>

                <br><br>

                <input type="submit" value="Login">
            </div>

        </div>

        <?php if (!isset($_COOKIE['Cookies']) || $_COOKIE['Cookies'] == false): ?>
            <div class="blurry_background-cookies">

            </div>
            <div class="cookie-handband">
            <div class="cookie-informations">
                <div class="cookie-tag-management">
                <img src="views/resources/logo_cesi_with_text.svg" alt="Logo Cesi" id="logo_cesi-cookies">
                <div class="cookie-title">CE SITE UTILISE LES COOKIES</div>
                <div class="cookies-warning">
                    Nous utilisons des cookies pour personnaliser le contenu et les publicités, pour fournir des fonctionnalités de médias sociaux et pour analyser notre trafic. Nous partageons également des informations sur votre utilisation de notre site avec nos partenaires de médias sociaux, de publicité et d'analyse qui peuvent les combiner avec d'autres informations que vous leur avez fournies ou qu'ils ont collectées à partir de votre utilisation de leurs services. Vous consentez à nos cookies si vous continuez à utiliser notre site web.
                </div>
                </div>

                <div class="cookie-choose">
                    <form action="" method="POST">
                        <button class="button-cookies" type="submit" name="accept-cookies" value="true">Accepter</button>
                    </form>
                </div>
            </div>
            </div>
        <?php endif; ?>
    </form>
</body>

</html>