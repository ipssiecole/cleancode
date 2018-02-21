<?php

namespace Ipssi;

class ErrorException extends \Exception
{
    public function __construct()
    {
        set_error_handler(array($this, 'handler'), E_ALL);
    }

    public function handler($errno, $errstr, $errfile, $errline)
    {
        $exception = new self();
        $exception->code = $errno;
        $exception->message = $errstr;
        $exception->file = $errfile;
        $exception->line = $errline;

        throw $exception;
    }

    public function __toString()
    {
        ob_start();
        require 'error.phtml';
        return ob_get_clean();
    }
}
