<?php
require 'SavingAccount.php';

$account = new SavingAccount(0, 0.05);
$account->deposit(100);
$account->setInterstRate(0.05);
$account->addInterest();
    echo $account->getBalance();

require 'CheckAccount.php';
echo " <br/> opgaven 17  <br/>  <br/>";

try {
    $account = new CheckingAccount(3000, 200);

    $account->withdraw(500);
    echo "Succesvolle opname. Huidige balans: €" . $account->getBalance() . "<br>";

    $account->withdraw(1000);
    echo "Deze opname zou niet moeten lukken.<br>";

} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "<br>";
}