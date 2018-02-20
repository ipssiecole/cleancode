<?php

namespace Ipssi\Test;

use PHPUnit\Framework\TestCase;
use Ipssi\BankAccount;

class BankAccountTest extends TestCase
{
    protected $account;

    public function setUp()
    {
        $this->account = new BankAccount();
    }

    public function testConstructorWithoutBalance()
    {
        $account = new BankAccount();
        $this->assertEquals(0, $account->getBalance());
    }

    public function testConstructorWithBalance()
    {
        $account = new BankAccount(100);
        $this->assertEquals(100, $account->getBalance());
    }

    public function testIncreaseWithNegativeBalance()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->account->increase(-100);
    }

    public function testIncreaseWithPositiveBalance()
    {
        $this->account->increase(50);
        $this->assertEquals(50, $this->account->getBalance());
    }

    public function testDecreaseWithNegativeBalance()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->account->decrease(-200);
    }

    public function testDecreaseWithOverPositiveBalance()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->account->decrease(100);
    }

    public function testDecreaseBalance()
    {
        $this->account->increase(100);
        $this->account->decrease(50);
        $this->assertEquals(50, $this->account->getBalance());
    }

    public function tearDown()
    {
        $this->account = null;
    }
}