<?php

include './connect.php';

//Display Table Dashboard Functionality :
$found = false;
$user = null;

if(isset($_SESSION['logged-in'])){
    if($_SESSION['logged-in'] == true){
        if(isset($_POST['id'])){
            $issue = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
            $results = null;
            try{
                $query = "SELECT Issue.*, Users.firstname, Users.lastname FROM Issue LEFT JOIN Users ON Issue.assigned_to = Users.id WHERE Issue.id = {$id}";
                $stmt = $conn->query($query);
                $results = $stmt->fetchALL(PDO::FETCH_ASSOC);
                if(sizeof($results) > 0){
                    $found = true;
                    $query = "SELECT Users.firstname, Users.lastname FROM Users WHERE Users.id = {$results[0]['created_by']}";
                    $stmt = $conn->query($query);
                    $user = $stmt->fetchALL(PDO::FETCH_ASSOC);
                }
            }catch(Error $e){
                echo "View Main Error: ".$e;
            }

            if($found == true){
                //Building Information 
                $str = "Issue created on ";
                $date = date_create($results[0]['created']);
                $str .= date_format($date,"F j, Y at g:i");
                $str .= " by ".$user[0]['firstname']." ".$user[0]['lastname'];

                $str1 = "Last updated on ";
                $date1 = date_create($results[0]['updated']);
                $str1 .= date_format($date1,"F j, Y at g:i");

                $name = $results[0]['firsname']." ".$results[0]['firsname'];
                $type = ucfirst($results[0]['type']);
                $prior = ucfirst($results[0]['priority']);
                $status = ucfirst($results[0]['status']);


                $head = "
                <section>
                    <h1>{$results[0]['title']}</h1>
                    <h3>#{$results[0]['id']}</h3>
                    <div class='layout'>
                        <div class='col1'>
                            <p>{$results[0]['description']}</p>
                            <ul>
                                <li>{$str}</li>
                                <li>{$str}</li>
                            </ul>
                        </div>
                        <div class='col2'>
                            <div class='square'>
                                <p class='heading'>Assigned To<p>
                                <p>{$name}</p>
                                <p class='heading'>Type<p>
                                <p>{$type}</p>
                                <p class='heading'>Priority<p>
                                <p>{$prior}</p>
                                <p class='heading'>Status<p>
                                <p>{$status}</p>
                            </div>
                            <button class='close'>Mark As Closed</button>
                            <button class='inprog'>Mark As In Progress</button>
                        </div>
                    </div>
                </section>
                ";
                echo $head;
            }else{
                echo "View Page Error : Failed to Load Page";
            }
        }else{
            echo "View Main Error: Failed to receive Data";
        }
    }else{
        echo "View Main Error: You need to be logged in to carry out this function";
    }
}else{
    echo "View Main Error: You need to be logged in";
}

$conn = null;

?>

