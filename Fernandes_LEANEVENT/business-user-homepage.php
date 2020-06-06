<?php

include '../backend/session.php';
include_once '../backend/logout.php';
include_once '../backend/confirm-event-business.php';
include_once '../backend/login.php';

if (isset($_SESSION["user"])) {
    $user = $_SESSION["user"];
}

?>
<html xmlns="http://www.w3.org/1999/html">
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
                    <li class="link active"><a href="business-user-homepage.php">Inicio</a></li>
                    <li class="link"><a href="business-user-profile.php">Foundacion</a></li>
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
<div class="mainpage business-user-homepage">
    <div class="align-text align-text-header">
        <h1>Lista de Eventos</h1>
        <span class="error-label" <?php $confirmError ?> </span>
        <div class="position-center">
            <table class="events-table lean-table">
                <thead class="table-header">

                <tr class="table-header-content">
                    <th class="column-1 details">DETAILS DEL EVENTOS</th>
                    <th class="column-2 direction">LUGAR</th>
                    <th class="column-3 date">FECHA</th>
                    <th class="column-4 time">HORA</th>
                    <th class="column-5 confirm">ASISTENCIA</th>
                </tr>
                </thead>

                <tbody class="table-body">
                <?php include_once '../backend/display-business-events.php'; ?>
                </tbody>
            </table>
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
<div id="lean-login-page-recover-popup" class="<?php echo $_SESSION["modal-class"]; ?>">
    <div class="pop-up">
        <h2 class="confirm-event">Beinvenido</h2>
        <div class="pop-up-body confirm-event-gracias">
            <h3 class="confirm-event-para"><?php echo $_SESSION["modal-message"]; ?></h3>
        </div>
        <div class="pop-up-actions">
            <button type="submit" onclick="login_password_recover_cancel(event,this)" class="button-secondary">Close
            </button>
        </div>
    </div>
</div>

</body>
</html>