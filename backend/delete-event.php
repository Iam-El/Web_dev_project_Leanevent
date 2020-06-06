<?php

include_once '../backend/session.php';
include_once '../backend/connect-database.php';

try {
    if (isset($_POST["delete-event"])) {
        $query = "DELETE FROM Lean_Events where id = " . intval($_POST["eventId"]) . ";";
        $connection->exec($query);
        header('Location: ./agent-list-events.php');
    }
} catch (PDOException $e) {
    $error = $e->getMessage();
    var_dump($error);
}

?>

