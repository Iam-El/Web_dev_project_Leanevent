<?php

include '../backend/connect-database.php';

$user = $_SESSION["user"]["emailId"];
$query = "SELECT * FROM Lean_Events where createdBy = '" . $user . "';";
$queryStatement = $connection->query($query);
$results = $queryStatement->fetchAll();
$index = 0;
if ($results > 0) {
    foreach ($results as $result) {
        $index = $index+1;
        $class = "row-" . $index;
        if($index > 3){
            $class = $class . " hidden";
        }
        echo "<tr class=\"table-body-content events-row ". $class . "\"><td class=\"column-1 details\"><img class=\"details-image\" src=" .
            $result['image'] . "><span class=\"details-para\">" . $result['eventName'] .
            "</span></td><td class=\"column-2 direction\">" . $result['place'] .
            "</td><td class=\"column-3 date\">" . $result['date'] .
            "</td><td class=\"column-4 edit\">" .
            "<form method='POST' name='edit-event'>" .
            "<input class='hidden' name=\"eventId\" value=\"" . $result['id'] . "\"</input>" .
            "<button class=\"button-primary\" name='edit-event'>" .
            "</form>" .
            "<span class=\"fas fa-edit fa-1x\"></span></button>" .
            "</td><td class=\"column-5 confirm\">" .
            "<form method='POST' name='delete-event'>" .
            "<input class='hidden' name=\"eventId\" value=" . $result['id'] . "\"</input>" .
            "<button class=\"button-delete\" name='delete-event'>" .
            "</form>" .
            "<span class=\"fas fa-trash-alt fa-1x\"></span>" .
            "</button></td></tr>";
    }
}


?>

