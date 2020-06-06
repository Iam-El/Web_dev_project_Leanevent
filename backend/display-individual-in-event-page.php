<?php

include '../backend/connect-database.php';
$query = "select LU.firstName as UserName,LU.userImage as image, LU.emailId as email, LU.phone as phone,LE.eventName as eventname,
LE.createdBy as created from registered_event re INNER JOIN Lean_Events LE  
on LE.id=re.id INNER JOIN Lean_users LU on LU.emailId = re.emailId where LU.roleId = 1;";




$queryStatement = $connection->query($query);
$results = $queryStatement->fetchAll();
if ($results > 0) {
    foreach ($results as $result) {
        echo "<tr class=\"table-body-content\"><td class=\"column-1 details\"><img class=\"details-image\" src=" . $result['image'] . "><span class=\"details-para\">" . $result['UserName'] . "</span></td><td class=\"column-2 direction\">" . $result['email'] . "</td><td class=\"column-3 date\">" . $result['phone'] . "</td><td class=\"column-4 hora\">" . $result['eventname'] . "</td><td class=\"column-5 confirm\">" . $result['created'] . "</td></tr>";
    }
}

?>
