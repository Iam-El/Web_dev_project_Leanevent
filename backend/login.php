<?php
try {
    if (isset($_POST["login-submit"])) {
        include '../backend/connect-database.php';

        $username = $_POST["username"];
        $password = $_POST["password"];

        if (empty($_POST["username"]) && empty($_POST["password"])) {
            $nameError = "* Both fields are required";

        } else if (empty($_POST["username"]) || empty($_POST["password"])) {
            $nameError = "* Both Fields are required";

        } else {
            $username = $_POST["username"];
            $password = $_POST["password"];
            $query = "SELECT * FROM Lean_users where emailId = '" . $username . "';";
            $queryStatement = $connection->query($query);
            $results = $queryStatement->fetch();


            if ($results > 0) {
                if ($results["password"] !== $password) {
                    $noMatchingFields = "Username and password doesnt match";
                } else {
                    include '../backend/session.php';
                    $_SESSION["user"] = $results;
                    $user = $_SESSION["user"];

                    if ($user["roleId"] == 1) {
                        header('Location: ./individual-user-homepage.php');
                    } else if ($user["roleId"] == 2) {
                        header('Location: ./business-user-homepage.php');
                    } else {
                        header('Location: ./agent-user-homepage.php');
                    }
                }

            } else {
                ?>

                <script>if (confirm("You are not a registered User!! Please Register before login!!")) {
                        window.location.href = "./lean-register-page.php";
                    }</script>
                <?php


            }
        }

    }
} catch (Exception $e) {
    $error = $e->getMessage();
}

?>