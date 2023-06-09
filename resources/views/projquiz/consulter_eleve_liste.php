<!-- PROFESSEUR -->
<html>
 <head>
 <meta charset="utf-8">
 <link rel="stylesheet" href="listes.css" media="screen" type="text/css" />
</head>
 <body>

<!--DIV NAV-->
<ul>
  <li><a href="formateur.php">Accueil</a></li>
  <li><a href="creerquizz.php">Créer quiz</a></li>
  <li><a href="modif_quiz_liste.php">Modifier quiz</a></li>
  <li><a href="corriger_quiz_liste.php">Corriger quiz</a></li>
  <li><a class="active" href="consult_quiz_liste_prof.php">Consulter les copies</a></li>
</ul>

<?php
session_start();

if(isset($_SESSION['username']) && isset($_SESSION['id_user'])) {

$user = $_SESSION['username'];
$iduser = $_SESSION['id_user'];
$id_quiz = $_SESSION['id_quiz'];

// afficher un message
echo "<header><h3>$user</h3>";
echo "<div>Bienvenue sur votre espace formateur !</div>";
echo "</header>";
}

require_once('connexion.php');

// Récupération du nom du quiz
$requete_quiz = $bdd->prepare("SELECT nom FROM quiz WHERE id_quiz = ?");
$requete_quiz->execute(array($id_quiz));
$quiz = $requete_quiz->fetch();

echo "<div id='container'>";
echo "<div id='content'>";
echo "<h1>Liste des élèves que vous avez corrigés pour ".$quiz['nom']."</h1>";

// Récupération de la liste des élèves de la promotion associée au quiz
$requete_eleves = $bdd->prepare("SELECT id_user, pseudo FROM utilisateurs WHERE id_user IN (SELECT id_user FROM resultat WHERE id_quiz = ?)");
$requete_eleves->execute(array($id_quiz));

// Affichage de la liste des élèves avec lien vers la page corriger_copie.php
while ($eleve = $requete_eleves->fetch()) {
    echo "<div id='liste'><a href='consulter_copie_prof.php'>".$eleve['pseudo']."</a></div>";

    $_SESSION['id_eleve'] = $eleve['id_user'];
}

echo "</div>";
echo "</div>";

// Fermeture des requêtes
$requete_quiz->closeCursor();
$requete_eleves->closeCursor();
?>

</body>
</html>