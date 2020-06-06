<?php

include '../backend/connect-database.php';


$query = "SELECT * FROM Lean_Events ";
$queryStatement = $connection->query($query);
$results = $queryStatement->fetchAll();

if ($results > 0) {
    foreach ($results as $result) {
        echo "<tr class=\"table-body-content\"><td class=\"column-1 details\"><img class=\"details-image\" src=" . $result['image'] . "><span class=\"details-para\">" . $result['name'] . "</span></td><td class=\"column-2 direction\">" . $result['place'] . "</td><td class=\"column-3 date\">" . $result['date'] . "</td><td class=\"column-4 hora\">" .  $result['time'] . "</td><td class=\"column-5 confirm\"><button class=\"button-primary\">Confirmer</button></td></tr>";
    }
}


?>
