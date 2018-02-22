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

        if ($stmt->execute([$id])) {
            $product = $stmt->fetch(PDO::FETCH_OBJ);
            return $product;
        }
    }

    protected function getPDO(): PDO
    {
        return $this->pdo;
    }
}