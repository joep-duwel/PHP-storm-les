<?php
try {

    $db=new PDO("mysql:host=localhost;dbname=cars", "root","");
} catch (PDOException $e){
    die("Error!:" .$e->getMessage());
}
?>
