<?php

require 'SavingAccount.php';

class NamedSavingAccount extends SavingAccount {
    private $name;

    public function __construct($name, $balance, $interestRate) {
        $this->name = $name;
        parent::__construct($balance, $interestRate);
    }

    public function getName() {
        return $this->name;
    }
}

$accounts = [
    new NamedSavingAccount('Joe', 1000, 0.05),
    new NamedSavingAccount('Joon', 300, 0.05),
    new NamedSavingAccount('Donald', 3060, 0.05),
    new NamedSavingAccount('Aren', 800, 0.05),
];

foreach ($accounts as $account) {
    $account->deposit(rand(100, 500));
    $account->addInterest();
}

echo "<table border='1'>";
echo "<tr><th>Naam</th><th>Saldo</th></tr>"; // Tabelkoppen
foreach ($accounts as $account) {
    echo "<tr>";
    echo "<td>" . $account->getName() . "</td>"; // Toon naam
    echo "<td>€" . number_format($account->getBalance(), 2) . "</td>"; // Toon saldo
    echo "</tr>";
}
echo "</table>";

require 'person.php';

?>