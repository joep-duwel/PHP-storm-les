<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<?php

$db = new PDO("mysql:host=localhost;dbname=dierentijn",
    "root", "");
$id = $_GET['id'];
$query = $db->prepare("SELECT * FROM dieren WHERE id=:id");
$query->bindParam(":id", $id);


$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as &$data) {

    echo "" . $data['naam'] . "<br>";
    echo "<img class='col-md-3 row' src=img/".$data['image'].">";
    echo "". $data['beschrijving'] . "<br>";
}

?>
<br>
<a href="master.php">terug naar master pagina</a>
