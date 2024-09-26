<?php
$db = new PDO("mysql:host=localhost;dbname=dierentijn",
    "root", "");
$query = $db->prepare("SELECT *FROM dieren");
$query -> execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $data) {
    echo "<a href =' detail.php?id=" .$data['id'] . "'>";
    echo $data['naam'];
    echo "</a>";
    echo "<br>";

}


?>

