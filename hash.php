<?php
$id = $_GET['id'];
$salt = $_GET['salt'];
$key = $_GET['key'];
$hash_alg = hash_algos();
$hash = hash_hmac($hash_alg[$id],$key,$salt);

echo $hash;

?>