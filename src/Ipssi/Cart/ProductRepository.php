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

    public function find($id)
    {
        if ($id === '' || $id <= 0) {
            throw new InvalidArgumentException("id $id is invalid");
        }
    }

    protected function getPDO(): PDO
    {
        return $this->pdo;
    }
}