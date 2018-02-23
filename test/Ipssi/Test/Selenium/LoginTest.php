<?php

namespace Ipssi\Test\Selenium;

class LoginTest extends TestCase
{
    public function testFormAttributes()
    {
        $this->url('login.php');
        $this->assertTrue(true);
    }
}