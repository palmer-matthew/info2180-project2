<?php

include './connect.php';

$found = false;

if(isset($_SESSION['logged-in'])){
    if($_SESSION['logged-in'] == true && isset($_SESSION['cache'])){
        $issue = $_SESSION['cache'];
        $status = strtolower(filter_var($_POST['status'], FILTER_SANITIZE_STRING));
        try{
            $query = "UPDATE Issue SET status = '{$status}', updated = CURRENT_TIMESTAMP WHERE Issue.id = {$issue}";
            $conn->exec($query);
            
        }catch(Error $e){
            echo "Update Issue Error: ".$e;
        }
    }else{
        echo "Update Issue Error: You need to be logged in to carry out this function";
    }
}else{
    echo "Update Issue Error: You need to be logged in";
}

$conn = null;

?>