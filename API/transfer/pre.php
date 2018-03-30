<?php

require_once './Transfer.php';
$transfer = new Transfer();

print $transfer->transferPre($_GET['accountFrom'],$_GET['accountTo'], $_GET['moneyAmount']);

?>

