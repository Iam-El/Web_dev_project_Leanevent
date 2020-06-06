<?php

include '../backend/connect-database.php';

$imageDir = '../Fernandes_LEANEVENT/image/';
$result = null;
$error = null;
try {

    if (isset($_POST["update-event"])) {
        function test_input($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $isValid = true;


        if (empty($_POST["eventName"])) {
            $eventError = "* Event name is required";
            $isValid = false;
        } else {
            unset($eventError);
            $isValid = true;
            $eventName = test_input($_POST["eventName"]);
        }

        if (empty($_POST["createdBy"])) {
            $createdbyError = "* Created by is required";
            $isValid = false;
        } else {
            unset($createdbyError);
            $isValid = true;
            $createdBy = $_SESSION['user']['emailId'];
        }

        if (empty($_POST["eventDate"])) {
            $dateError = "* Date is required";
            $isValid = false;
        } else {
            unset($dateError);
            $isValid = true;
            $eventDate = test_input($_POST["eventDate"]);
        }

        if (empty($_POST["eventPlace"])) {
            $placeError = "* Place is required";
            $isValid = false;
        } else {
            unset($placeError);
            $eventPlace = test_input($_POST["eventPlace"]);
        }

        if (empty($_POST["eventTime"])) {
            $timeError = "* Time is required";
            $isValid = false;
        } else {
            unset($timeError);
            $eventTime = test_input($_POST["eventTime"]);
        }

        if (empty($_POST["eventCost"])) {
            $costError = "* Cost is required";
            $isValid = false;
        } else {
            unset($costError);
            $eventCost = test_input($_POST["eventCost"]);
        }

        if (empty($_POST["message"])) {
            $messageError = "* Please fill in event description";
            $isValid = false;
        } else {
            unset($messageError);
            $message = test_input($_POST["message"]);
        }


        if ($isValid) {
            $result = "";
            $isImageChanged = strlen($_FILES["image"]["name"]) !== 0;
            if ($isImageChanged) {
                $uploadedFile = $imageDir . str_replace(' ', '-', $_POST['eventName']) . '.' . pathinfo($_FILES["image"]["name"])['extension'];
            }
            if (!$isImageChanged || (move_uploaded_file($_FILES['image']['tmp_name'], $uploadedFile))) {
                $data = [
                    'eventName' => $eventName,
                    'eventDate' => $eventDate,
                    'eventPlace' => $eventPlace,
                    'eventCost' => $eventCost,
                    'eventTime' => $eventTime,
                    'createdBy' => $_SESSION['user']['emailId'],
                    'image' => $isImageChanged ? $uploadedFile : $_SESSION["event"]["image"],
                    'message' => $message,
                    'id' => intval($_POST['eventId'])
                ];

                $statement = $connection->prepare("UPDATE Lean_Events SET eventName=:eventName, date=:eventDate, place=:eventPlace, cost=:eventCost, time=:eventTime, image=:image,eventDescription=:message, createdBy=:createdBy WHERE id=:id");
                $statement->execute($data);
                $result = "Your event has been updated successfully";
                $query = "SELECT * FROM Lean_Events where id = '" . intval($_POST['eventId']) . "';";
                $queryStatement = $connection->query($query);
                $result = $queryStatement->fetch();
                if ($result > 0) {
                    unset($_SESSION["event"]);
                    $_SESSION["event"] = $result;
                    header('Location: ./agent-list-events.php');
                }

            } else {
                $result =  "Could not update your event.";
            }
        }
    }

} catch (PDOException $e) {
    $error = $e->getMessage();
    var_dump($error);
}
?>