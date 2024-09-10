<?php
try {
    $db = new PDO('mysql:host=localhost;dbname=my_database;charset=utf8', 'admin', 'Afpa1234');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
    die();
}
?>
  