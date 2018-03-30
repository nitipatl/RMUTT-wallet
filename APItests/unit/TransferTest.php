<?php
include dirname(__FILE__).'/../../API/transfer/Transfer.php';
use PHPUnit\Framework\TestCase;

class TransferTest extends TestCase{
    function testInput20000ReturnFalse() {
        $transfer = new Transfer();
        $action = $transfer->isOverLimitBOT(20000);
        $this->assertEquals(false, $action);
    }
    function testInput50001ReturnTrue() {
        $transfer = new Transfer();
        $action = $transfer->isOverLimitBOT(50001);
        $this->assertEquals(true, $action);
    }
    function testInput50000ReturnFalse() {
        $transfer = new Transfer();
        $action = $transfer->isOverLimitBOT(50000);
        $this->assertEquals(false, $action);
    }
}