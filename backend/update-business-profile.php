<?php

include '../backend/connect-database.php';

$imageDir = '../Fernandes_LEANEVENT/image/';
$result = null;
$error = null;

try {

    if (isset($_POST["update-profile"])) {
        $isValid = true;

        if (empty($_POST["phone"])) {
            $phoneError = "*Phone is required";
            $isValid = false;
        } elseif (!preg_match("/^\d{3}-\d{3}-\d{4}$/i", $phone = $_POST["phone"])) {
            unset($phoneError);
            $phoneError = "*Please Enter Valid Phone number";
            $isValid = false;
        } else {
            $isValid = true;
            unset($phoneError);
            $phone = $_POST["phone"];
        }

        if (empty($_POST["password"])) {
            $passwordError = "*Password  is required";
            $isValid = false;
        } elseif (!preg_match("/^\S{0,8}$/i", $password = $_POST["password"])) {
            unset($passwordError);
            $passwordError = "Password should be 0 to 8 NonSpace Characters";
            $isValid = false;
        } else {
            $isValid = true;
            unset($passwordError);
            $password = $_POST["password"];
        }

        if ($isValid) {
            $user = $_SESSION["user"];

            if ($_FILES["userImage"]) {
                var_dump($_FILES["userImage"]);
                var_dump(pathinfo($_FILES["userImage"]["name"]));
                $uploadedFile = $imageDir . str_replace(' ', '-', $user["firstName"]) . '.' . pathinfo($_FILES["userImage"]["name"])['extension'];
                $imageUpdated = move_uploaded_file($_FILES['userImage']['tmp_name'], $uploadedFile);
                var_dump($imageUpdated);
                var_dump($uploadedFile);
            }
            $data = [
                'firstName' => $user["firstName"],
                'emailId' => $user["emailId"],
                'password' => $_POST["password"],
                'lastName' => $user["lastName"],
                'city' => $user["city"],
                'state' => $user["state"],
                'pin' => $user["pin"],
                'address' => $user["address"],
                'roleId' => $user["roleId"],
                'phone' => $_POST["phone"],
                'foundation' => $user["foundation"],
                'typeId' => $user["typeId"],
                'userImage' => $imageUpdated ? $uploadedFile : $user["userImage"]
            ];


            $statement = $connection->prepare("UPDATE Lean_users SET firstName=:firstName, password=:password, lastName=:lastName, city=:city, state=:state, pin=:pin,address=:address, roleId=:roleId, phone=:phone, foundation=:foundation, typeId=:typeId,userImage=:userImage WHERE emailId=:emailId");
            $result = $statement->execute($data);

            $query = "SELECT * FROM Lean_users where emailId = '" . $user["emailId"] . "';";
            $queryStatement = $connection->query($query);
            $results = $queryStatement->fetch();
            if ($results > 0) {
                $_SESSION["user"] = $results;
            }

        }
    }

} catch (PDOException $e) {
    $error = $e->getMessage();
    var_dump($error);
}
?>