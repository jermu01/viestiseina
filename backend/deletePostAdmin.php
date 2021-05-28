<?php

session_start();

$data = array();

$id = isset($_GET['id']) ? $_GET['id'] : null;

include_once 'pdo-connect.php';

try {
    $stmt = $conn->prepare("DELETE FROM request_message WHERE id = :message_id;");
    $stmt->bindParam(':message_id', $id);

    if ($stmt->execute() == false){
        $data = array(
            'error' => 'Error occured!'
        );
    } else {
        $data = array(
            'success' => 'Delete successfull!!'
        );
    }

} catch (PDOException $e) {
    $data = array(
        'error' => 'Tapahtui joku virhe!!'
    );
}

header("Content-type: application/json;charset=utf-8");
echo json_encode($data);