<?php

include '../backend/connect-database.php';

$imageDir = '../Fernandes_LEANEVENT/image/';
$result = null;
$error = null;
$eventError = $createdbyError = $dateError = $placeError = $timeError = $costError = $costError = $messageError = "";
try {

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $isValid = true;

    if (isset($_POST["add-event"])) {
        if (empty($_POST["eventName"])) {
            $eventError = "*Event name is required";
            $isValid = false;
        } else {
            unset($eventError);
            $isValid = true;
            $eventName = test_input($_POST["eventName"]);
        }

        if (empty($_POST["createdBy"])) {
            $createdbyError = "*Created by is required";
            $isValid = false;
        } else {
            unset($createdbyError);
            $isValid = true;
            $createdBy = $_SESSION['user']['emailId'];
        }

        if (empty($_POST["eventDate"])) {
            $dateError = "*Date is required";
            $isValid = false;
        } else {
            unset($dateError);
            $isValid = true;
            $eventDate = test_input($_POST["eventDate"]);
        }

        if (empty($_POST["eventPlace"])) {
            $placeError = "*Place is required";
            $isValid = false;
        } else {
            unset($placeError);
            $isValid = true;
            $eventPlace = test_input($_POST["eventPlace"]);
        }

        if (empty($_POST["eventTime"])) {
            $timeError = "*Time is required";
            $isValid = false;
        } else {
            unset($timeError);
            $isValid = true;
            $eventTime = test_input($_POST["eventTime"]);
        }

        if (empty($_POST["eventCost"])) {
            $costError = "*Cost is required";
            $isValid = false;
        } else {
            unset($costError);
            $isValid = true;
            $eventCost = test_input($_POST["eventCost"]);
        }

        if (empty($_POST["message"])) {
            $messageError = "*Please fill in event description";
            $isValid = false;
        } else {
            unset($messageError);
            $isValid = true;
            $message = test_input($_POST["message"]);
        }

        if ($isValid) {
            $result = "";
            $eventCost = test_input($_POST["eventCost"]);
            $eventTime = test_input($_POST["eventTime"]);
            $eventPlace = test_input($_POST["eventPlace"]);
            $eventDate = test_input($_POST["eventDate"]);
            $eventName = test_input($_POST["eventName"]);
            $message = $_POST["message"];

            $uploadedFile = $imageDir . str_replace(' ', '-', $_POST['eventName']) . '.' . pathinfo($_FILES["image"]["name"])['extension'];
            if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadedFile)) {
                $data = [
                    'eventName' => $eventName,
                    'eventDate' => $eventDate,
                    'eventPlace' => $eventPlace,
                    'eventCost' => $eventCost,
                    'eventTime' => $eventTime,
                    'createdBy' => $_SESSION['user']['emailId'],
                    'image' => $uploadedFile,
                    'description'=> $message
                ];
                $statement = $connection->prepare("INSERT INTO Lean_Events(eventName,date,place,cost,time,createdBy,image, eventDescription) VALUES (:eventName,:eventDate,:eventPlace,:eventCost,:eventTime,:createdBy, :image, :description)");
                $statement->execute($data);
                $result = true;
                if ($result) {
                    ?>
                    <script>if (confirm("Event is added to the list")) {
                            window.location.href = "./agent-list-events.php";
                        }</script>
                    <?php
                }

            } else {
                echo "Error";
            }
        }
    }

} catch (PDOException $e) {
    $error = $e->getMessage();
    var_dump($error);

}
?>