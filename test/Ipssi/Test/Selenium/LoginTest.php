<?php

namespace Ipssi\Test\Selenium;

class LoginTest extends TestCase
{
    public function testFormAttributes()
    {
        $this->url('login.php');

        $action = $this->getHostname() . '/login.php';
        $form = $this->byTag('form');
        $this->assertEquals('post', $form->attribute('method'));
        $this->assertEquals($action, $form->attribute('action'));
    }

    public function testEmptyLoginForm()
    {
        $this->url('login.php');

        $username = $this->byName('username');
        $password = $this->byName('password');

        $this->assertEquals('', $username->value());
        $this->assertEquals('', $password->value());
    }

    public function testInvalidSubmitForm()
    {
        $this->url('login.php');

        $form = $this->byTag('form');

        $this->byName('username')->value('toto');
        $this->byName('password')->value('1234');

        $form->submit();

        $this->assertEquals('Login', $this->title());
    }

    public function testValidForm()
    {
        $this->url('login.php');
        $form = $this->byTag('form');

        $this->byName('username')->value('toto');
        $this->byName('password')->value('0000');

        $form->submit();

        $this->assertEquals('Hello, World', $this->title());
    }
}