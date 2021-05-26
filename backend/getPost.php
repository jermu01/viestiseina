<?php
session_start();

$data = array();

if (isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
} else {
    $data['error'] = "Et ole kirjautunut";
    header("Content-type: application/json;charset=utf-8");
    echo json_encode($data);
    die();

}

$post_id = $_GET['id'];

include_once 'pdo-connect.php';

try {
    $stmt = $conn->prepare("SELECT id, name, title, text, file FROM request_message WHERE id = :postid");     
    $stmt->bindParam(':postid', $post_id);
    
    if ($stmt->execute() == false){
        $data = array(
            'error' => 'Error occured!!'
        );
    } else {
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $data = $result;
    }
} catch (PDOException $e) {
    $data = array(
        'error' => 'Tapahtui joku virhe!!'
    );
}

header("Content-type: application/json;charset=utf-8");
echo json_encode($data);