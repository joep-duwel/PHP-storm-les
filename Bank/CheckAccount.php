<?php
class CheckAccount extends BankAccount
{
    private $minBalance;

    public function __construct($amount ,$minBalance){
        parent::__construct($amount);
        $this->minBalance = $minBalance;
    } else {
        throw new invalidArgumentException("minBalance must be greater than 0");
    }
}

public function withdraw($amount)
{
    $canWithdraw = $amount > 0 &&
        $this->getBalance() >= $amount > $this->minBalance;

    if ($canWithdraw) {
        parent::withdraw($amount);
        return true;
    }
    return false;
}