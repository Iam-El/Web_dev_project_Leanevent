<?php
/*Just for your server-side code*/
header('Content-Type: text/html; charset=ISO-8859-1');
header('Content-Type: text/html; charset=utf-8');
include '../backend/subscriber.php';

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
                    <li class="link active"><a href="lean-about-us-page.php">Quienes Somos</a></li>
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
<div class="mainpage lean-about-us">
    <div class="banner-image-wrapper">
        <div class="banner-image-overlay-text">
            <h2 id="banner-image">QUIENES SOMOS</h2>
            <span class="mainpage-overlay-content">HOME</span><span
                    class="mainpage-overlay-second-content">QUIENES SOMOS</span>
        </div>
    </div>
    <div class="position-center">
        <div class="row">
            <div class="column2x left-content">

                <h1 class="about-us-heading">¿Qué es LEAN?</h1>
                <div class="about-us-content">LEAN es una asociación civil sin fines de lucro
                    conformada por gente con gran sensibilidad social, dedicada a
                    la defensa de los derechos humanos y la consecución de ayuda humanitaria,
                    favoreciendo directamente o a través de otras asociaciones o agrupaciones provinciales a
                    venezolanos residentes en España y a quienes viven en Venezuela.
                </div>

                <h1 class="about-us-heading">¿Cuáles son los fines de LEAN?</h1>
                <div class="about-us-content">LEAN está dedicada a fomentar valores e instaurarlos
                    como principios, trabajar en formación cívica, promover y defender las libertades
                    individuales y los derechos humanos en Venezuela, sensibilizar a la gente
                    sobre la importancia de conocer, respetar y practicar los principios contenidos
                    en la Declaración Universal de Derechos Humanos, asistir a víctimas de actos
                    violentos y persecución, favorecer la adquisición de conocimiento a través de
                    la lectura y trabajar incansablemente
                    en la ayuda humanitaria como gesto de solidaridad y buena voluntad.
                </div>

                <h1 class="about-us-heading">¿Cuáles son las actividades de LEAN?</h1>
                <div class="about-us-content">LEAN trabaja en el desarrollo y publicación de
                    estudios de investigación sobre temas de interés social, cultural, político
                    y económico, preparación de ponencias para foros y conferencias, presentación
                    en eventos especializados y mesas de trabajo, petición de colaboración a
                    personalidades de reconocida trayectoria, estudio de casos de violación de
                    derechos humanos a través de letrados voluntarios, asistencia y representación
                    para la defensa de las víctimas de actos violentos y persecución, lanzamiento de
                    campañas sobre valores cívicos y derechos humanos, planificación y ejecución de
                    programas de voluntariado para brindar ayuda humanitaria y organización de charlas sobre la
                    situación
                    económica, política y social de Venezuela y demás temas de interés mundial.
                </div>

                <h1 class="about-us-heading">¿Qu hacemos?</h1>
                <div class="about-us-content">La asociación civil LEAN fue creada con
                    el objetivo de ayudar, a través de acciones concretas, a nuestros
                    conciudadanos en Venezuela ante la grave escasez de medicinas e
                    insumos médicos en que se encuentra el país. Nuestra misión consiste
                    en recolectar ayuda médico sanitaria en delegaciones en España y, a
                    través de agentes de transporte, llevarlos a Venezuela para que otras
                    asociaciones se encarguen de su distribución. De esta manera aportamos
                    nuestro granito de arena ayudando a llevar asistencia humanitaria a Venezuela. Somos una
                    asociación sin fines de lucro, dedicada a la defensa de los Derechos Humanos.
                </div>


            </div>
            <div class="column2x right-content">
                <h1 class="about-us-heading">¿Como puedes ayudar?</h1>
                <div class="about-us-subheading">Puedes ayudar de tres formas:</div>
                <div class="about-us-content">
                    <ul>
                        <li>Dona material médico e insumos para Venezuela.</li>
                        <li>A través de donaciones económicas</li>
                        <li>Hazte voluntario</li>
                    </ul>
                </div>
                <h1 class="about-us-heading">¿Donde estamos?</h1>
                <div class="about-us-subheading">Somos 17 Coordinacines en ESPAÑA:</div>
                <div class="about-us-content">Alicante - Almería -
                    Cataluña - Granada - Islas Canarias - Islas Baleares -
                    León - Madrid -Málaga - Salamanca - Sevilla - Valencia -
                    Valladolid - Zaragoza - LEAN EEUU.
                </div>
                <h1 class="about-us-heading">¿Donde estamos?</h1>
                <div class="about-us-subheading">Instituciones y Organizaciones Beneficiadas en VENEZUELA:</div>
                <div class="about-us-content">
                    Ayudamos a 11 Estados a través de 35 puntos de destino:
                    <div class="destinations-list">
                        <ul class="column2x">
                            <li class="list-item">LEAN Anzoátegui</li>
                            <li class="list-item">Funsaluz Barcelona, Valencia y Maracaibo</li>
                            <li class="list-item">Fundación La Pastillita</li>
                            <li class="list-item">LEAN Aragua 1</li>
                            <li class="list-item">Parroquia Michelena</li>
                            <li class="list-item">LEAN Caracas 1, 2, 3, 4, 5, 6, 7, 8 y 9.</li>
                            <li class="list-item">Seno Salud</li>
                            <li class="list-item">Somos Ayuda</li>
                            <li class="list-item">FDIV</li>
                            <li class="list-item">Parroq. San Fco. de Asis</li>
                            <li class="list-item">ONG Pan y Vino</li>
                            <li class="list-item">LEAN Nueva Esparta</li>
                            <li class="list-item">Parroquia San Félix</li>
                            <li class="list-item">Fundación Esperanza de Vida</li>
                            <li class="list-item">Caritas de Venezuela</li>
                        </ul>
                        <ul class="column2x">
                            <li class="list-item">Fund. Denzel El Guerrero</li>
                            <li class="list-item">Mensajeras de la Alegría</li>
                            <li class="list-item">Caritas Valle de la Pascua</li>
                            <li class="list-item">Caritas Diocesana Barquisimeto</li>
                            <li class="list-item">Hogar de Niños Impedidos Don Orione</li>
                            <li class="list-item">AVEPEII</li>
                            <li class="list-item">Casa Hogar Madre Teresa de Calcuta</li>
                            <li class="list-item">Seminario Santa Rosa de Lima</li>
                            <li class="list-item">Casa Aragón</li>
                            <li class="list-item">Caritas Parroquial de Mérida</li>
                            <li class="list-item">Asociación Dr. Paúl Moreno Camacho</li>
                            <li class="list-item">FUNDAYÚDANOS</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="bottom-content-wrapper">
    <div class="left">
        <div><span class="far fa-paper-plane fa-1x"></span>Reg&#237strese para recibir un</div>
        <div>boletin</div>
    </div>
    <form id="home-page-subscriber" method="post" onsubmit=subscriber_validation(event,this)>
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