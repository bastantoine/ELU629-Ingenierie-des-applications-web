<?php
session_start();

if(!isset($_POST) || !isset($_GET))
    header("Location: ../index.php");

include("../includes/connexionpdo.php");

$idRecette = intval($_GET["id"]);

$query = $db->query("SELECT idAuteur FROM recettes WHERE id = ".$idRecette);
$idAuteur = $query->fetchAll()[0]["idAuteur"];
$query->closeCursor();

if($idAuteur != $_SESSION["idUtilisateur"] && $_SESSION["statut"] != "admin")
    header("Location: ../index.php");

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

$query = $db->prepare('UPDATE recettes SET nom = :nom, entree = :entree, plat = :plat, dessert = :dessert, cout = :cout, difficulte = :difficulte, temps = :temps, ingredients = :ingredients, recette = :recette WHERE id = '.$idRecette);
$query->bindValue("nom", $_POST["nom_recette"]);
$query->bindValue("entree", $entree);
$query->bindValue("plat", $plat);
$query->bindValue("dessert", $dessert);
$query->bindValue("cout", $_POST["cout"]);
$query->bindValue("difficulte", $_POST["difficulte"]);
$query->bindValue("temps", calculerTemps($_POST["temps"]));
$query->bindValue("ingredients", $_POST["ingredients"]);
$query->bindValue("recette", $_POST["recette"]);
$query->execute();
$query->closeCursor();

header("Location: ../recette.php?id=".$idRecette);

?>