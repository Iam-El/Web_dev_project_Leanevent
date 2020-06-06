<?php

include '../backend/connect-database.php';
$emailError = "";
$email = "";
$modal = "hidden";


if (isset($_POST["recover-password"])) {

    $isValid = true;

    if (empty($_POST["email"])) {
        $emailError = "*Email  is required";
        $isValid = false;
    } elseif (!preg_match("/^(.+)@([^\.].*)\.([a-z]{2,})$/i", $email = $_POST["email"])) {
        unset($emailError);
        $emailError = "Please Enter Valid email address";
        $isValid = false;
    } else {
        $isValid = true;
        unset($emailError);
        $email = $_POST["email"];
    }
    $modal = "";
    if ($isValid) {
        $result = "";
        $email = $_POST["email"];
        $query = "SELECT password FROM Lean_users where emailId = '$email';";
        $queryStatement = $connection->query($query);
        $results = $queryStatement->fetch();
        $password = $results['password'];
        $to = $email;
        $subject = "My subject";
        $txt = "Your password is $password";
        $headers = "From: elsyfernandes215@gmail.com" . "\r\n" .
            "CC: somebodyelse@example.com";
        mail($to, $subject, $txt, $headers);
        header('Location: ./lean-login-page.php');
    }


}
?>