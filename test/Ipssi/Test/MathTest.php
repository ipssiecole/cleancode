<?php

namespace Ipssi\Test;

use PHPUnit\Framework\TestCase;
use Ipssi\Math;

class MathTest extends TestCase
{
    public function testDoubleNumberWithString()
    {
        $this->expectException(\TypeError::class);
        Math::doubleNumber('abc');
    }

    public function testDoubleNumber()
    {
        $this->assertEquals(10, Math::doubleNumber(5));
    }

    public function testDivideNumber()
    {
        $this->assertEquals(5, Math::divideNumber(10));
    }

    public function testDivideNumberByZero()
    {
        $this->expectException(\InvalidArgumentException::class);
        Math::divideNumber(0);
    }

    public function testDivideNumberErrorTypeNumber()
    {
        $this->expectException(\TypeError::class);
        Math::divideNumber('abc');
    }
}
