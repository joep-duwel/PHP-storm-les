<?php
class CheckingAccount extends BankAccount {
    private $minBalance;

    public function __construct($amount, $minBalance) {
        if ($amount > 0 && $amount >= $minBalance) {
            parent::__construct($amount);
            $this->minBalance = $minBalance;
        } else {
            throw new Exception("Amount must be greater than 0 and greater than or equal to the minimum balance.");
        }
    }

    public function withdraw($amount) {
        $canWithdraw = $amount > 0 && ($this->getBalance() - $amount) >= $this->minBalance;
        if ($canWithdraw) {
            parent::withdraw($amount);
            return true;
        } else {
            throw new Exception("Withdrawal exceeds allowable balance considering the minimum balance.");
        }
    }
}