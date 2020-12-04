<?php

include '../connect.php';


//User Addition Functionality :

if(isset($_SESSION['logged-in'])){
    if($_SESSION['username'] == 'admin@project2.com' && $_SESSION['logged-in'] == true){
        $firstname = filter_var($_POST['fname'], FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
        $lastname = filter_var($_POST['lname'], FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
        $password = filter_var($_POST['pswd'], FILTER_SANITIZE_STRING);
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

        $regex_string = "/^[a-zA-Z]+$/";
        $regex_password = "/^(?=.+[0-9])(?=.+[a-z])(?=.+[A-Z])([a-zA-Z0-9]+)$/";

        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            if(sizeof($password) >= 8 && preg_match($regex_password, $password)){
                $hash = password_hash($password, PASSWORD_DEFAULT);
                try{
                    $query = "INSERT INTO Users (firstname, lastname, password, email) VALUES ('{$firstname}','{$lastname}','{$hash}','{$email}')";
                    $conn->exec($query);
                }catch(Error $e){
                    echo "User Addition Error: ".$e->msgfmt_format_message;
                }
            }
        }else{
            echo "User Addition Error: Email is not in the correct format";
        }
    }else{
        echo "User Addition Error: You need to be logged in as an administrator to complete this function";
    }
}else{
    echo "User Addition Error: You need to be logged in";
}
