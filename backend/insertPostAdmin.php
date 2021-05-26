<?php

session_start();

$data = array();

include_once 'pdo-connect.php';

try {
    $stmt = $conn->prepare("INSERT INTO published_message (name,title,text,file,user_id) VALUES (:name,:title,:text,:file,:user_id)";
    $stmt->bindParam('user_id', $user_id);


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