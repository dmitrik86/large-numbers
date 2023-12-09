<?php
namespace Numbers\Tests;

use LargeNumbers\Numbers;
use PHPUnit\Framework\TestCase;

class NumbersDivisionTest extends TestCase
{
    protected Numbers $numbers;

    public function __construct(string $name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->numbers = new Numbers();
    }

    public function testDivision()
    {
        $this->assertEquals('9', $this->numbers->divideNumberAsString('27', 3));
    }

    public function testDivision2()
    {
        $this->assertEquals('7158278827', $this->numbers->divideNumberAsString('21474836481', 3));
    }

    public function testDivision3()
    {
        $this->assertEquals('1.5', $this->numbers->divideNumberAsString('3', 2));
    }

    public function testDivision4()
    {
        $this->assertEquals('5368709120.25', $this->numbers->divideNumberAsString('21474836481', 4));
    }

    public function testDivision5()
    {
        $this->assertEquals('-8', $this->numbers->divideNumberAsString('-16', 2));
    }

    public function testDivision6()
    {
        $this->assertEquals('-5', $this->numbers->divideNumberAsString('10', -2));
    }

    public function testDivision7()
    {
        $this->assertEquals('4', $this->numbers->divideNumberAsString('-16', -4));
    }

    public function testDivision8()
    {
        $this->assertEquals('4294967296', $this->numbers->divideNumberAsString('8589934592', 2));
    }

}