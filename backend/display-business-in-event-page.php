<?php

include '../backend/connect-database.php';
$query = "select LU.foundation as foundation, LE.eventName as eventName, LU.userImage as image ,LE.createdBy as created from registered_event re INNER JOIN Lean_Events LE  on LE.id=re.id INNER JOIN Lean_users LU on LU.emailId = re.emailId where LU.roleId = 2;";

$queryStatement = $connection->query($query);
$results = $queryStatement->fetchAll();
if ($results > 0) {
    foreach ($results as $result) {
        echo "<tr class=\"table-body-content\"><td class=\"column-1 details\"><img class=\"details-image\" src=" . $result['image'] . "><span class=\"details-para\">" . $result['foundation'] . "</span></td><td class=\"column-2 direction\">" . $result['eventName'] . "</td><td class=\"column-3 date\">" . $result['created'] . "</td><td class=\"column-4 hora\">10%</td><td class=\"column-5 confirm\"><button class=\"button-primary\">Confirmer</button></td></tr>";
    }
}

?>
