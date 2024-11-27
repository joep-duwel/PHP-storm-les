<?php
try {


    $db = new PDO("mysql:host=localhost;dbname=fietsen", "root", "");

    if (isset($_POST['verzenden'])) {
        $merk = filter_input(INPUT_POST, "merk", FILTER_SANITIZE_STRING);
        $type = filter_input(INPUT_POST, "type", FILTER_SANITIZE_STRING);
        $prijs = filter_input(INPUT_POST, "prijs", FILTER_SANITIZE_STRING);

        $query = $db->prepare("INSERT INTO FIETS(merk, type, prijs) VALUES(:merk, :type, :prijs)");

        $query->bindParam("merk", $merk);
        $query->bindParam("type", $type);
        $query->bindParam("prijs", $prijs);
        if ($query->execute()) {
            echo "de nieuwe gegevens zijn toegevoegt.";
        } else {
            echo "Er is iets iet goed gegaan";
        }
    }
}catch (PDOException $e){
    die("Error!: " . $e->getMessage());
}

?>
<form method="post" action="">
    <label>merk</label>
    <input type="text" name="merk"><br>

    <label>type</label>
    <input type="text" name="type"><br>

    <label>prijs</label>
    <input type="text" name="prijs"><br>
    <input type="submit" name="verzenden" value="Opslaan">
</form>
<br>
<a href="index.php">terug naar master pagina</a>
