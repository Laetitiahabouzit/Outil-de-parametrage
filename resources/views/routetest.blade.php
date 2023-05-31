<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="chxscenario.css" media="screen" type="text/css" />
</head>
<body>

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
 
$requete = $bdd->prepare("select * from test where scenario = :idscenario");
$requete->execute([":idscenario"=>$_GET["idscenario"]]);

if ($requete->rowCount() === 0){
    echo "Il n'y a pas encore de test pour ce scénario.";
    die;
}

echo "<h1>Choisissez un test pour lequel vous voulez voir les graphiques</h1>";

while ($ligne = $requete->fetch()) {
    echo "<div id='liste'>"; 
    echo '<a href="graph.blade.php?idtest=' . $ligne["idtest"] . '">' . $ligne["nom"] . " " . $ligne["ts_debut"] . '</a> <br>';
    echo "</div>"; 
}
?>

</body>
</html>
