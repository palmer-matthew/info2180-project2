<?php

$string = "ashPER123";
$hashed = password_hash($string, PASSWORD_DEFAULT);
echo $hashed;