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
        <script src="../js/addissue.js"></script>
    </head>    
    <body>
        <?php include("../pages/header.php");?>
        <div class="container">
            <?php include("../pages/sidebar.php");?>
            <div class="infocon">
                <h1>Create Issue</h1>
                <form method="post" action="" id="newissue" class="text-field">
                    <label for="title">Title</label><br>
                    <input name="title" type="text" id="title" required><br><br>
                    <label for="description">Description</label><br>
                    <input name="desc" type="text" id="description" required><br><br>
                    <label for="assignto">Assigned To</label><br>
                    <select name="assign" id="assignto">
                    </select><br><br>
                    <label for="type">Type</label><br>
                    <select name="type" id="type">
                    <option value="bug">Bug</option>
                    <option value="proposal">Proposal</option>
                    <option value="task">Task</option>
                    </select><br><br>
                    <label for="priority">Priority</label><br>
                    <select name="month" id="month">
                        <option value="minor">Minor</option>
                        <option value="major">Major</option>
                        <option value="critical">Critical</option>
                    </select><br><br>
                    <button name="submit" type="submit" class="sbtn">Submit</button>              
                </form>
            </div>
        </div>
    </body>
</html>