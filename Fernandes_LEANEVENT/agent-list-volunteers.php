<?php

include_once '../backend/session.php';
include_once '../backend/logout.php';
if (isset($_SESSION["user"])) {
    $user = $_SESSION["user"];
}

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
                    <li class="link"><a href="agent-user-homepage.php">Inicio</a></li>
                    <li class="link active"><a href="agent-list-volunteers.php">Lista de Voluntarios</a></li>
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
<div class="mainpage agent-list-volunteers">
    <div class="align-text align-text-header">
        <h1>Lista de Voluntarios</h1>
    </div>
    <div class="position-center">
        <table class="list-of-volunteers-table lean-table">
            <thead class="table-header">
            <tr class="table-header-content">
                <th class="column-1 details">NOMBRE DE VOLUNTARIOS</th>
                <th class="column-2 direction">CORREO</th>
                <th class="column-3 date">TELEFONO</th>
                <th class="column-4 name">EVENTO</th>
                <th class="column-5 confirm">RESPONSABLE</th>
            </tr>
            </thead>

            <tbody class="table-body">
            <!--      <tr class="table-body-content">-->
            <!--        <td class="column-1 details">-->
            <!--          <span class="user-image details-image"></span>-->
            <!--          <span class="details-para">Nombre de Voluntario</span>-->
            <!--        </td>-->
            <!--        <td class="column-2 direction">Direccion</td>-->
            <!--        <td class="column-3 date">0000-000000</td>-->
            <!--        <td class="column-4 name">Nombre del Evento</td>-->
            <!--        <td class="column-5 responsible">Nombre del Responsable</td>-->
            <!---->
            <!--      <tr class="table-body-content">-->
            <!--        <td class="column-1 details">-->
            <!--          <span class="user-image details-image"></span>-->
            <!--          <span class="details-para">Nombre de Voluntario</span>-->
            <!--        </td>-->
            <!--        <td class="column-2 direction">Direccion</td>-->
            <!--        <td class="column-3 date">0000-000000</td>-->
            <!--        <td class="column-4 name">Nombre del Evento</td>-->
            <!--        <td class="column-5 responsible">Nombre del Responsable</td>-->
            <!---->
            <!--      <tr class="table-body-content">-->
            <!--        <td class="column-1 details">-->
            <!--          <span class="user-image details-image"></span>-->
            <!--          <span class="details-para">Nombre de Voluntario</span>-->
            <!--        </td>-->
            <!--        <td class="column-2 direction">Direccion</td>-->
            <!--        <td class="column-3 date">0000-000000</td>-->
            <!--        <td class="column-4 name">Nombre del Evento</td>-->
            <!--        <td class="column-5 responsible">Nombre del Responsable</td>-->
            <!---->
            <!---->
            <!--      </tr>-->
            <?php include_once '../backend/display-individual-in-event-page.php'; ?>
            </tbody>

        </table>
        <div class="page-navigation">
            <ul class="list-of-pages">
                <li class="page-navigation-item previous"><span class="fas fa-angle-double-left"></span></li>
                <li class="page-navigation-item active">1</li>
                <li class="page-navigation-item">2</li>
                <li class="page-navigation-item">3</li>
                <li class="page-navigation-item">4</li>
                <li class="page-navigation-item next"><span class="fas fa-angle-double-right"></span></li>
            </ul>
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