<?php

namespace Ipssi\Logger;

interface Formatter
{
    public function format(string $level, string $message, array $context = array()): string;
}
