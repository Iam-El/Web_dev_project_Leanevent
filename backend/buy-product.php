<?php
include_once '../backend/connect-database.php';
try {
    if (isset($_POST["buy-product"])) {

        $data = [
            'emailId' => $_POST["email"],
            'eventId' => intval($_POST["eventId"]),
            'quantity' =>intval($_POST["quantity"])
        ];

        $query = $connection->prepare("INSERT INTO tickets(emailId,eventId, quantity) VALUES (:emailId,:eventId, :quantity);");
        $query->execute($data);
    }
} catch (PDOException $e) {
    $error = $e->getMessage();
    var_dump($error);
}
?>