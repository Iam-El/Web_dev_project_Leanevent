<?php

include '../backend/connect-database.php';

$error = null;
$username = $email = $password = $surname = $ciu = $state = $direction = "";
$pin = NULL;
$nameError = "";
$passwordError = "";
$emailError = "";
$pinError = "";
$lastnameError = "";
$businessTypeError = "";
$directionError = "";
$stateError = "";
$ciuError = "";
$foundationError = "";

try {

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }


    if (isset($_POST["register-individual"])) {
        try {
            $isValid = true;
            $query = "SELECT roleId FROM Lean_roles where roleName = 'individual';";
            $queryStatement = $connection->query($query);
            $results = $queryStatement->fetch();
            if (empty($_POST["username"])) {
                $nameError = "*Name is required";
                $isValid = false;
            } else {
                unset($nameError);
                $isValid = true;
                $username = test_input($_POST["username"]);
            }

            if (empty($_POST["surname"])) {
                $lastnameError = "*Last name is required";
                $isValid = false;
            } else {
                unset($lastnameError);
                $isValid = true;
                $surname = test_input($_POST["surname"]);
            }

            if (empty($_POST["direction"])) {
                $directionError = "*Direction is required";
                $isValid = false;
            } else {
                unset($directionError);
                $isValid = true;
                $direction = test_input($_POST["direction"]);
            }


            if (empty($_POST["ciu"])) {
                $ciuError = "*City is required";
                $isValid = false;
            } else {
                unset($ciuError);
                $isValid = true;
                $ciu = test_input($_POST["ciu"]);
            }

            if (empty($_POST["state"])) {
                $stateError = "*State is required";
                $isValid = false;
            } else {
                unset($stateError);
                $isValid = true;
                $state = test_input($_POST["state"]);
            }

            if (empty($_POST["password"])) {
                $passwordError = "*Password  is required";
                $isValid = false;
            } elseif (!preg_match("/^\S{0,8}$/i", $password = test_input($_POST["password"]))) {
                unset($passwordError);
                $passwordError = "Password should be 0 to 8 NonSpace Characters";
                $isValid = false;
            } else {
                $isValid = true;
                unset($passwordError);
                $password = test_input($_POST["password"]);
            }

            if (empty($_POST["email"])) {
                $emailError = "*Email  is required";
                $isValid = false;
            } elseif (!preg_match("/^(.+)@([^\.].*)\.([a-z]{2,})$/i", $email = test_input($_POST["email"]))) {
                unset($emailError);
                $emailError = "Please Enter Valid email address";
                $isValid = false;
            } else {
                $isValid = true;
                unset($emailError);
                $email = test_input($_POST["email"]);
            }

            if (empty($_POST["pin"])) {
                $pinError = "*Pin Code is required";
                $isValid = false;
            } else if (!preg_match("/^\d{5}(-\d{4})?$/", $pin = intval($_POST["pin"]))) {
                unset($pinError);
                $pinError = "Enter Valid American Zip Code";
                $isValid = false;
            } else {
                $isValid = true;
                unset($pinError);
                $pin = test_input($_POST["pin"]);
            }

            if ($isValid) {
                $result = "";
                $username = test_input($_POST["username"]);
                $surname = test_input($_POST["surname"]);
                $password = test_input($_POST["password"]);
                $email = test_input($_POST["email"]);
                $ciu = test_input($_POST["ciu"]);
                $state = test_input($_POST["state"]);
                $direction = test_input($_POST["direction"]);
                $pin = test_input($_POST["pin"]);


                $data = [
                    'username' => $username,
                    'email' => $email,
                    'password' => $password,
                    'surname' => $_POST['surname'],
                    'ciu' => $ciu,
                    'state' => $state,
                    'pin' => $pin,
                    'direction' => $direction,
                    'roleid' => $results[0]['roleId'],
                    'id' => 4,

                ];


                $statement = $connection->prepare("INSERT INTO Lean_users(roleId,emailId,password,firstName, lastName,address,city,state,pin, typeId) VALUES (:roleid,:email,:password,:username,:surname,:direction,:ciu,:state,:pin, :id)");
                $statement->execute($data);
                $username = $surname = $password = $email = $ciu = $state = $direction = $pin = "";
                $nameError = $passwordError = $emailError = $pinError = $businessTypeError =  "";
                $individualModalClass = "modal hidden";
                $result = true;
                if ($result) {
                    ?>

                                    <script>if (confirm("You are Registered Successfully as a individual!!!")) {
                                            window.location.href = "./lean-login-page.php";
                                        }</script>
                                    <?php
                }


            } else {
                $individualModalClass = "modal";
            }
        } catch (PDOException $e) {
            $error = $e->getMessage();
            $individualModalClass = "modal";
        }

    } else if (isset($_POST["register-business"])) {
        try {
            $isValid = true;
            $query = "SELECT roleId FROM Lean_roles where roleName = 'business';";
            $queryStatement = $connection->query($query);
            $results = $queryStatement->fetch();

            $businessType = $_POST['business-type'];
            $query1 = "SELECT typeId FROM lean_businesstype where businessTypeName = '" . $businessType . "';";
            $queryStatement2 = $connection->query($query1);
            $businessTypeResults = $queryStatement2->fetch();


            if (empty($_POST["username"])) {
                $nameError = "*Name is required";
                $isValid = false;
            } else {
                unset($nameError);
                $isValid = true;
                $username = test_input($_POST["username"]);
            }

            if (empty($_POST["surname"])) {
                $lastnameError = "*Last name is required";
                $isValid = false;
            } else {
                unset($lastnameError);
                $isValid = true;
                $surname = test_input($_POST["surname"]);
            }

            if (empty($_POST["direction"])) {
                $directionError = "*Direction is required";
                $isValid = false;
            } else {
                unset($directionError);
                $isValid = true;
                $direction = test_input($_POST["direction"]);
            }

            if (empty($_POST["ciu"])) {
                $ciuError = "*City is required";
                $isValid = false;
            } else {
                unset($ciuError);
                $isValid = true;
                $ciu = test_input($_POST["ciu"]);
            }
            if (empty($_POST["foundation"])) {
                $foundationError = "* Foundation is required";
                $isValid = false;
            } else {
                unset($foundationError);
                $isValid = true;
                $foundation = test_input($_POST["foundation"]);
            }

            if (empty($_POST["state"])) {
                $stateError = "*State is required";
                $isValid = false;
            } else {
                unset($stateError);
                $isValid = true;
                $state = test_input($_POST["state"]);
            }


            if (empty($_POST["password"])) {
                $passwordError = "*Password  is required";
                $isValid = false;
            } elseif (!preg_match("/^\S{0,8}$/i", $password = test_input($_POST["password"]))) {
                unset($passwordError);
                $passwordError = "Password should be 0 to 8 NonSpace Characters";
                $isValid = false;
            } else {
                $isValid = true;
                unset($passwordError);
                $password = test_input($_POST["password"]);
            }

            if (empty($_POST["email"])) {
                $emailError = "*Email  is required";
                $isValid = false;
            } elseif (!preg_match("/^(.+)@([^\.].*)\.([a-z]{2,})$/i", $email = test_input($_POST["email"]))) {
                unset($emailError);
                $emailError = "Please Enter Valid email address";
                $isValid = false;
            } else {
                $isValid = true;
                unset($emailError);
                $email = test_input($_POST["email"]);
            }

            if (empty($_POST["pin"])) {
                $pinError = "*Pin Code is required";
                $isValid = false;
            } else if (!preg_match("/^\d{5}(-\d{4})?$/", $pin = intval($_POST["pin"]))) {
                unset($pinError);
                $pinError = "Enter Valid American Zip Code";
                $isValid = false;
            } else {
                $isValid = true;
                unset($pinError);
                $pin = test_input($_POST["pin"]);
            }

            if (empty($_POST["business-type"])) {
                $businessTypeError = "*This Field is required";
                $isValid = false;
            } else {
                $isValid = true;
                unset($businessTypeError);
                $gtype = intval($_POST["business-type"]);
            }

            if ($isValid) {
                $result = "";
                $username = test_input($_POST["username"]);
                $surname = test_input($_POST["surname"]);
                $password = test_input($_POST["password"]);
                $email = test_input($_POST["email"]);
                $ciu = test_input($_POST["ciu"]);
                $state = test_input($_POST["state"]);
                $direction = test_input($_POST["direction"]);
                $pin = test_input($_POST["pin"]);
                $gtype = intval($_POST["business-type"]);
                $foundation = test_input($_POST["foundation"]);


                $data = [
                    'username' => $username,
                    'email' => $email,
                    'password' => $password,
                    'surname' => $_POST['surname'],
                    'ciu' => $ciu,
                    'state' => $state,
                    'pin' => $pin,
                    'direction' => $direction,
                    'roleid' => $results[0]['roleId'],
                    'id' => $businessTypeResults[0]['value'],
                    'foundation' => $foundation
                ];


                $statement = $connection->prepare("INSERT INTO lean_users(roleId,emailId,password,firstName,lastName,address,city,state,pin, typeId,foundation) VALUES (:roleid,:email,:password,:username,:surname,:direction,:ciu,:state,:pin, :id,:foundation)");
                $statement->execute($data);
                $username = $surname = $password = $email = $ciu = $state = $direction = $pin = $gtype = "";
                $businessModalClass = "modal hidden";
                $result = true;
                if ($result) {
                    ?>

                    <script>if (confirm("You are Registered Successfully as business!!!")) {
                            window.location.href = "./lean-login-page.php";
                        }</script>
                    <?php
                }

            } else {
                $businessModalClass = "modal";
            }
        } catch (PDOException $e) {
            $error = $e->getMessage();
            $businessModalClass = "modal";
        }


    } else if (isset($_POST["register-agent"])) {
        try {
            $isValid = true;
            $query = "SELECT roleId FROM Lean_roles where roleName = 'agent';";
            $queryStatement = $connection->query($query);
            $results = $queryStatement->fetch();
            if (empty($_POST["username"])) {
                $nameError = "*Name is required";
                $isValid = false;
            } else {
                unset($nameError);
                $isValid = true;
                $username = test_input($_POST["username"]);
            }

            if (empty($_POST["surname"])) {
                $lastnameError = "*Last name is required";
                $isValid = false;
            } else {
                unset($lastnameError);
                $isValid = true;
                $surname = test_input($_POST["surname"]);
            }

            if (empty($_POST["direction"])) {
                $directionError = "*Direction is required";
                $isValid = false;
            } else {
                unset($directionError);
                $isValid = true;
                $direction = test_input($_POST["direction"]);
            }

            if (empty($_POST["ciu"])) {
                $ciuError = "*City is required";
                $isValid = false;
            } else {
                unset($ciuError);
                $isValid = true;
                $ciu = test_input($_POST["ciu"]);
            }

            if (empty($_POST["state"])) {
                $stateError = "*State is required";
                $isValid = false;
            } else {
                unset($stateError);
                $isValid = true;
                $state = test_input($_POST["state"]);
            }

            if (empty($_POST["password"])) {
                $passwordError = "*Password  is required";
                $isValid = false;
            } elseif (!preg_match("/^\S{0,8}$/i", $password = test_input($_POST["password"]))) {
                unset($passwordError);
                $passwordError = "Password should be 0 to 8 NonSpace Characters";
                $isValid = false;
            } else {
                $isValid = true;
                unset($passwordError);
                $password = test_input($_POST["password"]);
            }

            if (empty($_POST["email"])) {
                $emailError = "*Email  is required";
                $isValid = false;
            } elseif (!preg_match("/^(.+)@([^\.].*)\.([a-z]{2,})$/i", $email = test_input($_POST["email"]))) {
                unset($emailError);
                $emailError = "Please Enter Valid email address";
                $isValid = false;
            } else {
                $isValid = true;
                unset($emailError);
                $email = test_input($_POST["email"]);
            }

            if (empty($_POST["pin"])) {
                $pinError = "*Pin Code is required";
                $isValid = false;
            } else if (!preg_match("/^\d{5}(-\d{4})?$/", $pin = intval($_POST["pin"]))) {
                unset($pinError);
                $pinError = "Enter Valid American Zip Code";
                $isValid = false;
            } else {
                $isValid = true;
                unset($pinError);
                $pin = test_input($_POST["pin"]);
            }

            if ($isValid) {
                $result = "";
                $username = test_input($_POST["username"]);
                $surname = test_input($_POST["surname"]);
                $password = test_input($_POST["password"]);
                $email = test_input($_POST["email"]);
                $ciu = test_input($_POST["ciu"]);
                $state = test_input($_POST["state"]);
                $direction = test_input($_POST["direction"]);
                $pin = test_input($_POST["pin"]);

                $data = [
                    'username' => $username,
                    'email' => $email,
                    'password' => $password,
                    'surname' => $_POST['surname'],
                    'ciu' => $ciu,
                    'state' => $state,
                    'pin' => $pin,
                    'direction' => $direction,
                    'roleid' => $results[0]['roleId'],
                    'id' => 4
                ];


                $statement = $connection->prepare("INSERT INTO Lean_users(roleId,emailId,password,firstName, lastName,address,city,state,pin, typeId) VALUES (:roleid,:email,:password,:username,:surname,:direction,:ciu,:state,:pin, :id)");
                $statement->execute($data);
                $username = $surname = $password = $email = $ciu = $state = $direction = $pin = "";
                $nameError = $passwordError = $emailError = $pinError = $businessTypeError = "";
                $result = true;
                $agentModalClass = "modal hidden";
                if ($result) {
                    ?>

                    <script>if (confirm("You are Registered Successfully as an agent!!!")) {
                            window.location.href = "./lean-login-page.php";
                        }</script>
                    <?php
                }

            } else {
                $agentModalClass = "modal";
            }
        } catch (PDOException $e) {
            $error = $e->getMessage();
            $agentModalClass = "modal";
        }

    }

} catch (PDOException $e) {
    $result = $e->getMessage();
    $error = $e->getMessage();
    $modalClass = "modal";
}
?>