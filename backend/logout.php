<?php
include '../backend/session.php';


if (isset($_POST["logout"])) {
    unset($_SESSION["user"]);
    header('Location: ./lean-login-page.php');
}
?>