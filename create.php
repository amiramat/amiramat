<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare('INSERT INTO bestellingen (klant_naam, aantal, dag, tijd) VALUES (?, ?, ?, ?)');
    $stmt->execute([
        $_POST['klant_naam'],
        $_POST['aantal'],
        $_POST['dag'],
        $_POST['tijd']
    ]);
    header('Location: index.php');
    exit;
}
?>
