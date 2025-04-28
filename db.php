<?php
// db.php - database verbinding

$host = 'localhost';         // Servernaam
$db   = 'bestellingen_dbk';  // Jouw database naam
$user = 'root';              // Gebruikersnaam (bij XAMPP/MAMP meestal 'root')
$pass = '';                  // Leeg wachtwoord
$charset = 'utf8mb4';        // Tekencodering

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    die('Database verbinding mislukt: ' . $e->getMessage());
}
?>

