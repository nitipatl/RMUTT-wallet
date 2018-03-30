<?php

require_once './Transfer.php';
$transfer = new Transfer();

print $transfer->checkBalanceToAccount($_GET['accountTo'], $_GET['moneyAmount']);

?>

