<?php
include dirname(__FILE__).'/../../API/transfer/Transfer.php';
use PHPUnit\Framework\TestCase;

class TransferTest extends TestCase{
    protected $transfer;
    function setUp() {
        $this->transfer = new Transfer();
    }
    function testInput20000ReturnFalse() {
        $action = $this->transfer->isOverLimitBOT(20000);
        $this->assertEquals(false, $action);
    }
    function testInput50001ReturnTrue() {
        $action = $this->transfer->isOverLimitBOT(50001);
        $this->assertEquals(true, $action);
    }
    function testInput50000ReturnFalse() {
        $action = $this->transfer->isOverLimitBOT(50000);
        $this->assertEquals(false, $action);
    }
}