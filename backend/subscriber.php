<?php

include '../backend/connect-database.php';


$success = "";
$error = "";
$email = "";
$resultnew = "";


try {

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if (isset($_POST["subscriber-button"])) {
        $isValid = true;
        if (empty($_POST["email"])) {
            $emailError = "Email  is required";
            $isValid = false;
        } elseif (!preg_match("/^(.+)@([^\.].*)\.([a-z]{2,})$/i", $email = test_input($_POST["email"]))) {
            unset($emailError);
            $emailError = "Please Enter Valid email address";
            $isValid = false;
        } else {
            $isValid = true;
            unset($emailError);


        }
        if ($isValid) {
            $resultnew = "";
            $data = [
                'email' => $_POST['email'],
            ];

        }
        $email = test_input($_POST["email"]);
        $to = $email;
        $subject = "My subject";
        $txt = "Congratulations! You have been subscribed to Lean Website!!!";
        $headers = "From: elsyfernandes215@gmail.com" . "\r\n" .
            "CC: somebodyelse@example.com";
        mail($to, $subject, $txt, $headers);

        $statement = $connection->prepare("INSERT INTO Lean_subscriber(emailId) VALUES (:email)");
        $statement->execute($data);
        $resultnew = true;
        $email = "";
    }

} catch (PDOException $e) {
    $error = $e->getMessage();
}


?>