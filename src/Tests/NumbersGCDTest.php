<?php
namespace Numbers\Tests;

use LargeNumbers\Numbers;
use PHPUnit\Framework\TestCase;

class NumbersGCDTest extends TestCase
{
    protected Numbers $numbers;

    public function __construct(string $name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->numbers = new Numbers();
    }

    public function testGcd1()
    {
        $this->assertEquals(3, $this->numbers->gcd(3, 6));
    }

    public function testGcd2()
    {
        $this->assertEquals(3, $this->numbers->gcd(9, 3));
    }

    public function testGcd3()
    {
        $this->assertEquals(6, $this->numbers->gcd(18, 6));
    }

    public function testGcd4()
    {
        $this->assertEquals(3, $this->numbers->gcd(9, 6));
    }

    public function testGcd5()
    {
        $this->assertEquals(2, $this->numbers->gcd(18, 8));
    }

    public function testGcd6()
    {
        $this->assertEquals(2, $this->numbers->gcd(10, 24));
    }

    public function testGcd7()
    {
        $this->assertEquals(2, $this->numbers->gcd(-10, -24));
    }

    public function testGcd8()
    {
        $this->assertEquals(2, $this->numbers->gcd(-10, 24));
    }
}