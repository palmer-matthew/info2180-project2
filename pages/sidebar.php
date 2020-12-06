<div class="sidebox">
    <ul>
        <li><a href="../pages/home.php"><i class="fas fa-home"></i>Home</a></li>
        <? if(isset($_SESSION['email'])):?>
            <? if($_SESSION['email'] == 'admin@project2.com'):?>
                <li><a href="../pages/adduser.php"><i class="fas fa-user-plus"></i>Add User</a></li>
            <? endif; ?>
        <? endif; ?>
        <li><a href="../pages/newissue.php"><i class="fas fa-plus-circle"></i>New Issue</a></li>
        <li class="last"><a href=""><i class="fas fa-power-off"></i>Logout</a></li>
    </ul>
</div>
