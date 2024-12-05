<?php
try {
    $db = new PDO("mysql:host=localhost;dbname=fietsen", "root", "");
    $query = $db->prepare("SELECT * FROM fiets");
    $query->execute();


$result = $query->fetchAll(PDO::FETCH_ASSOC);

foreach ($result as $data) {
    echo "<a href =' detail.php?id=" .$data['id'] . "'>";
    echo $data['merk'] . " ";
    echo $data['type'] . " ";
    echo $data['prijs'] . " ";
    echo "<a class='p-2' href =' detail.php?id=" .$data['id'] . "'>details</a>";
    echo "<a class='p-2' href =' update.php?id=" .$data['id'] . "'>update<a>";
    echo "<a class='p-2' href =' delete.php?id=" .$data['id'] . "'>delete<a>";
    echo "</a>";
    echo  "<br>";
    echo "</br>";
    }
    }

catch (PDOException $e){
    die("Error!: " . $e->getMessage());
}
?>
<!doctype html>
<html lang="en">
<head>

    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

</body>
</html>
<br>

<a href="add.php">voeg data toe</a>
