<?php

include '../backend/connect-database.php';

$eventAdded = "";

if (isset($_POST["confirm-event"])) {
    try {


        $eventId = $_POST["eventId"];
        $userId = $_SESSION["user"]["emailId"];


        $query = $connection->prepare("SELECT * FROM registered_event where emailId = '$userId' and id='$eventId';");
        var_dump($query);
        $eventAlreadyAdded = $query->execute();
        var_dump($eventAlreadyAdded);
        $eventAlreadyAdded = true;

        if ($eventAlreadyAdded) {


            $statement = $connection->prepare("INSERT INTO registered_event(id,emailId) VALUES ( " . $eventId . ", '" . $userId . "')");
            $eventAdded = $statement->execute();

        } else {
            $confirmError = "You have Already Registered for the event !!";

        }

    } catch (PDOException $e) {
        $error = $e->getMessage();
    }
}

?>
