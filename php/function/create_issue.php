<?php

include '../connect.php';

//Create Issue Functionality :

if(isset($_SESSION['logged-in'])){
    if($_SESSION['logged-in'] == true){
        $type = filter_var($_POST['type'], FILTER_SANITIZE_STRING);
        $firstname = filter_var($_POST['fname'], FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
        $lastname = filter_var($_POST['lname'], FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
        $password = filter_var($_POST['pswd'], FILTER_SANITIZE_STRING);
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        if($type == "A"){
            try{
                $query = "INSERT INTO Users (firstname, lastname, password, email) VALUES ('{$firstname}','{$lastname}','{$hash}','{$email}')";
                $stmt = $conn->exec($query);
            }catch(Error $e){
                echo "Table Display Error: ".$e->msgfmt_format_message;
            }
        }else{
            echo "Table Display Error: Failed to Display Table";
        }
        
    }else{
        echo "Table Display Error: You need to be logged in to carry out this function";
    }
}else{
    echo "Table Display Error: You need to be logged in";
}

$conn = null;

?>