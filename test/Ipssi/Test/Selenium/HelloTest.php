<?php

namespace Ipssi\Test\Selenium;

class HelloTest extends TestCase
{
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
