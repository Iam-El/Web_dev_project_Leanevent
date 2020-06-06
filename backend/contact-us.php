<?php

include '../backend/connect-database.php';

$success = "";
$error = "";
$nameError = "";
$surnameError="";
$emailError = "";
$messageError = "";
$topicError = "";
$username = $email = $surname = $topic = $message = "";

try {
    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if (isset($_POST["contactUs"])) {
        $isValid = true;
        if (empty($_POST["username"])) {
            $nameError = "* Name is required";
            $isValid = false;
        } else {
            unset($nameError);
            $isValid = true;
            $username = test_input($_POST["username"]);
        }

        if (empty($_POST["surname"])) {
            $surnameError = "* Last Name is required";
            $isValid = false;
        } else {
            unset($surnameError);
            $isValid = true;
            $surname = test_input($_POST["surname"]);
        }


        if (empty($_POST["email"])) {
            $emailError = "*Email  is required";
            $isValid = false;
        } elseif (!preg_match("/^(.+)@([^\.].*)\.([a-z]{2,})$/i", $email = test_input($_POST["email"]))) {
            unset($emailError);
            $emailError = "* Please Enter Valid email address";
            $isValid = false;
        } else {
            $isValid = true;
            unset($emailError);
            $email = test_input($_POST["email"]);
        }

        if (empty($_POST["message"])) {
            $messageError = "* Please Type your message";
            $isValid = false;
        } else {
            unset($messageError);
            $isValid = true;
            $message = test_input($_POST["message"]);
        }

        if (empty($_POST["topic"])) {
            $topicError = "* Topic is required";
            $isValid = false;
        } else {
            unset($topicError);
            $isValid = true;
            $topic = test_input($_POST["topic"]);
        }

        if ($isValid) {
            $result = "";
            $username = test_input($_POST["username"]);
            $surname = test_input($_POST["surname"]);
            $email = test_input($_POST["email"]);
            $message = test_input($_POST["message"]);
            $topic = test_input($_POST["topic"]);

            $data = [
                'username' => $username,
                'email' => $email,
                'surname' => $surname,
                'topic' => $topic,
                'message' => $message,
            ];

            $statement = $connection->prepare("INSERT INTO Lean_contact(firstName,lastName,emailId,topic,message) VALUES (:username,:surname,:email,:topic,:message)");
            $statement->execute($data);
            $result = array('success' => true);
            header('Location: ./lean-contact-us.php');
        }
    }


} catch (PDOException $e) {
    $error = $e->getMessage();
}
?>