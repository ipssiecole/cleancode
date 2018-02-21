<?php

namespace Ipssi\Service;

use Psr\Container\ContainerExceptionInterface;
use Psr\Container\ContainerInterface;
use Psr\Container\NotFoundExceptionInterface;

class Container implements ContainerInterface
{
    private $services = [];

    public function set($id, callable $service)
    {
        $this->services[$id] = $service;
    }

    public function get($id)
    {
        if (!$this->has($id)) {
            throw new Exception("service $id does not exits");
        }
        return $this->services[$id]($this);
    }

    public function has($id)
    {
        return array_key_exists($id, $this->services);
    }
}