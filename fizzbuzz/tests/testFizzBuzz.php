<?php
include dirname(__FILE__).'/../src/FizzBuzz.php';
use PHPUnit\Framework\TestCase;

class testFizzBuzz extends TestCase{
	function testInput1Return1() {
		$expected = "1";
		$input = "1";
		 
		$actual = GetNumber($input);
		
		$this->assertEquals($expected, $actual);
	}
	
	function testInput2Return2() {
		$expected = "2";
		$input = "2";
		
		$actual = GetNumber($input);
		
		$this->assertEquals($expected, $actual);
	}

	function testInput3ReturnFizz() {
		$expected = "FIZZ";
		$input = "3";
		
		$actual = GetNumber($input);
		
		$this->assertEquals($expected, $actual);
	}
	function testInput5ReturnBuzz() {
		$expected = "BUZZ";
		$input = "5";
		
		$actual = GetNumber($input);
		
		$this->assertEquals($expected, $actual);
	}
	function testInput15ReturnFizzBuzz() {
		$expected = "FIZZBUZZ";
		$input = "15";
		
		$actual = GetNumber($input);
		
		$this->assertEquals($expected, $actual);
	}
}