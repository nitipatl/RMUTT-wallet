<?php
include dirname(__FILE__).'/../../API/account/Account.php';
use PHPUnit\Framework\TestCase;

class AccountTest extends TestCase{
    protected $account;
    function setUp() {
        $this->account = new Account();
    }
    function testResponseFromGetAccountFormated() {
        $user = array(
            'account_id' => 1,
            'account_name' => 'testuser',
            'balance' => 5000
        );
        $action = $this->account->getAccountFormated($user);
        $this->assertEquals(array(
            'accountID' => 1,
            'accountName' => 'testuser',
            'balance' => 5000
        ), $action);
    }
}