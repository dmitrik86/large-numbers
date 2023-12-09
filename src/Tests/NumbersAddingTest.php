<?php

use LargeNumbers\Numbers;
use PHPUnit\Framework\TestCase;

class NumbersAddingTest extends TestCase
{
    protected Numbers $numbers;

    public function __construct(string $name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->numbers = new Numbers();
    }

    public function testAdding1()
    {
        $this->assertEquals('9', $this->numbers->addNumbersAsStrings('6', '3'));
    }

    public function testAdding2()
    {
        $this->assertEquals('79', $this->numbers->addNumbersAsStrings('76', '3'));
    }

    public function testAdding3()
    {
        $this->assertEquals('10000', $this->numbers->addNumbersAsStrings('9997', '3'));
    }

    public function testAdding4()
    {
        $this->assertEquals('94', $this->numbers->addNumbersAsStrings('76', '18'));
    }

    public function testAdding5()
    {
        $this->assertEquals('114', $this->numbers->addNumbersAsStrings('76', '38'));
    }

    public function testAdding6()
    {
        $this->assertEquals('8589934592', $this->numbers->addNumbersAsStrings('4294967296', '4294967296'));
    }

    public function testAdding7()
    {
        $this->assertEquals('9', $this->numbers->addNumbersAsStrings('12', '-3'));
    }

    public function testAdding8()
    {
        $this->assertEquals('-10', $this->numbers->addNumbersAsStrings('-15', '5'));
    }
}