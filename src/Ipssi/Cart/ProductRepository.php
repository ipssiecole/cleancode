<?php

namespace Ipssi\Cart;

use PDO;
use InvalidArgumentException;

class ProductRepository
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function find($id): ?Product
    {
        if ($id === '' || $id <= 0) {
            throw new InvalidArgumentException("id $id is invalid");
        }

        $sql = 'SELECT * FROM product WHERE id=?';
        $stmt = $this->getPDO()->prepare($sql);
        $product = null;

        if ($stmt->execute([$id])) {
            $result = $stmt->fetch(PDO::FETCH_OBJ);
            if ($result) {
                $product = $this->mapToProduct($result);
            }
        }

        return $product;
    }

    /**
     * @param \stdClass $product
     * @return Product
     */
    public function mapToProduct(\stdClass $product)
    {
        return new Product(
            $product->id,
            $product->name,
            $product->price
        );
    }

    protected function getPDO(): PDO
    {
        return $this->pdo;
    }
}