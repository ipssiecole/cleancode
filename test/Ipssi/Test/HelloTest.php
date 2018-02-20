<?php

namespace Ipssi\Test;

use Ipssi\Hello;
use PHPUnit\Framework\TestCase;

class HelloTest extends TestCase
{
    public function testSayHello()
    {
        $hello = new Hello();
        $this->assertEquals('Bonjour, le monde', $hello->sayHello());
    }

    public function testSayHelloReturnsFalse()
    {
        $hello = new Hello();
        $this->assertNotEquals('', $hello->sayHello());
    }
}
