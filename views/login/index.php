<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Stageons ~ login</title>
    <link rel="stylesheet" href="views/css/style.css">
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

                <input type="email" id="email_id" placeholder="Email address"><br><br>
                <input type="password" id="password" placeholder="Password"><br><br>

                <input type="checkbox" id="keep_signed_in">
                <label>Keep me signed in ?</label>

                <br><br>

                <input type="submit" value="Login">
            </div>

        </div>
    </form>
</body>

</html>