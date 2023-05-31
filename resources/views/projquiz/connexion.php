<?php
use Illuminate\Support\Facades\DB;

// Connexion à la base de données
$config = config('database.connections.mysql');
$host = $config['host'];
$database = $config['database'];
$username = $config['username'];
$password = $config['password'];

try {
    $bdd = new PDO("mysql:host=$host;dbname=$database;charset=utf8", $username, $password);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erreur de connexion à la base de données : " . $e->getMessage();
    exit();
}
?>
