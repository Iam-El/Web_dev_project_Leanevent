<?php

include_once '../backend/connect-database.php';
include_once '../backend/session.php';
include_once '../backend/buy-product.php';
$event = $_SESSION["event"]

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
<div class="mainpage buy-from-us-cart">
    <div class="banner-image-wrapper">
        <div class="banner-image-overlay-text">
            <h2 id="banner-image">COMPRAR BOLETOS</h2>
            <span class="mainpage-overlay-content">INCIO</span><span
                    class="mainpage-overlay-second-content">COMPRAR BOLETOS</span>
        </div>
    </div>
    <div class="position-center buy-from-us">
        <div class="row">
            <div class="column2x left-content">
                <img class="buy-from-us-cart-image" src="<?php echo $event["image"]; ?>">
                <div class="info-delete">Sale</div>
            </div>
            <div class="column2x right-content">
                <h4 class="buy-from-us-cart-heading"><?php echo $event["eventName"]; ?></h4>
                <div class="price-rating">
                    <h4 class="buy-from-us-cart-price">$<?php echo $event["cost"]; ?></h4>
                    <div class="product-rating">
                        <span class="fas fa-star fa-1x"></span>
                        <span class="fas fa-star fa-1x"></span>
                        <span class="fas fa-star fa-1x"></span>
                        <span class="fas fa-star fa-1x"></span>
                        <span class="fas fa-star-half-alt fa-1x"></span>
                        <span>(74 Rating)</span>
                    </div>
                </div>
                <div class="product-description">
                    <p class="buy-from-us-cart-content"><?php echo $event["eventDescription"]; ?></p>
                </div>
                <form id="buy-product" method="POST">
                    <input type="number" name="eventId" hidden class="field" value="<?php echo $event["id"]; ?>"/>
                    <div class="quantity">
                        <p>Numero de Entradas</p>
                    </div>
                    <div class="product-quantity">
                        <button type="button" class="quantity-subtract" onclick="decreaseQuantity(event)"><span
                                    class="fas fa-minus"></span></button>
                        <input type="number" name="quantity" id="quantity" class="quantity-value field" value="0"/>
                        <button type="button"  class="quantity-add" onclick="increaseQuantity(event)"><span
                                    class="fas fa-plus"></span></button>
                    </div>
                    <div class="mail full-width">
                        <label for="email">Correo Electronico</label>
                        <input id="email" type="text" placeholder="Tu correo electronico" class="field" name="email"/>
                    </div>
                    <div class="product-buy">
                        <button class="button-primary" name="buy-product"><span class="fas fa-shopping-cart fa-1x"></span>Comprar</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="row product-tabs">
            <div class="tab-headers">
                <div class="tab-header column3x active tab-1">
                    <button onclick="showTab(event, 1)">DESCRIPCION</button>
                </div>
                <div class="tab-content tab-content-1 mobile active">
                    <?php echo $event["eventDescription"]; ?>
                </div>
                <div class="tab-header column3x tab-2">
                    <button onclick="showTab(event, 2)">ENCARGADOS</button>
                </div>
                <div class="tab-content tab-content-2 mobile">
                    <?php echo $event["eventDescription"]; ?>
                </div>
                <div class="tab-header column3x tab-3">
                    <button onclick="showTab(event, 3)">PATROCINANTES</button>
                </div>
                <div class="tab-content tab-content-3 mobile">
                    <?php echo $event["eventDescription"]; ?>
                </div>

            </div>
        </div>
        <div class="row tab-contents">
            <div class="tab-content tab-content-1 active desktop">
                <?php echo $event["eventDescription"]; ?>
            </div>
            <div class="tab-content tab-content-2 desktop">
                <?php echo $event["eventDescription"]; ?>
            </div>
            <div class="tab-content tab-content-3 desktop"><?php echo $event["eventDescription"]; ?>
            </div>
        </div>
    </div>
</div>
<div class="bottom-content-wrapper">
    <div class="left">
        <div><span class="far fa-paper-plane fa-1x"></span>Reg&#237strese para recibir un</div>
        <div>boletin</div>
    </div>
    <div class="right">
        <input type="text" class="email-address" placeholder="Introduce tu correo electronico"/>
        <button type="submit" class="subscriber-button">Suscribir</button>
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
        <div class="scroll-to-top"><span class="fas fa-arrow-up"></span></div>
    </div>
</footer>

</body>
</html>