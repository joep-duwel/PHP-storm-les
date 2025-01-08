<?php
include "bankAccount.php";
class SavingAccount extends BankAccount
{
    private $interestRate;
    private $name;


    public function __construct($balance, $interestRate)
    {

        parent::__construct($balance);

        $this->interestRate = $interestRate;
    }
    public function setInterstRate($interestRate)
    {
        $this->interstRate = $interestRate;
    }
    public function addInterest()
    {
        $interest = $this->interestRate * $this->getBalance();
        $this->deposit($interest);
    }
}