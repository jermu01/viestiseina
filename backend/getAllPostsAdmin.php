<?php

session_start();

    include_once 'pdo-connect.php';

    try {
        $stmt = $conn->prepare("SELECT * FROM request_message WHERE published = 1");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $data = $result;

    } catch (PDOException $e){
        $data = array(
            'error' => 'Error: ' . $e->getMessage()
        );
    }

echo json_encode($data, JSON_UNESCAPED_UNICODE);