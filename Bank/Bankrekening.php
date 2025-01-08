<?php
require 'SavingAccount.php';

$account = new SavingAccount(0, 0.05);
$account->deposit(100);
$account->setInterstRate(0.05);
$account->addInterest();
    echo $account->getBalance();
