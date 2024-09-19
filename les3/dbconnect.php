<?php
try {
    $db = new PDO("mysql:host=localhost;dbname=cars", "root", "");
} catch (PDOException $e) {
    die("Error!: " . $e->getMessage());
}
$query = $db->prepare("SELECT * FROM electric_car");
$query->execute();


$cars = $query->fetchAll(PDO::FETCH_ASSOC);

echo "<pre>";
var_dump($cars);
echo "</pre>";


foreach ($cars as $car) {
    echo $car['name'] . " ";
    echo $car['range'] . " ";
    echo $car['prijs'] . "<br>";
}

?>
