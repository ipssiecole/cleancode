<?php

namespace Ipssi;

class BalanceValidator
{
    /**
     * @param float $balance
     * @throws InvalidArgumentException
     */
    public static function valid(float $balance)
    {
        if ($balance <= 0) {
            throw new \InvalidArgumentException('balance has to be > 0');
        }
    }
}


