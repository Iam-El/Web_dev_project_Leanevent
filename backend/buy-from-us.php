<?php
include_once '../backend/connect-database.php';
include_once '../backend/session.php';
try {
    if (isset($_POST["buy"])) {
        $query = "SELECT * FROM Lean_Events where id = '" . $_POST["eventId"] . "';";
        $queryStatement = $connection->query($query);
        $result = $queryStatement->fetch();
        if ($result > 0) {
            $_SESSION["event"] = $result;
            header('Location: ./lean-buy-from-us-cart.php');
        }
    }
} catch (PDOException $e) {
    $error = $e->getMessage();
    echo($error);

}
?>