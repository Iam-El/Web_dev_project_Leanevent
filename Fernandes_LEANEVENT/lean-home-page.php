<?php
include '../backend/subscriber.php';
header('Content-Type: text/html; charset=utf-8');

?>
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
<div class="mainpage homepage">
    <div id="slider">
        <figure>
            <img src="./image/bannerlean1.jpg">
            <img src="./image/bannerlean2.jpg">
            <img src="./image/bannerlean3.jpg">
        </figure>
        <ul class="slider-controls">
            <li class="carousel-item image-1 active"></li>
            <li class="carousel-item image-2"></li>
            <li class="carousel-item image-3"></li>
        </ul>
    </div>

    <div class="overlay-image-wrapper">
        <img src="./image/logo-blanco.png" class="overlay-image">
    </div>
    <div class="align-text"><span
                class="line-colour">---------</span><strong>¿QUÉ HACEMOS?</strong><span
                class="line-colour">---------</span>
        <p class="content-margin">La asociación civil LEAN fue creada con el objetivo de ayudar,
            a través de acciones concretas, a nuestros conciudadanos en Venezuela ante la
            grave escasez de medicinas e insumos médicos en que se encuentra el país.
            Nuestra misión consiste en recolectar ayuda médico sanitaria en delegaciones
            en España y, a través de agentes de transporte, llevarlos a Venezuela para que otras asociaciones
            se encarguen de su distribución. De esta manera aportamos nuestro granito de arena ayudando
            a llevar asistencia humanitaria a Venezuela.
            Somos una asociación sin fines de lucro, dedicada a la defensa de los Derechos Humanos.
        </p>
    </div>
    <div class="homepage-content">

        <div class="row">
            <div class="column3x">
                <div>478</div>
                <div>voluntarios</div>
            </div>
            <div class="column3x">
                <div>60,000</div>
                <div>PERSONAS BENEFICIADAS</div>
            </div>
            <div class="column3x">
                <div>45</div>
                <div>ALIADOS</div>
            </div>
        </div>
    </div>
    <div class="banner-image-wrapper bottom">
        <div class="banner-image-overlay-text">
            <h4>"La injusticia,en cualquier parte,es una amenaze a la justicia en todas partes."</h4>
            <p id="homepage-quote">Martin Luthar King</p>
        </div>
    </div>
    <div class="position-center">
        <div class="align-text"><span class="line-colour">---------</span><strong>ALIADOS</strong><span
                    class="line-colour">---------</span></div>
        <div class="carousel-images">
            <img class="column" src="./paralacarpetaimagenesqueleentragaalosestudiantes/logo1.PNG">
            <img class="column" src="./paralacarpetaimagenesqueleentragaalosestudiantes/logo2.PNG">
            <img class="column" src="./paralacarpetaimagenesqueleentragaalosestudiantes/logo3.PNG">
            <img class="column" src="./paralacarpetaimagenesqueleentragaalosestudiantes/logo4.PNG">
        </div>
        <div class="homepage-navigation">
            <span class="fas fa-chevron-left fa-1x"></span>
            <span class="fas fa-chevron-right fa-1x"></span>
        </div>
    </div>
    <div class="bottom-content-wrapper">
        <div class="left">
            <div><span class="far fa-paper-plane fa-1x"></span>Reg&#237strese para recibir un</div>
            <div>boletin</div>
        </div>
        <form id="home-page-subscriber" method="POST" onsubmit="subscriber_validation(event,this)">
            <div class="right">
                <label for="email" class="field-label"></label>
                <input type="text" id="email" name="email" class="email-address"
                       placeholder="Introduce tu correo electronico"
                       value="<?php echo htmlspecialchars($email); ?>"/>
                <button type="submit" class="subscriber-button" name="subscriber-button">Suscribir</button>
                <div class="error-label hidden">* This field is required</div>
                <div class="error-label-format hidden">* Email Id is Invalid</div>
            </div>
        </form>
        <span class="error-php-subscriber">
                                <?php
                                echo $emailError;
                                ?></span>

        <span class="error-php-subscriber">
        <?php
        if (isset($error) && strrpos($error, 'Duplicate entry')) {
            ?>
            <script>alert("Sorry!! You already have a Subscription!!!!")</script>
            <?php
        }
        ?></span>
        <span class="php-success">
           <?php
           if ($resultnew) {
               ?>
               <script>alert("Congratulations !!!! You have been Subscribed successfully!!!!")</script>
               <?php
           }
           ?>
        </span>

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
</div>
<footer>
    <div class="copyright">
        <p>Copyright &#169 2019 All rights reserved | This web is made with &#9829 by <span
                    class="font-color">DiazApps</span></p>
        <div class="scroll-to-top" onclick="scroll_to_top()"><span class="fas fa-arrow-up"></span></div>
    </div>
</footer>
</body>
</html>
