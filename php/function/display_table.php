<?php

include '../connect.php';

//Display Table Dashboard Functionality :
$found = false;

if(isset($_SESSION['logged-in'])){
    if($_SESSION['logged-in'] == true){
        $type = filter_var($_POST['type'], FILTER_SANITIZE_STRING);
        $results = null;
        if($type == "A"){
            try{
                $query = "SELECT Issue.id, Issue.title, Issue.type, Issue.status, Issue.assigned_to, Issue.created, Users.firstname, Users.lastname FROM Issue LEFT JOIN Users ON Issue.assigned_to = Users.id";
                $stmt = $conn->query($query);
                $results = $stmt->fetchALL(PDO::ASSOC);
                $found = true;
            }catch(Error $e){
                echo "Table Display Error: ".$e->msgfmt_format_message;
            }
        }else if($type == "O"){
            try{
                $query = "SELECT Issue.id, Issue.title, Issue.type, Issue.status, Issue.assigned_to, Issue.created, Users.firstname, Users.lastname FROM Issue LEFT JOIN Users ON Issue.assigned_to = Users.id WHERE Issue.status = 'open'";
                $stmt = $conn->query($query);
                $results = $stmt->fetchALL(PDO::ASSOC);
                $found = true;
            }catch(Error $e){
                echo "Table Display Error: ".$e->msgfmt_format_message;
            }
        }else if($type == "A"){
            try{
                $userid = $_SESSION['userid'];
                $query = "SELECT Issue.id, Issue.title, Issue.type, Issue.status, Issue.assigned_to, Issue.created, Users.firstname, Users.lastname FROM Issue LEFT JOIN Users ON Issue.assigned_to = Users.id WHERE Issue.assigned_to = {$userid}";
                $stmt = $conn->query($query);
                $results = $stmt->fetchALL(PDO::ASSOC);
                $found = true;
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

<? if($found == true):?>
    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Type</th>
                <th>Status</th>
                <th>Assigned to</th>
                <th>Created</th>
            </tr>
        </thead>
        <tbody>
            <? foreach($results as $result):?>
                <tr>
                    <?php
                        $id = strval($result['id']);
                        $className = "A".$id;
                    ?>
                    <td><?= $id." "."<a class='{$className}' href=''>{$result['title']}<a>"?></td>
                    <td><?= $result['type'] ?></td>
                    <td><?= $result['status'] ?></td>
                    <td><?= $result['firstname']." ".$result['lastname'] ?></td>
                    <td><?= $result['created']?></td>
                </tr>
            <? endforeach;?>
        </tbody>
    </table>
<? endif;?>


