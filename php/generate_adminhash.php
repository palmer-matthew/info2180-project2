<?php

$string = "password123";
$hashed = password_hash($string, PASSWORD_DEFAULT);
echo $hashed;