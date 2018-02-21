<?php

namespace Ipssi\Logger;

interface Formatter
{
    public function format(string $message, array $context = array()): string;
}
