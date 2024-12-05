<?php
try {
    $db = new PDO("mysql:host=localhost;dbname=fietsen", "root", "");
} catch (PDOException $e) {
    die('geen database server');
}

if (isset($_POST['delete'])) {

    $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);

    if ($id === null || $id === false) {
        die("Invalid ID provided.");
    }

    $query = $db->prepare("DELETE FROM fiets WHERE id = :id");
    $query->bindParam(':id', $id, PDO::PARAM_INT);
    $query->execute();

    header("Location: ../les10/index.php");
}
?>

<!doctype html>
<html lang="en">
<head>
    <title>Document</title>
</head>
<body>
<form method="post">
  <?php  $id=$_GET['id'];
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
    <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
    <input type="submit" name="delete" value="verwijderen">
</form>
</body>
</html>