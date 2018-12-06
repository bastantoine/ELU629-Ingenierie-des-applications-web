<!doctype html>

<html lang="fr">
<head>
  <meta charset="utf-8">

  <title>Envoi de la recette</title>
  <link rel="stylesheet" href="style.css">

</head>

<body>
  <h1>Envoi de votre recette</h1>
  <p>Félicitations, votre recette a bien été ajoutée</p>
  <a href="accueil.php"><button>Retour à la page d'acceuil</button></a>
  <?php
	include("connexionpdo.php");
  
	$nom=$_POST["nom"];
  	$entree=$_POST["entree"];
  	$plat=$_POST["plat"];
  	$dessert=$_POST["dessert"];
  	$difficulte=$_POST["difficulte"];
  	$cout=$_POST["cout"];
  	$temps=$_POST["temps"];
  	$ingredients=$_POST["ingredients"];
  	$recette=$_POST["recette"];
  	$photo=$_POST["photo"];
        
	$sql="INSERT INTO recettes(`nom`,`categorie`,`difficulte`,`cout`,`temps_prep`,`ingredients`,`recette`,`photo`)
              VALUES(`$nom`,`$entree`,`$plat`,`$dessert`,`$difficulte`,`$cout`,`$temps`,`$ingredients`,`$recette`,`$photo`)";
	$pdoStatement=$pdo->query($sql);
        $result= $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
  ?>
</body>
</html>
