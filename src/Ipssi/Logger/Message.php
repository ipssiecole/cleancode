<?php

namespace Ipssi\Logger;

class Message
{
    /**
     * @param string $message
     * @param array $context
     * @return string
     */
    public static function interpolate(string $message, array $context = array()): string
    {
        $replace = array();
        foreach ($context as $key => $val) {
            if (!is_array($val) && (!is_object($val) || method_exists($val, '__toString'))) {
                $replace['{' . $key . '}'] = $val;
            }
        }
        return strtr($message, $replace);
    }
}