<?php
try {
    $db = new PDO("mysql:host=localhost;dbname=fietsen", "root", "");
} catch (PDOException $e) {
    die('geen database server');
}

if (isset($_POST['verzenden'])) {
    $merk = filter_input(INPUT_POST, 'merk', FILTER_SANITIZE_SPECIAL_CHARS);
    $type = filter_input(INPUT_POST, 'type', FILTER_SANITIZE_SPECIAL_CHARS);
    $prijs = filter_input(INPUT_POST, 'prijs', FILTER_VALIDATE_FLOAT);

    $query = $db->prepare("UPDATE fiets SET merk=:merk,type=:type,prijs=:prijs WHERE id=:id");
    $query->bindParam('merk', $merk);
    $query->bindParam('type', $type);
    $query->bindParam('prijs', $prijs);
    $query->bindParam('id', $_GET['id']);
    $query->execute();
    header("Location: ../les10/index.php");
} else {
    $query = $db->prepare("SELECT * FROM fiets WHERE id= :id");
    $query->bindValue(':id', $_GET['id']);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);
    $merk = $result['merk'];
    $type = $result['type'];
    $prijs = $result['prijs'];
}
?>

<!doctype html>
<html lang="en">
<head>
    <title>Document</title>
</head>
<body>
<form method="post">
    <label>Merk</label>
    <input type="text" name="merk" value="<?= $merk ?? '' ?>"> <br>
    <label>Type</label>
    <input type="text" name="type" value="<?= $type ?? '' ?>"> <br>
    <label>Prijs</label>
    <input type="text" name="prijs" value="<?= $prijs ?? '' ?>"> <br>
    <input type="submit" name="verzenden" value="Opslaan">
</form>
</body>
</html>