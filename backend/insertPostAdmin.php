<?php

session_start();

$data = array();

include_once 'pdo-connect.php';

$id = isset($_GET['id']) ? $_GET['id'] : null;

try {
    $stmt = $conn->prepare("UPDATE request_message SET published = 1 WHERE id = :message_id;");
    $stmt->bindParam(':message_id', $id);
    

    if ($stmt->execute() == false){
        $data = array(
            'error' => 'Error occured!'
        );
    } else {
        $data = array(
            'success' => 'DONE!!'
        );
    }

} catch (PDOException $e) {
    $data = array(
        'error' => 'Tapahtui joku virhe!!'
    );
}

header("Content-type: application/json;charset=utf-8");
echo json_encode($data);