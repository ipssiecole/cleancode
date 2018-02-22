<?php

namespace Ipssi\Cart\Test;

use Ipssi\Cart\Product;
use PHPUnit\Framework\TestCase;
use Ipssi\Cart\ProductRepository;
use TypeError;
use InvalidArgumentException;
use PDO;
use PDOStatement;

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

    public function testFindOneWithInvalidId()
    {
        $this->expectException(InvalidArgumentException::class);
        $pdoMock = $this->createMock(PDO::class);

        $repo = new ProductRepository($pdoMock);
        $repo->find('');
        $repo->find(-10);
    }

    public function testFindOneByIdReturnsNull()
    {
        $pdoStmt = $this->getPDOStatementMock();
        $pdoStmt->expects($this->once())->method('execute')->willReturn(true);
        $pdoStmt->expects($this->once())->method('fetch')->willReturn(null);

        $pdo = $this->getPDOMock($pdoStmt);
        $repo = new ProductRepository($pdo);
        $product = $repo->find(50);
        $this->assertNull($product);
    }

    public function testFindOneByIdReturnsProduct()
    {
        $pdoStmt = $this->getPDOStatementMock();
        $pdoStmt->expects($this->once())->method('execute')->willReturn(true);
        $pdoStmt->expects($this->once())->method('fetch')->willReturn($this->getRowProduct());

        $pdo = $this->getPDOMock($pdoStmt);
        $repo = new ProductRepository($pdo);
        $product = $repo->find(3);

        $this->assertInstanceOf(Product::class, $product);
    }

    protected function getRowProduct()
    {
        $row = new \stdClass();
        $row->id = 3;
        $row->name = 'Nintendo Switch';
        $row->price = 290;

        return $row;
    }

    protected function getPDOMock($pdoStmt)
    {
        $pdoMock = $this->getMockBuilder(PDO::class)
            ->disableOriginalConstructor()
            ->setMethods(['prepare'])
            ->getMock();

        $pdoMock->method('prepare')->willReturn($pdoStmt);

        return $pdoMock;
    }

    protected function getPDOStatementMock()
    {
        return $this->getMockBuilder(PDOStatement::class)
            ->setMethods(['execute', 'fetch', 'fetchAll'])
            ->getMock();
    }
}
