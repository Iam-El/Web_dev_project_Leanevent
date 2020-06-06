<?php

include '../backend/connect-database.php';
include '../backend/session.php';

if (isset($_POST["confirm-event"] ) && $_SESSION["randomNumber"] !== $_POST["randomNumber"]) {
    try {
        $eventId = $_POST["eventId"];
        $randomNumber = $_POST["randomNumber"];
        $userId = $_SESSION["user"]["emailId"];
        $query = $connection->prepare("SELECT * FROM registered_event where emailId = '$userId' and id='$eventId';");
        $query->execute();
        $results = $query->fetchAll();
        if (!(sizeof($results) > 0)) {
            $statement = $connection->prepare("INSERT INTO registered_event(id,emailId) VALUES ( " . $eventId . ", '" . $userId . "')");
            $statement->execute();
            unset($_SESSION["modal-class"]);
            unset($_SESSION["modal-message"]);
            unset($_SESSION["randomNumber"]);
            $_SESSION["modal-class"] = "modal";
            $_SESSION["randomNumber"] = $randomNumber;
            $_SESSION["modal-message"] = "Gracias por ser un Voluntario en nuestros evento.";
//            header('Location: ./business-user-homepage.php');
        } else {
            unset($_SESSION["modal-class"]);
            unset($_SESSION["modal-message"]);
            unset($_SESSION["randomNumber"]);
            $_SESSION["modal-class"] = "modal";
            $_SESSION["randomNumber"] = $randomNumber;
            $_SESSION["modal-message"] = "You have already confirmed for this event";
//            header('Location: ./business-user-homepage.php');
        }
    } catch (PDOException $e) {
        $error = $e->getMessage();
        var_dump($error);
    }
}
else{
    unset($_SESSION["modal-class"]);
    unset($_SESSION["modal-message"]);
    $_SESSION["modal-class"] = "modal hidden";
}
?>
