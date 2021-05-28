<?php

if (!isset($_POST['username']) || !isset($_POST['password'])){
    $data = array(
        'error' => 'POST-dataa ei saatavilla!'
    );
    die();
}

$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

include_once 'pdo-connect.php';

try {
    $stmt = $conn->prepare("INSERT INTO admin_user (username, password) VALUES (:username, :password);");
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    if($stmt->execute() == false){
        $data = array(
            'error' => 'Tapahtui joku virhe tallennuksessa!'
        );
    } else {
        $data = array(
            'success' => 'Uusi käyttäjä on tallennettu!'
        );
    }

} catch (PDOException $e) {
    $data = array(
        'error' => 'Tapahtui joku virhe!!'
    );
}

header("Content-type: application/json;charset=utf-8");
echo json_encode($data);