<?php
session_start();
?>

<!DOCTYPE html>      
<html>
    <head>
        <title>BugMe Issue Tracker</title>
        <meta charset= "utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../styles/adduser.css">
        <link rel="stylesheet" href="../styles/all.min.css">
    </head>
    <body>
        <?php include("../pages/header.php");?>
        <div class="container">
            <?php include("../pages/sidebar.php");?>
            <div class="home">
                <div class="flex">
                    <h1>Issues</h1>
                    <button name="create" type="create" class="createbtn">Create New Issue</button>
                </div>
                
                <!--  TAB -->
                <div class="tab">
                    <h3>Filter by:</h3> 
                    <button class="links" value="A">ALL</button>
                    <button class="links" value="O">OPEN</button>
                    <button class="links" value="M">MY TICKETS</button>
                </div>
                <div class="table">
                </div>
            </div>
        </div>
    </body>
</html>

