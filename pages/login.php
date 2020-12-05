<!DOCTYPE html>
<html>
    <head>
        <title>BugMe Issue Tracker</title>
        <meta charset= "utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../styles/adduser.css">
        <link rel="stylesheet" href="../styles/all.min.css">
        <script src="../js/login.js"></script>
    </head>
    <body>
        <?php include("../pages/header.php");?>
        <div class="loginp">
            <div id="msgg" class="message"> </div>
            <div class="login">
                <h1>Login</h1>
                <form method="post" action="" id="login" class="text-field">
                    <label for="email">Email</label><br>
                    <input id="email_input" name="email" type="email" class="txtbox"required><br><br>
                    <label for="password">Password</label><br>
                    <input id="pass_input" name="password" type="password" class="txtbox" required><br><br>
                    <button id="log_btn" name="login" type="login" class="sbtn">Login</button> 
                </form>
            </div>
        </div>
    </body>
</html>