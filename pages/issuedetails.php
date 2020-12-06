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
        <script src="../js/viewissue.js"></script>
    </head>    
       <body>
           <?php include("../pages/header.php");?>
           <div class="container">
               <?php include("../pages/sidebar.php");?>
                <div class="main">
                </div>
            </div>
    </body>
</html>
