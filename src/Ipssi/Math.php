<?php

namespace Ipssi;

class Math
{
    public static function doubleNumber(int $nb): int
    {
        return $nb * 2;
    }

    public static function divideNumber(int $nb)
    {
        if ($nb == 0) {
            throw new \InvalidArgumentException('zero is not allowed to divide');
        }

        return $nb / 2;
    }
}
