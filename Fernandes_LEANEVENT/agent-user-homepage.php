<?php

include '../backend/session.php';
include_once '../backend/logout.php';

if (isset($_SESSION["user"])) {
    $user = $_SESSION["user"];
}

?>
<html>
<head>
    <title>LEANEVENTO Foundation</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="css/leanevent.css">
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
                    <li class="link active"><a href="agent-user-homepage.php">Inicio</a></li>
                    <li class="link"><a href="agent-list-volunteers.php">Lista de Voluntarios</a></li>
                    <li class="link"><a href="agent-list-business.php">Lista de Fundaciones</a></li>
                    <li class="link"><a href="agent-list-events.php">Eventos</a></li>
                    <li class="link"><a href="agent-user-profile.php">Agente</a></li>
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
<div class="mainpage agent-user-homepage">
    <div id="slider">
        <figure>
            <img src="image/bannerlean1.jpg">
            <img src="image/bannerlean2.jpg">
            <img src="image/bannerlean3.jpg">
        </figure>
    </div>
    <div class="overlay-image-wrapper">
        <img src="image/logo-blanco.png" class="overlay-image">
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
