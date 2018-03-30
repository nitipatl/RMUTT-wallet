<?php
require_once './Account.php';
$account = new Account();

print $account->getAccount($_GET['userID']);
?>
