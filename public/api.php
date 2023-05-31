<?php 
 
$idtest = $_GET["idtest"];

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$app->make('Illuminate\Contracts\Http\Kernel')->handle(Illuminate\Http\Request::capture());

use Illuminate\Support\Facades\DB;

// Connexion à la base de données
$host = 'localhost'; // Remplacez par l'adresse de votre hôte de base de données
$database = 'projet1'; // Remplacez par le nom de votre base de données
$username = 'root'; // Remplacez par votre nom d'utilisateur de base de données
$password = ''; // Remplacez par votre mot de passe de base de données

try {
    $bdd = new PDO("mysql:host=$host;dbname=$database;charset=utf8", $username, $password);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erreur de connexion à la base de données : " . $e->getMessage();
    exit();
}

$requete = $bdd->prepare("SELECT * FROM detail_log WHERE detail_log.idtest=:idtest;");
$requete->execute([":idtest"=>$_GET["idtest"]]);
header("Content-Type: application/json;charset=utf-8");
echo json_encode($requete->fetchAll(PDO::FETCH_ASSOC));

if ($requete === false) {
    echo json_encode(['error' => 'Erreur lors de la récupération des données.']);
    exit;
}

 ?>