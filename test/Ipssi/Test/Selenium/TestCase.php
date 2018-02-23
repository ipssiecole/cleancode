<?php

namespace Ipssi\Test\Selenium;

class TestCase extends \PHPUnit_Extensions_Selenium2TestCase
{
    public function setUp()
    {
        $this->setHost('127.0.0.1');
        $this->setPort(4444);
        $this->setBrowser('chrome');
        $this->setBrowserUrl($this->getHostname());
    }

    public function getHostname()
    {
        return 'http://ipssi.com';
    }
}
