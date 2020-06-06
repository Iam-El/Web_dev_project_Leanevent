<?php

include '../backend/connect-database.php';
$result=null;
$error=null;
try {

    if (isset($_POST["register-individual"])) {
        $query = "SELECT roleid FROM lean_roles where rolename = 'individual';";
        $queryStatement = $connection->query($query);
        $results = $queryStatement->fetch();

        if (!isset($_POST['username']) || !isset($_POST['email']) ||
            !isset($_POST['password']) || !isset($_POST['surname']) ||
            !isset($_POST['ciu']) || !isset($_POST['state']) ||
            !isset($_POST['pin']) || !isset($_POST['direction'])) {
            $error = "Required Field";
        } else {
            $data = [
                'username' => $_POST['username'],
                'email' => $_POST['email'],
                'password' => $_POST['password'],
                'surname' => $_POST['surname'],
                'ciu' => $_POST['ciu'],
                'state' => $_POST['state'],
                'pin' => $_POST['pin'],
                'direction' => $_POST['direction'],
                'roleid' => $results[0]['roleId'],
                'id' => 4
            ];
            $statement = $connection->prepare("INSERT INTO lean_users(roleid,emailid,password,firstname, lastname,address,city,state,pin, id) VALUES (:roleid,:email,:password,:username,:surname,:direction,:ciu,:state,:pin, :id)");
            $statement->execute($data);
            header('Location: ./lean-register-page.php');
            $result = "You have been registered successfully";
        }
    } else if (isset($_POST["register-business"])) {
        $query = "SELECT roleid FROM lean_roles where rolename = 'business';";
        $queryStatement = $connection->query($query);
        $results = $queryStatement->fetch();


    } else if (isset($_POST["register-agent"])) {
        $query = "SELECT roleid FROM lean_roles where rolename = 'agent';";
        $queryStatement = $connection->query($query);
        $results = $queryStatement->fetch();

    }

} catch (PDOException $e) {
    $error = $e->getMessage();

}
?>