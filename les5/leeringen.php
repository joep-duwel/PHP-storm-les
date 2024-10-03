
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

// Ensure the 'id' parameter is set and is a valid integer
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

$query = $db->prepare("SELECT * FROM leerlingen WHERE Klassen_id    = :id");
$query->execute(['id' => $id]);

// Fetch all data as an associative array
$leerlingen = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<table>
    <tr>
        <th>voornaam</th>
        <th>tussenvoegsel</th>
        <th>achternaam</th>
    </tr>
    <?php if (!empty($leerlingen)) { ?>
        <?php foreach ($leerlingen as $leerling) { ?>
            <tr>
                <td><?php echo htmlspecialchars($leerling['voornaam']); ?></td>
                <td><?php echo htmlspecialchars($leerling['tussenvoegsel']); ?></td>
                <td><?php echo htmlspecialchars($leerling['achternaam']); ?></td>
            </tr>
        <?php } ?>
    <?php } else { ?>
        <tr>
            <td colspan="3">Geen leerlingen gevonden.</td>
        </tr>
    <?php } ?>
</table>

<br>
<a href="klassen.php">Terug naar Klassen pagina</a>

