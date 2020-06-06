<?php

include './connect-database.php';

try {
    $username = $_GET["username"];
    $password = $_GET["password"];
    $query = "SELECT * FROM Lean_users where firstname = '" . $username . "'  and password = '" . $password . "';";
    $queryStatement = $connection->query($query);
    $results = $queryStatement->fetch();
    if($results > 0){
        unset($error);
        $result = array('success' => true, 'roleId' => $results["roleid"]);
    }
    else{
        $result = array('success' => false, 'message' => "user not found");
        header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error', true, 500);
    }
} catch (Exception $e) {
    $result = array('success' => false, 'message' => $e->getMessage());
    header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error', true, 500);
}
echo json_encode($result);

?>