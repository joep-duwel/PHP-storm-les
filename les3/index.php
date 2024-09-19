<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Electric Cars</title>
</head>
<body>
<?php
try {
    // Database connection
    $db = new PDO("mysql:host=localhost;dbname=cars", "root", "");
} catch (PDOException $e) {
    die("Error!: " . $e->getMessage());
}

// Query execution
$query = $db->prepare("SELECT * FROM electric_car");
$query->execute();

// Fetch results
$cars = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<!-- Table to display car data -->
<table border="1" cellpadding="5" cellspacing="0">
    <tr>
        <th>Name</th>
        <th>Range</th>
        <th>Price</th>
    </tr>
    <?php foreach ($cars as $car): ?>
        <tr>
            <td><?= htmlspecialchars($car['name']) ?></td>
            <td><?= htmlspecialchars($car['range']) ?></td>
            <td><?= htmlspecialchars($car['prijs']) ?></td>
        </tr>
    <?php endforeach; ?>
</table>

</body>
</html>
