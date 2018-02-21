<?php

namespace Ipssi;

class BankAccount
{
    /**
     * @var float
     */
    private $balance;

    /**
     * BankAccount constructor.
     *
     * @param float $balance
     */
    public function __construct(float $balance = 0)
    {
        $this->setBalance($balance);
    }

    /**
     * @return float
     */
    public function getBalance(): float
    {
        return $this->balance;
    }

    /**
     * Increase balance.
     *
     * @param  float $balance
     * @return BankAccount
     * @throws InvalidArgumentException
     */
    public function increase(float $balance): BankAccount
    {
        BalanceValidator::valid($balance);

        $this->balance += $balance;
        return $this;
    }

    /**
     * Decrease balance.
     *
     * @param  float $balance
     * @return BankAccount
     * @throws InvalidArgumentException
     */
    public function decrease(float $balance): BankAccount
    {
        BalanceValidator::valid($balance);

        if ($balance > $this->getBalance()) {
            throw new \InvalidArgumentException('balance is over than you got');
        }

        $this->balance -= $balance;
        return $this;
    }

    /**
     * @param float $balance
     * @return BankAccount
     */
    protected function setBalance(float $balance): BankAccount
    {
        $this->balance = $balance;
        return $this;
    }
}
