<?php
header('Content-Type: text/html; charset=ISO-8859-1');
header('Content-Type: text/html; charset=utf-8');
include '../backend/contact-us.php';
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
                    <li class="link"><a href="http://emf2253.uta.cloud/Fernandes_Leanevent/"">Blog</a></li>
                    <li class="link"><a href="lean-register-page.php">Reg&#237strate</a></li>
                    <li class="link active"><a href="lean-contact-us.php">Contacto</a></li>
                    <li class="link"><a href="lean-login-page.php">Inciar Sesi&#243n</a></li>
                    <li class="link"><a href="lean-buy-from-us.php">Comprar Boletos</a></li>
                </ul>
            </nav>
        </div>
    </div>
</header>
<div class="mainpage contact-us">
    <div class="banner-image-wrapper">
        <div class="banner-image-overlay-text">
            <h2 id="banner-image">CONTACTO</h2>
            <span class="mainpage-overlay-content">INICIO</span><span
                    class="mainpage-overlay-second-content">CONTACTO</span>
        </div>
    </div>
    <div class="position-center">
        <div class="contact-info">
            <h1>Informacion del contacto</h1>
            <div class="row">
                <div class="contact-us-blocks location">
                    <div class="item">
                        <div class="individual-profile"><span class="fas fa-map-marker fa-1x"></span>198 West 21st
                            Street,
                        </div>
                        <div class="individual-profile">Suite 721 New York NY 10016</div>
                    </div>
                </div>

                <div class="contact-us-blocks phone">
                    <span class="fas fa-phone fa-1x"></span>

                    <div>+1 234 234 2323</div>
                </div>

                <div class="contact-us-blocks email">
                    <span class="far fa-paper-plane fa-1x"></span>

                    <div>info@diazapps.com</div>
                </div>

                <div class="contact-us-blocks website">
                    <span class="fas fa-globe fa-1x"></span>

                    <div>diazapps.com</div>
                </div>
            </div>
        </div>


        <div class="social-media-links">
            <h1>LEAN en las redes sociales</h1>
            <div class="row">
                <div class="social-media-blocks facebook">
                    <div class="image-container facebook"></div>
                    <div class="details"><p>LEAN Ayuda Humanitaria</p></div>
                </div>
                <div class="social-media-blocks twitter">
                    <div class="image-container twitter"></div>
                    <div class="details"><p>@LeanEmergente</p></div>
                </div>

                <div class="social-media-blocks instagram">
                    <div class="image-container instagram"></div>
                    <div class="details"><p>@LeanAyudaHumanitaria</p></div>
                </div>

                <div class="social-media-blocks gmail">
                    <div class="image-container gmail"></div>
                    <div class="details"><p>@Lean emergente@gmail.com</p></div>
                </div>
            </div>
        </div>

        <div class="contact-us-form">
            <h1>Estar en contacto</h1>
            <form id="contact-us-page-form" method="POST"
                  onsubmit=contact_us_page_validation(event,this)>
                <div class="row">
                    <div class="firstName column2x">
                        <label for="firstName">Nombre <span class="error-label hidden">* This field is required</span>
                            <span class="error-label-format hidden">* This field is invalid</span><span
                                    class="error-php"> <?php echo $nameError; ?></span></label>
                        <input id="firstName" type="text" placeholder="Tu Nombre" name="username" class="field"
                               value="<?php echo htmlspecialchars($username); ?>" required/>
                    </div>
                    <div class="lastName column2x">
                        <label for="lastName">Appelido <span class="error-label hidden">* This field is required</span>
                            <span class="error-label-format hidden">* This field is invalid </span><span
                                    class="error-php"> <?php echo $surnameError; ?></span></label>
                        <input id="lastName" type="text" placeholder="Tu Appelido" name="surname" class="field"
                               value="<?php echo htmlspecialchars($surname); ?>" required/>
                    </div>
                </div>
                <div class="row">
                    <div class="contact-email column2x">
                        <label for="Correo">Correo <span class="error-label hidden">* This field is required</span>
                            <span class="error-label-format hidden">* This field is invalid</span><span
                                    class="error-php"> <?php echo $emailError; ?></span></label></label>
                        <input id="Correo" type="text" name="email" placeholder="xxx@xxx.com" class="field"
                               value="<?php echo htmlspecialchars($email); ?>" required
                               pattern="^(.+)@([^\.].*)\.([a-z]{2,})$"/>
                    </div>
                </div>
                <div class="row">
                    <div class="contact-topic column2x">
                        <label for="Tema">Tema <span class="error-label hidden">* This field is required</span>
                            <span class="error-label-format hidden">* This field is invalid</span><span
                                    class="error-php"> <?php echo $topicError; ?></span></label>
                        <input id="Tema" type="text" placeholder="Su asunto de este mensaje" name="topic" class="field"
                               value="<?php echo htmlspecialchars($topic); ?>" required/>
                    </div>
                </div>
                <div>
                    <div class="mensaje">
                        <label for="Mensaje">Mensaje <span class="error-label hidden">* This field is required</span>
                            <span class="error-label-format hidden">* This field is invalid</span><span
                                    class="error-php"> <?php echo $messageError; ?></span></label>
                        <textarea id="Mensaje" placeholder="Di algo sobre nosotros" rows="7" class="field"
                                  name="message"
                                  value="<?php echo htmlspecialchars($message); ?>" required></textarea>
                    </div>
                </div>
                <div>
                    <button type="submit" class="contact-us-confirm" name="contactUs">Enviar mensaje</button>
                </div>

        </div>
        </form>
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
        <div class="scroll-to-top" onclick=scroll_to_top()><span class="fas fa-arrow-up"></span></div>
    </div>
</footer>
</body>

</html>