<?php

include_once '../backend/session.php';
include '../backend/connect-database.php';

try {
    if (isset($_POST["edit-event"])) {
        $query = "SELECT * FROM Lean_Events where id = '" . $_POST["eventId"] . "';";
        $queryStatement = $connection->query($query);
        $result = $queryStatement->fetch();
        if ($result > 0) {
            $_SESSION["event"] = $result;
            header('Location: ./agent-edit-event.php');
        }
    }
} catch (PDOException $e) {
    $error = $e->getMessage();
    echo ($error);

}

?>

