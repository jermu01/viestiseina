<?php

session_start();


include_once 'backend/pdo-connect.php';

    if(isset($_POST['insert'])) {
        $name = $_POST['name'];
        $title = $_POST['title'];
        $text = $_POST['text'];
        $file = $_FILES['file']['name'];
        $user_id = $_SESSION['user_id'];

    if(isset($_POST['insert'])) {
        $img_name = basename($_FILES['file']['name']);
        $tar_dir = "uploads/";
        $target_file = $tar_dir . $img_name;
        $uploadNow = 1;


        $pdoQuery = "INSERT INTO request_message (name,title,text,file,user_id) VALUES (:name,:title,:text,:file,:user_id)";

        if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
            $msg = "File is uploaded!!";
        } else {
            $msg = "File is not uploaded!!";
        }

        $pdoQuery_run = $conn->prepare($pdoQuery);

        $pdoQuery_exec = $pdoQuery_run->execute(array(":name"=>$name, ":title"=>$title, ":text"=>$text, ":file"=>$file, ":user_id"=>$user_id ));
        if ($pdoQuery_exec) {
            echo 'Data Inserted!!';
            header("location: admin.php?uploadsuccess");
        } else {
            echo 'Data Not Inserted!!';
        }
    }
}

?>