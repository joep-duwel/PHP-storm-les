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
    echo "</a>";
    echo  "<br>";
    }
    }

catch (PDOException $e){
    die("Error!: " . $e->getMessage());
}
?>
<a href="add.php">voeg data toe</a>
