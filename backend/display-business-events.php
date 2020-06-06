<?php

include_once '../backend/connect-database.php';

$query = "SELECT * FROM Lean_Events ";
$queryStatement = $connection->query($query);
$results = $queryStatement->fetchAll();

if ($results > 0) {
    foreach ($results as $result) {
        ?>

        <tr class="table-body-content">
            <td class="column-1 details">
                <img class="details-image" src="<?php echo $result['image'] ?>">
                <span class=\"details-para\"><?php echo $result['eventName'] ?></span>
            </td>
            <td class="column-2 direction"><?php echo $result['place'] ?></td>
            <td class="column-3 date"><?php echo $result['date'] ?></td>
            <td class="column-4 hora"><?php echo $result['time'] ?></td>
            <td class="column-5 confirm">
                <form method="POST">
                    <button type="submit" class="button-primary" name="confirm-event">Confirmer
                    </button>
                    <input name="eventId" hidden value="<?php echo $result['id']; ?>"/>
                    <input name="randomNumber" hidden value="<?php echo rand();  ?>"/>
                </form>
            </td>
        </tr>
        <?php
    }
}
?>