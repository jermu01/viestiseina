<?php
session_start();

if ($_SESSION['user_id']){
    $user_id = $_SESSION['user_id'];
} else {
    $user_id = false;
}

if (!$user_id){
    $data = array(
        'error' => 'You are not logged in!'
    );
} else {

include_once 'pdo-connect.php';

    try {
        $stmt = $conn->prepare("SELECT * FROM published_message");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $data = $result;

    } catch (PDOException $e){
        $data = array(
            'error' => 'Error: ' . $e->getMessage()
        );
    }

echo json_encode($data, JSON_UNESCAPED_UNICODE);