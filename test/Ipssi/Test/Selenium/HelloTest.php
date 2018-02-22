<?php

namespace Ipssi\Test\Selenium;

class HelloTest extends \PHPUnit_Extensions_Selenium2TestCase
{
    public function setUp()
    {
        $this->setHost('127.0.0.1');
        $this->setPort(4444);
        $this->setBrowserUrl('http://192.168.8.43/cleancode');
        $this->setBrowser('chrome');
    }

    public function testHello()
    {
        $this->url('hello.php');
        $this->assertEquals('Hello, World', $this->title());
    }

    public function testTitle()
    {
        $this->url('hello.php');
        $title = $this->byTag('h1')->text();
        $this->assertEquals('Hello, Everyone', $title);
    }
}
