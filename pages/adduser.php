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
            <div class="infocon">
                <h1>New User</h1>
                <form method="post" action="" id="signup" class="text-field">
                    <label for="fname">Firstname</label><br>
                    <input name="firstname" type="text" class="txtbox"required><br><br>
                    <label for="lname">Lastname</label><br>
                    <input name="lastname" type="text" class="txtbox" required><br><br>
                    <label for="password">Password</label><br>
                    <input name="password" type="password" class="txtbox"required><br><br>
                    <label for="email">Email</label><br>
                    <input name="email" type="email" class="txtbox"required><br><br>
                    <button name="submit" type="submit" class="sbtn">Submit</button>              
                </form>
            </div>
        </div>
    </body>
</html>
