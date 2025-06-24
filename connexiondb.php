<?php
try {
    $pdo = new PDO("pgsql:host=localhost;dbname=todolist", "postgres", "0151516084");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}
?>
