<?php
session_start();

if(isset($_POST['action'])){
    switch($_POST['action']){
        case '':
        break;

        case 'logout':
            session_unset();
            session_destroy();
            echo "LOG-OUT";
            break;

        case 'adduser':
            include './function/user_addition.php';
            break;

        default:
            echo "<h1>Failed to Load Page</h1>";
            break;
    }
    exit();
}else{
    echo "<h1>Failed to Load Page</h1>";
}

?>
