<?php
// Database connection using PDO
try {
    // Replace 'username' and 'password' with your actual database credentials
    $db = new PDO('mysql:host=localhost;dbname=les5_school;charset=utf8mb4', 'root', '');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit();
}

// Query to select all data from the 'klassen' table
$query = $db->prepare("SELECT * FROM klassen");
$query->execute();

// Fetch all data as an associative array
$klassen = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<!-- HTML table to display the data from 'klassen' -->
<table>
    <tr>
        <th>naam</th>
        <th>mentor</th>
        <th>leerlingen</th>
    </tr>
    <?php foreach ($klassen as $klas) { ?>
        <tr>
            <td><?php echo htmlspecialchars($klas['naam']); ?></td>
            <td><?php echo htmlspecialchars($klas['mentor']); ?></td>
            <td><a href="leerlingen.php?id=<?php echo htmlspecialchars($klas['id']); ?>">leerlingen</a></td>
        </tr>
    <?php } ?>
</table>
