<?php

include './connect.php';

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
                $results = $stmt->fetchALL(PDO::FETCH_ASSOC);
                if($results != null){
                    $found = true;
                }
            }catch(Error $e){
                echo "Table Display Error: ".$e->msgfmt_format_message;
            }
        }else if($type == "O"){
            try{
                $query = "SELECT Issue.id, Issue.title, Issue.type, Issue.status, Issue.assigned_to, Issue.created, Users.firstname, Users.lastname FROM Issue LEFT JOIN Users ON Issue.assigned_to = Users.id WHERE Issue.status = 'open'";
                $stmt = $conn->query($query);
                $results = $stmt->fetchALL(PDO::FETCH_ASSOC);
                if($results != null){
                    $found = true;
                }
            }catch(Error $e){
                echo "Table Display Error: ".$e->msgfmt_format_message;
            }
        }else if($type == "M"){
            try{
                $userid = $_SESSION['userid'];
                $query = "SELECT Issue.id, Issue.title, Issue.type, Issue.status, Issue.assigned_to, Issue.created, Users.firstname, Users.lastname FROM Issue LEFT JOIN Users ON Issue.assigned_to = Users.id WHERE Issue.assigned_to = {$userid}";
                $stmt = $conn->query($query);
                $results = $stmt->fetchALL(PDO::FETCH_ASSOC);
                if($results != null){
                    $found = true;
                }
            }catch(Error $e){
                echo "Table Display Error: ".$e->msgfmt_format_message;
            }
        }else{
            echo "Table Display Error: Failed to Display Table";
        }

        if($found == true){
            $head = "
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
            ";
            $end = "
                </tbody>
            </table>
            ";
            foreach($results as $result){
                $id = "#".strval($result['id']);
                $className = "A".$id;
                $content = $id." "."<a class='{$className}' href=''>{$result['title']}<a>";
                $part = strtoupper($result['status']);
                $name = $result['firstname']." ".$result['lastname'];
                $str = "
                <tr>
                    <td>{$content}</td>
                    <td>{$result['type']}</td>
                    <td>{$part}</td>
                    <td>{$name}</td>
                    <td>{$result['created']}</td>
                </tr>
                ";
                $head .= $str;
            }
            $head .= $end;
            echo $head;
        }else{
            echo "No Issues to Show";
        }
        
    }else{
        echo "Table Display Error: You need to be logged in to carry out this function";
    }
}else{
    echo "Table Display Error: You need to be logged in";
}

$conn = null;

?>




