<?php

namespace Ipssi\Logger;

use Psr\Log\LoggerInterface;

class File implements LoggerInterface
{
    /**
     * @var string
     */
    private $filename;

    private $formater;

    use \Psr\Log\LoggerTrait;

    /**
     * File constructor.
     * @param string $filename
     */
    public function __construct(string $filename)
    {
        $this->setFilename($filename);
    }

    public function setFormater(Formater $formater)
    {
        $this->formater->format();
    }

    /**
     * @return string
     */
    public function getFilename(): string
    {
        return $this->filename;
    }

    /**
     * @param string $filename
     * @return File
     */
    public function setFilename(string $filename)
    {
        $this->filename = $filename;
        return $this;
    }

    /**
     * @param mixed $level
     * @param string $message
     * @param array $context
     * @return bool|int|void
     */
    public function log($level, $message, array $context = array())
    {
        return file_put_contents(
            $this->getFilename(),
            $this->interpolate($message, $context) . PHP_EOL,
            FILE_APPEND
        );
    }

    /**
     * @param $message
     * @param array $context
     * @return string
     */
    protected function interpolate($message, array $context = array())
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
