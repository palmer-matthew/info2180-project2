<?php

include './connect.php';

//Create Issue Functionality - In Progress:

if(isset($_SESSION['logged-in'])){
    if($_SESSION['logged-in'] == true){
        
        $title = filter_var($_POST['title'], FILTER_SANITIZE_STRING);
        $description = filter_var($_POST['desc'], FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
        $type = filter_var($_POST['type'], FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
        $priority = filter_var($_POST['prior'], FILTER_SANITIZE_STRING);
        $assigned_to = filter_var($_POST['assign'], FILTER_SANITIZE_NUMBER_INT);
        $created_by = $_SESSION['userid'];

        try{
            $query = "INSERT INTO Issue (title, description, type, priority, status, assigned_to, created_by) VALUES ('{$title}','{$description}','{$type}','{$priority}', 'open', {$assigned_to}, {$created_by})";
            $stmt = $conn->exec($query);
        }catch(Error $e){
            echo "Create Issue Error: ".$e->msgfmt_format_message;
        }
        
        
    }else{
        echo "Create Issue Error: You need to be logged in to carry out this function";
    }
}else{
    echo "Create Issue Error: You need to be logged in";
}

$conn = null;

?>