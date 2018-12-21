<?php
session_start();

if(!isset($_SESSION) || !isset($_SESSION["connecte"]) || !isset($_GET))
    header("Location: ../index.php");

include("../includes/connexionpdo.php");

$idRecette = intval($_GET["id"]);

$query = $db->query("SELECT idAuteur FROM recettes WHERE id = ".$idRecette);
$idAuteur = $query->fetchAll()[0]["idAuteur"];
$query->closeCursor();

if($idAuteur != $_SESSION["idUtilisateur"] || $_SESSION["statut"] != "admin")
    header("Location: ../index.php");


$query = $db->query('DELETE FROM recettes WHERE id = '.$idRecette);
$query->closeCursor();

header("Location: ../page_perso.php");

?>