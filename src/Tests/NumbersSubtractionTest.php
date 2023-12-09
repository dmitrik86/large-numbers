<?php

use LargeNumbers\Numbers;
use PHPUnit\Framework\TestCase;

class NumbersSubtractionTest extends TestCase
{
    protected Numbers $numbers;

    public function __construct(string $name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->numbers = new Numbers();
    }

    public function testSubtraction1()
    {
        $this->assertEquals('3', $this->numbers->subtractNumbersAsStrings('6', '3'));
    }

    public function testSubtraction2()
    {
        $this->assertEquals('11', $this->numbers->subtractNumbersAsStrings('15', '4'));
    }

    public function testSubtraction3()
    {
        $this->assertEquals('9', $this->numbers->subtractNumbersAsStrings('17', '8'));
    }

    public function testSubtraction4()
    {
        $this->assertEquals('78', $this->numbers->subtractNumbersAsStrings('112', '34'));
    }

    public function testSubtraction5()
    {
        $this->assertEquals('-339', $this->numbers->subtractNumbersAsStrings('16', '355'));
    }

    public function testSubtraction6()
    {
        $this->assertEquals('-341', $this->numbers->subtractNumbersAsStrings('14', '355'));
    }

    public function testSubtraction7()
    {
        $this->assertEquals('-1', $this->numbers->subtractNumbersAsStrings('84', '85'));
    }

    public function testSubtraction8()
    {
        $this->assertEquals('12', $this->numbers->subtractNumbersAsStrings('111', '99'));
    }

    public function testSubtraction9()
    {
        $this->assertEquals('-31', $this->numbers->subtractNumbersAsStrings('-14', '17'));
    }

    public function testSubtraction10()
    {
        $this->assertEquals('-10', $this->numbers->subtractNumbersAsStrings('-15', '-5'));
    }

    public function testSubtraction11()
    {
        $this->assertEquals('-10', $this->numbers->subtractNumbersAsStrings('5', '15'));
    }

    public function testSubtraction12()
    {
        $this->assertEquals('4294967296', $this->numbers->subtractNumbersAsStrings('8589934592', '4294967296'));
    }
}