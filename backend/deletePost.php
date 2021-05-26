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

if (!isset($_GET['id'])){
    $data['error'] = "Ei get-parmatetreja";
    header("Content-type: application/json;charset=utf-8");
    echo json_encode($data);
    die();
} else {
    $post_id = $_GET['id'];
}

include_once 'pdo-connect.php';

try {
    $stmt = $conn->prepare("DELETE FROM request_message WHERE user_id = :userid AND id = :postid;");
    $stmt->bindParam('userid', $user_id);
    $stmt->bindParam('postid', $post_id);

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