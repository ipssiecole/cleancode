<?php

namespace Ipssi\Cart\Test;

use PHPUnit\Framework\TestCase;
use Ipssi\Cart\ProductRepository;
use TypeError;
use InvalidArgumentException;
use PDO;

class ProductRepositoryTest extends TestCase
{
    public function testConstructorWithoutPDO()
    {
        $this->expectException(TypeError::class);
        new ProductRepository(null);
    }

    public function testConstructorWithPDO()
    {
        $pdoMock = $this->createMock(PDO::class);
        new ProductRepository($pdoMock);

        $this->assertInstanceOf(PDO::class, $pdoMock);
    }

    public function testFindOneWithInvalidID()
    {
        $this->expectException(InvalidArgumentException::class);
        $pdoMock = $this->createMock(PDO::class);

        $repo = new ProductRepository($pdoMock);
        $product = $repo->find('');
    }
}
