<?php

namespace Ipssi\Cart\Test;

use PHPUnit\Framework\TestCase;
use Ipssi\Cart\Product;

class ProductTest extends TestCase
{
    public function testConstructor()
    {
        $product = new Product();

        $this->assertNull($product->getId());
        $this->assertEquals('', $product->getName());
        $this->assertEquals(0, $product->getPrice());
    }
}
