<?php

include './connect.php';

//Building the DropDown Field for Assigned To Value Functionality

if(isset($_SESSION['logged-in'])){
    if($_SESSION['logged-in'] == true){
        $results = null;
        $str = "";
        $id = $_SESSION['userid'];
        try{
            $query = "SELECT * FROM Users WHERE Users.id <> {$id}";
            $stmt = $conn->query($query);
            $results = $stmt->fetchALL(PDO::FETCH_ASSOC);
        }catch(Error $e){
            echo "Table Display Error: ".$e->msgfmt_format_message;
        }
        if(sizeof($results) > 0){
            foreach($results as $row){
                $str .= "<option value='{$row['id']}'>{$row['firstname']}  {$row['lastname']}</option>";
            }
            echo $str;
        }else{
            echo "";
        }
    }else{
        echo "Create Issue Input Error: You need to be logged in to use this function";
    }
}else{
    echo "Create Issue Input Error: You need to be logged in";
}


