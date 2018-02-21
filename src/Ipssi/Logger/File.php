<?php

namespace Ipssi\Logger;

use Psr\Log\LoggerInterface;
use Psr\Log\LoggerTrait;

class File implements LoggerInterface
{
    /**
     * @var string
     */
    private $filename;

    /**
     * @var Formatter
     */
    private $formatter;

    use LoggerTrait;

    /**
     * File constructor.
     * @param string $filename
     */
    public function __construct(string $filename)
    {
        $this->setFilename($filename);
    }

    /**
     * @param Formatter $formatter.
     * @return File
     */
    public function setFormater(Formatter $formatter): File
    {
        $this->formatter = $formatter;
        return $this;
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
        $msg = $this->formatter->format($level, Message::interpolate($message, $context));

        return file_put_contents(
            $this->getFilename(),
            $msg . PHP_EOL,
            FILE_APPEND
        );
    }
}
