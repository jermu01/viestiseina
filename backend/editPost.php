<?php

session_start();
// Check if user is logged in
if (!isset($_SESSION['user_id'])){
    $data = array(
        'error' => 'You`re not allowed here!!'
    );

    header("Contest-Type: application/json;charset=utf-8");
    echo json_encode($data);
    die();
}


$data = array();

    include_once 'pdo-connect.php';

    $id = $_POST['id'];
    $name = $_POST['name'];
    $title = $_POST['title'];
    $text = $_POST['text'];
    $file = $_FILES['file']['name'];
    

    $img_name = basename($_FILES['file']['name']);
    $tar_dir = "uploads/";
    $target_file = $tar_dir . $img_name;
    $uploadNow = 1;


// Uptade Post-table
try {
    $stmt = $conn->prepare("UPDATE request_message SET name = '$name', title = '$title', text = '$text', file = '$file' WHERE id = '$id' ");

    if (move_uploaded_file($_FILES['file']['tmp_name'], $target_file)) {
        $msg = "File is uploaded!!";
    } else {
        $msg = "File is not uploaded!!";
    }

    if ($stmt->execute() == false){
        $data['error'] = 'Error editing post!!';
    } else {
        $data['success'] = 'Post edit successfull!!';
    }

    } catch (PDOException $e){
        $data['error'] = $e->getMessage();
    }


header("Content-type: application/json;charset=utf-8");
echo json_encode($data);