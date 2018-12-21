<?php
session_start();
include("connexionpdo.php");

echo '<pre>';
var_dump($_POST);
echo '</pre>';

function calculerTemps($temps) {
	$array = explode(":", $temps);
	$heures = intval($array[0]);
	$minutes = intval($array[1]);
	return $heures * 60 + $minutes;
}

function definirCategorie(&$entree,&$plat,&$dessert) {
	if($_POST["categorie"] == "plat") {
		$entree = 0;
		$plat = 1;
		$dessert = 0;
	} elseif($_POST["categorie"] == "dessert") {
		$entree = 0;
		$plat = 0;
		$dessert = 1;
	} else {
		$entree = 1;
		$plat = 0;
		$dessert = 0;
	}
}
$entree = 0;
$plat = 0;
$dessert = 0;
definirCategorie($entree, $plat, $dessert);

$query = $db->prepare('INSERT INTO recettes(nom, entree, plat, dessert, cout, difficulte, idAuteur, temps, ingredients, recette) VALUES(:nom, :entree, :plat, :dessert, :cout, :difficulte, :idAuteur, :temps, :ingredients, :recette)');
$query->bindValue("nom", $_POST["nom_recette"]);
$query->bindValue("entree", $entree);
$query->bindValue("plat", $plat);
$query->bindValue("dessert", $dessert);
$query->bindValue("cout", $_POST["cout"]);
$query->bindValue("difficulte", $_POST["difficulte"]);
$query->bindValue("idAuteur", $_SESSION["idUtilisateur"]);
$query->bindValue("temps", calculerTemps($_POST["temps"]));
$query->bindValue("ingredients", $_POST["ingredients"]);
$query->bindValue("recette", $_POST["recette"]);
$query->execute();
$query->closeCursor();

$query = $db->query("SELECT id FROM recettes ORDER BY id DESC LIMIT 1");
$id = $query->fetchAll()[0]["id"];
$query->closeCursor();

header("Location: recette.php?id=".$id);

?>