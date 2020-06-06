<?php

include_once '../backend/session.php';
include_once '../backend/update-agent-profile.php';
include_once '../backend/logout.php';
if (isset($_SESSION["user"])) {
    $user = $_SESSION["user"];
}

?>

<html lang="en">
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
                    <li class="link"><a href="business-user-homepage.php">Inicio</a></li>
                    <li class="link active"><a href="business-user-profile.php">Fundacion</a></li>
                </ul>
            </nav>
        </div>
    </div>
    <div class="logout-container">
        <div class="logged-in-user">
            Welcome <?php echo $user["firstName"] . " " . $user["lastName"] ?>,
        </div>
        <form id="logout-form" method="POST">
            <button type="submit" name="logout">Logout</button>
        </form>
    </div>
</header>
<div class="mainpage business-user-profile">
    <div class="banner-image-wrapper">
        <div class="banner-image-overlay-text">
            <h2 id="banner-image">PERFIL</h2>
            <span class="mainpage-overlay-content">INCIO</span><span
                    class="mainpage-overlay-second-content">PERFIL</span>
        </div>
    </div>
    <div class="position-center">
        <div class="profile-details">
            <h3>Tu informaci&#243n del Perfil</h3>
            <div class="row">
                <div class="column3x">
                    <div class="item">
                        <div class="individual-profile"><span class="fas fa-book fa-1x"></span>
                            <?php echo $user["firstName"] ?>
                        </div>
                    </div>
                    <div class="item">
                        <div class="individual-profile"><span
                                    class="fas fa-book fa-1x"></span><?php echo $user["lastName"]; ?>
                        </div>
                    </div>
                    <div class="item">
                        <div class="individual-profile"><span
                                    class="fas fa-user fa-1x"></span><?php echo $user["firstName"] . " " . $user["lastName"]; ?>
                        </div>
                    </div>
                </div>
                <div class="column3x">

                    <div class="item">
                        <div class="individual-profile"><span
                                    class="fas fa-map-marker fa-1x"></span><?php echo $user["address"]; ?></div>
                    </div>
                    <div class="item">
                        <div class="individual-profile"><span
                                    class="fas fa-phone fa-1x"></span><?php echo $user["phone"]; ?></div>
                    </div>
                    <div class="item">
                        <div class="individual-profile"><span
                                    class="fas fa-paper-plane fa-1x"></span><?php echo $user["emailId"]; ?>
                        </div>
                    </div>
                </div>
                <div class="column3x">
                    <div class="business-user-image"
                         style="background-image: url('<?php echo $user["userImage"] ? $user["userImage"] : "./image/nologo.png"; ?>');"></div>
                </div>
            </div>
        </div>
        <div class="update-profile">
            <h2>Estar en contacto</h2>
            <div class="update-profile-form">
                <form enctype="multipart/form-data" id="update-profile-form" method="POST"  onsubmit="validate_profile(event,this)">
                    <div class="row first-row">
                        <div class="column2x">
                            <div class="row">
                                <div class="firstName full-width">
                                    <label for="firstName">Nombres y Apellido</label><br>
                                    <input id="firstName" type="text" placeholder="Tu Nombre y Apellido" class="field"
                                           disabled
                                           value="<?php echo $user["firstName"] . ' ' . $user["lastName"]; ?>"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="lastName full-width">
                                    <label for="lastName">Nombre de la Fundacion</label><br>
                                    <input id="lastName" type="text" placeholder="Nombre de la Fundacion" class="field"
                                           disabled value="<?php echo $user["foundation"]; ?>"/>
                                </div>
                            </div>
                        </div>
                        <div class="column2x">
                            <div class="business-user-image"
                                 style="background-image: url('<?php echo $user["userImage"] ? $user["userImage"] : "./image/nologo.png"; ?>');X"></div>
                            <button class="button-primary user-profile-icon"
                                    onclick=document.getElementById("user-image").click() type="button">Seleccionar Logo
                                <input type="hidden" name="MAX_FILE_SIZE"/>
                                <input type="file" hidden id="user-image" name="userImage">
                            </button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mail full-width">
                            <label for="Correo">Correo</label>
                            <input id="Correo" type="text" placeholder="Tu correo electronico" class="field"
                                   disabled value="<?php echo $user["emailId"]; ?>"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="phone column3x">
                            <label for="phone">Telefono <span
                                        class="error-php"> <?php echo $phoneError; ?></span><span class="error-label hidden">* This field is required</span><span
                                        class="error-label-format hidden">*This Field is Invalid</span></label>
                            <input id="phone" type="text" placeholder="xxx-xxx-xxxx" class="field"
                                   value="<?php echo $user["phone"]; ?>" name="phone" required pattern="^\d{3}-\d{3}-\d{4}$"/>
                        </div>
                        <div class="user column3x">
                            <label for="user">Usuario</label>
                            <input id="user" type="text" placeholder="Nombre de Usuario" class="field"
                                   disabled value="<?php echo $user["firstName"]; ?>"/>
                        </div>
                        <div class="password column3x">
                            <label for="password">Contrasena<span
                                        class="error-php"> <?php echo $passwordError; ?></span><span class="error-label hidden">* This field is required</span><span
                                        class="error-label-format hidden">*This Field is Invalid</span></label>
                            <input id="password" type="password" placeholder="0 to 8 Non Space characters" class="field"
                                   value="<?php echo $user["password"]; ?>" name="password" required pattern="^\S{0,8}$"/>
                        </div>
                    </div>
                    <div class="row">
                        <span class="info-primary">Nota:</span>
                    </div>
                    <div class="row">
                        <div>Solo puede cambiar los datos (Telefono, Contrasena y logo)</div>
                    </div>
                    <div class="row">
                        <button class="button-primary user-profile-button" name="update-profile">Guardar Cambios
                        </button>
                    </div>
                </form>
            </div>
        </div>
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