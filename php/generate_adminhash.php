<?php

$string = "jaunLB123";
$hashed = password_hash($string, PASSWORD_DEFAULT);
echo $hashed;