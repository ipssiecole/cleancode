<?php

namespace Ipssi\Logger\Formatter;

use Ipssi\Logger\Formatter;

class Error implements Formatter
{
    public function format(string $message, array $context = array()): string
    {
        $date = (new \DateTime())->format('Y-m-d H:i:s');


    }
}