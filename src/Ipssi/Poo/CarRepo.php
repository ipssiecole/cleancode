<?php

namespace Ipssi\Poo;

class CarRepo implements \Iterator
{
    /**
     * @var array
     */
    private $cars = array(
        'car 1',
        'car 2',
    );

    /**
     * @inheritDoc
     */
    public function current()
    {
        return current($this->cars);
    }

    /**
     * @inheritDoc
     */
    public function next()
    {
        return next($this->cars);
    }

    /**
     * @inheritDoc
     */
    public function key()
    {
        return key($this->cars);
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
        reset($this->cars);
    }
}
