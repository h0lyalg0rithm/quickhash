<?php
echo '<pre>';
print_r(hash_algos());
echo '</pre>';
$r = hash_algos(0);
echo $r;
echo hash($r[2],'hello');
echo '<br>'.md5('hello');
?>