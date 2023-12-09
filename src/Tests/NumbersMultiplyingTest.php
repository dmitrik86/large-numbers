<?php

use LargeNumbers\Numbers;
use PHPUnit\Framework\TestCase;

class NumbersMultiplyingTest extends TestCase
{
    protected Numbers $numbers;

    public function __construct(string $name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->numbers = new Numbers();
    }

    public function testMultiplying1()
    {
        $this->assertEquals('36', $this->numbers->multiplyNumberAsString('12', 3));
    }

    public function testMultiplying2()
    {
        $this->assertEquals('144', $this->numbers->multiplyNumberAsString('12', 12));
    }

    public function testMultiplying3()
    {
        $this->assertEquals('1728', $this->numbers->multiplyNumberAsString('144', 12));
    }

    public function testMultiplying4()
    {
        $this->assertEquals('-144', $this->numbers->multiplyNumberAsString('-12', 12));
    }

    public function testMultiplying5()
    {
        $this->assertEquals('-144', $this->numbers->multiplyNumberAsString('12', -12));
    }

    public function testMultiplying6()
    {
        $this->assertEquals('144', $this->numbers->multiplyNumberAsString('-12', -12));
    }

    public function testMultiplying7()
    {
        $this->assertEquals('8589934592', $this->numbers->multiplyNumberAsString('4294967296', 2));
    }
}