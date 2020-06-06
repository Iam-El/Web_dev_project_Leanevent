<?php

header('Content-Type: text/html; charset=utf-8');
header('Content-Type: text/html; charset=ISO-8859-1');
include '../backend/login.php';
include '../backend/password-recover.php'

?>
<html>
<head>
    <title>LEANEVENTO Foundation</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="./css/leanevent.css">
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"
          integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <script type="text/javascript" src="index.js"></script>
</head>
<body id="wrapper">

<header>
    <div class="header-content">
        <button class="header-button fas fa-bars" onclick=homepage_mobile_menu(event)></button>
        <div class="logo">
            <img id="header-logo" src="./image/logo-blanco.png">
            <h3 id="header-logo-text">LEANVENTOS</h3>
        </div>
        <div class="menu">
            <nav class="nav-bar">
                <ul>
                    <li class="link active"><a href="lean-home-page.php">Inicio</a></li>
                    <li class="link"><a href="lean-about-us-page.php">Quienes Somos</a></li>
                    <li class="link"><a href="http://emf2253.uta.cloud/Fernandes_Leanevent/">Blog</a></li>
                    <li class="link"><a href="lean-register-page.php">Reg&#237strate</a></li>
                    <li class="link"><a href="lean-contact-us.php">Contacto</a></li>
                    <li class="link"><a href="lean-login-page.php">Inciar Sesi&#243n</a></li>
                    <li class="link"><a href="lean-buy-from-us.php">Comprar Boletos</a></li>
                </ul>
            </nav>
        </div>
    </div>
</header>

<div class="mainpage lean-login-page">
    <div class="banner-image-wrapper">
        <div class="banner-image-overlay-text">
            <h2 id="banner-image">INICIAR SESI&#210N</h2>
            <span class="mainpage-overlay-content">INCIO</span><span class="mainpage-overlay-second-content">INICIAR SESI&#210N</span>
        </div>
    </div>
    <div class="position-center">
        <div class="start-session-form">
            <span class="error-php"> <?php echo $noMatchingFields; ?></span>
            <span class="error-php"> <?php echo $nameError; ?></span>
            <h1>Iniciar Sesi&#243n</h1>
            <form id="login-page-form" name="login-form" method="POST" onsubmit="login_page_validation(event,this)">
                <div class="row">
                    <div class="user-name column2x">
                        <label for="user-name">Nombra de Usuario (Correo) <span class="error-label hidden">* This field is required</span>
                            <span class="error-label-format hidden">* This field is invalid</span>
                        </label>
                        <input id="user-name" name="username" type="text"
                               placeholder="xxx@xxx.xom" class="field"
                               value="<?php echo htmlspecialchars($username); ?>" required
                               pattern="^(.+)@([^\.].*)\.([a-z]{2,})$"/>
                    </div>
                    <div class="password column2x">
                        <label for="password">Contrase&#241a <span
                                    class="error-label hidden">* This field is required</span>
                            <span class="error-label-format hidden">* This field is invalid</span></label>
                        <input id="password" name="password" type="password" placeholder="Contrase&#241a"
                               class="field" value="<?php echo htmlspecialchars($password); ?>"//>
                    </div>
                </div>

                <div class="row reset-password">
                    <div class="reset-password"><a href="login-recover.html" onclick="login_recover_modal(event)" name="reset">Olvido
                            su Contrase&#241a?</a></div>
                </div>

                <div class="row login-actions-row">
                    <button type="submit" name="login-submit" class="button-primary">Entra</button>

                </div>
            </form>

        </div>
    </div>
</div>
<div class="social-media-content">
    <div class="label">
        <STRONG>LEAN EN LAS REDES SOCIALES</STRONG>
    </div>
    <div class="footer-elements">
        <span class="fab fa-twitter fa-1x"></span>
        <span class="fab fa-facebook-f fa-1x"></span>
        <span class="fab fa-instagram fa-1x"></span>
    </div>
</div>
<footer>
    <div class="copyright">
        <p>Copyright &#169 2019 All rights reserved | This web is made with &#9829 by <span
                    class="font-color">DiazApps</span></p>
        <div class="scroll-to-top" onclick="scroll_to_top()"><span class="fas fa-arrow-up"></span></div>
    </div>
</footer>
<div id="lean-login-page-recover-popup" class="modal <?php echo $modal; ?>">
    <div class="pop-up">
        <h1 class="pop-up-header">Recuperar su Contrase&#241a</h1>
        <form method="post">
            <div class="pop-up-body">
                <div class="user-name">
                    <label for="popup-user-name" class="field-label">Correo<span
                                class="error-php"> <?php echo $emailError; ?></span></label><br>
                    <input id="popup-user-name" type="text" placeholder="Correo" name="email" class="field"/>
                </div>
            </div>

            <div class="pop-up-actions">
                <button type="button" onclick="login_password_recover_cancel(event,this)" class="button-secondary">
                    Cerrar
                </button>
                <button type="submit" class="button-primary" name="recover-password">Entra</button>
            </div>
        </form>
    </div>
</div>
</body>

</html>