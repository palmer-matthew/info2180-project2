<?php
session_start();

if(isset($_POST['action'])){
    switch($_POST['action']){
        case '':
            echo "Nothing happened";
        break;

        case 'logout':
            session_unset();
            session_destroy();
            echo "LOG-OUT";
            break;
        
        case 'login':
            include './function/user_login.php';
            break;

        case 'adduser':
            include './function/user_addition.php';
            break;
        
        case 'tdisplay':
            include './function/display_table.php';
            break; 
        
        case 'createissue':
            include './function/create_issue.php';
            break;
        
        case 'cissueinputs':
            include './function/cissueinput.php';
            break;
        
        case 'viewmain':
            include './function/viewmain.php';
            break;

        case 'updateissue':
            include './function/updateissue.php';
            break;

        case 'cache':
            if(isset($_SESSION['logged-in'])){
                if($_SESSION['logged-in'] == true){
                    $_SESSION['cache'] = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
                    echo "Cached Sucessfully";
                }
            }
            break;

        default:
            echo "<h1>Failed to Load Page</h1>";
            break;
    }
    exit();
}else{
    echo "<h1>Failed to Load Page: Action is not set</h1>";
}

?>
