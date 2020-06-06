<?php

include_once '../backend/session.php';
include_once '../backend/add-event.php';
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
                    <li class="link"><a href="agent-user-homepage.php">Inicio</a></li>
                    <li class="link"><a href="agent-list-volunteers.php">Lista de Voluntarios</a></li>
                    <li class="link"><a href="agent-list-business.php">Lista de Fundaciones</a></li>
                    <li class="link active"><a href="agent-list-events.php">Eventos</a></li>
                    <li class="link"><a href="agent-user-profile.php">Agente</a></li>
                </ul>
            </nav>
        </div>
    </div>
</header>
<div class="mainpage agent-add-event">
    <div class="banner-image-wrapper">
        <div class="banner-image-overlay-text">
            <h2 id="banner-image-overlay-text">REGISTRO DE EVENTO</h2>
            <span class="mainpage-overlay-content">EVENTOS</span><span
                    class="mainpage-overlay-second-content">REGISTRO</span>
        </div>
    </div>

    <div class="position-center">
        <div class="update-profile">
            <h2>Registro de Evento</h2>
            <form enctype="multipart/form-data" id="add-event-form" name="add-event-form" method="POST"
                  onsubmit="add_event_validation(event,this)">
                <div class="row first-row">
                    <div class="column2x">
                        <div class="row">
                            <div class="event-name full-width">
                                <label for="eventName">Nombres <span
                                            class="error-label hidden">* This field is required</span>
                                    <span class="error-label-format hidden">* This field is invalid</span></label><span
                                        class="error-php"> <?php echo $eventError; ?></span><br>
                                <input id="eventName" type="text" placeholder="Nombre del Evento" name="eventName"
                                       class="field" value="<?php echo htmlspecialchars($eventName); ?>" required/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="created-by full-width">
                                <label for="createdBy">Responsable</label><br>
                                <input id="createdBy" name="createdBy" type="text" placeholder="Nombre del Responsable"
                                       class="field"
                                      disabled value="<?php echo htmlspecialchars($_SESSION['user']['emailId']); ?>"/>
                            </div>
                        </div>
                    </div>
                    <div class="column2x">
                        <div class="agent-user-image"></div>
                        <button type="button" class="button-primary user-profile-icon"
                                onclick=document.getElementById("event-image").click()>Seleccionar Imagem

                            <input type="hidden" name="MAX_FILE_SIZE"/>
                            <input id="event-image" type="file" name="image" placeholder="Imagen del evento"
                                   class="field"
                                   hidden
                                   value="<?php echo htmlspecialchars($email); ?>" />
                        </button>
                    </div>
                </div>
                <div class="row ">
                    <div class="event-place full-width">
                        <label for="eventPlace">Lugar <span class="error-label hidden">* This field is required</span>
                            <span class="error-label-format hidden">* This field is invalid</span><span
                                    class="error-php"> <?php echo $placeError; ?></span></label>
                        <input id="eventPlace" type="text" placeholder="Direccion del Lugar del Eventos"
                               name="eventPlace" class="field" value="<?php echo htmlspecialchars($eventPlace); ?>" required/>
                    </div>
                </div>
                <div class="row">
                    <div class="event-date column3x">
                        <label for="eventDate">Fecha <span class="error-label hidden">* This field is required</span>
                            <span class="error-label-format hidden">* This field is invalid</span><span
                                    class="error-php"> <?php echo $dateError; ?></span></label>
                        <input id="eventDate" name="eventDate" type="date" placeholder="00/00/0000" class="field"
                               value="<?php echo htmlspecialchars($eventDate); ?>" required/>
                    </div>
                    <div class="event-time column3x">
                        <label for="eventTime">Hora <span class="error-label hidden">* This field is required</span>
                            <span class="error-label-format hidden">* This field is invalid</span><span
                                    class="error-php"> <?php echo $timeError; ?></span></label>
                        <input id="eventTime" name="eventTime" type="time" placeholder="00:00" class="field"
                               value="<?php echo htmlspecialchars($eventTime); ?>" required/>
                    </div>
                    <div class="event-cost column3x">
                        <label for="eventCost">Valor de Boleto <span
                                    class="error-label hidden">* This field is required</span>
                            <span class="error-label-format hidden">* This field is invalid</span><span
                                    class="error-php"> <?php echo $costError; ?></span></label>
                        <input id="eventCost" name="eventCost" type="number" placeholder="$000.00" class="field"
                               value="<?php echo htmlspecialchars($eventCost); ?>" required/>
                    </div>


                </div>
                <div class="eventDescription">
                    <label for="Mensaje">Event Description <span
                                class="error-label hidden">* This field is required</span>
                        <span class="error-label-format hidden">* This field is invalid</span><span
                                class="error-php"> <?php echo $messageError; ?></span></label>
                    <textarea id="Mensaje" placeholder="Di algo sobre nosotros" rows="7" class="field"
                              name="message"
                              value="<?php echo htmlspecialchars($message); ?>" required></textarea>
                </div>

                <div class="row">
                    <button type="submit" name="add-event" class="button-primary">Guardar</button>
                </div>
            </form>
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