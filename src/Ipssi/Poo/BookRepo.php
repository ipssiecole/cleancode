<?php

namespace Ipssi\Poo;

class BookRepo implements \Iterator
{
    /**
     * @var array
     */
    private $books = array(
        'book 1',
        'book 2',
        'book 3',
    );

    /**
     * @inheritDoc
     */
    public function current()
    {
        return current($this->books);
    }

    /**
     * @inheritDoc
     */
    public function next()
    {
        return next($this->books);
    }

    /**
     * @inheritDoc
     */
    public function key()
    {
        return key($this->books);
    }

    /**
     * @inheritDoc
     */
    public function valid()
    {
        return $this->key() !== null;
    }

    /**
     * @inheritDoc
     */
    public function rewind()
    {
        return reset($this->books);
    }
}
