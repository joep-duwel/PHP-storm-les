<?php
$db = new PDO("mysql:host=localhost;dbname=fietsen",
    "root", "");
$id=$_GET['id'];
$query = $db ->prepare("SELECT * FROM fiets WHERE id=:id");
$query-> bindParam(":id", $id);


$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as &$data){
    echo "Artikelnummer: "  . $data['id'] . "<br>";
    echo "Merk: "  . $data['merk'] . "<br>";
    echo "type: "  . $data['type'] . "<br>";
    echo "prijs: "  . $data['prijs'] . "<br>";
}

?>
<br>
<a href="index.php">terug naar master pagina</a>