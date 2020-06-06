<?php

include '../backend/connect-database.php';
include '../backend/subscriber.php';
include_once '../backend/buy-from-us.php';


$query = "SELECT * FROM Lean_Events ";
$queryStatement = $connection->query($query);
$results = $queryStatement->fetchAll();


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
                    <li class="link"><a href="lean-home-page.php">Inicio</a></li>
                    <li class="link"><a href="lean-about-us-page.php">Quienes Somos</a></li>
                    <li class="link"><a href="http://emf2253.uta.cloud/Fernandes_Leanevent/">Blog</a></li>
                    <li class="link"><a href="lean-register-page.php">Reg&#237strate</a></li>
                    <li class="link"><a href="lean-contact-us.php">Contacto</a></li>
                    <li class="link"><a href="lean-login-page.php">Inciar Sesi&#243n</a></li>
                    <li class="link active"><a href="lean-buy-from-us.php">Comprar Boletos</a></li>
                </ul>
            </nav>
        </div>
    </div>
</header>
<div class="mainpage buy-from-us">
    <div class="banner-image-wrapper">
        <div class="banner-image-overlay-text">
            <h2 id="banner-image">COMPRAR BOLETOS</h2>
            <span class="mainpage-overlay-content">INCIO</span><span
                    class="mainpage-overlay-second-content">COMPRAR BOLETOS</span>
        </div>
    </div>
    <div class="position-center">
        <div class="align-text"><span class="line-colour">--------</span><strong>NUESTROS EVENTOS</strong><span
                    class="line-colour">--------</span>
            <p class="buy-from-us-content">Tu asistencia es importante para nosotros visitanos en los eventos qu estamos
                realizando.</p>
        </div>
        <div class="image-sameline">
            <?php
            if ($results > 0) {
                foreach ($results

                         as $result) {
                    ?>

                    <form method="POST">
                        <input hidden value="<?php echo $result['id'] ?>" name="eventId"/>
                        <button type="submit" class="product-details" name="buy">
                            <div class="carousel-image-item item-1"
                                 style="background-image: url('<?php echo $result['image'] ? $result['image'] : "./image/minibaner4.jpg"; ?>');">
                                <div class="info-primary">New</div>
                            </div>
                            <div class="event-info">
                                <div class="name"><?php echo $result['eventName'] ?></div>
                                <div class="price">$<?php echo $result['cost'] ?></div>
                            </div>
                        </button>
                    </form>
                    <?php
                }
            }
            ?>
        </div>
    </div>
</div>


<div class="bottom-content-wrapper">
    <div class="left">
        <div><span class="far fa-paper-plane fa-1x"></span>Reg&#237strese para recibir un</div>
        <div>boletin</div>
    </div>
    <form id="home-page-subscriber" method="POST" onsubmit="subscriber_validation(event,this)"/>
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
