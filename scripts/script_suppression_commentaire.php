<?php
session_start();

if(!isset($_SESSION) || !isset($_SESSION["connecte"]) || !isset($_GET))
    header("Location: ../index.php");

include("../includes/connexionpdo.php");

$idCommentaire = intval($_GET["id"]);

$query = $db->query("SELECT idAuteur FROM commentaire WHERE id = ".$idCommentaire);
$idAuteur = $query->fetchAll()[0]["idAuteur"];
$query->closeCursor();

if($idAuteur != $_SESSION["idUtilisateur"] || $_SESSION["statut"] != "admin")
    header("Location: ../index.php");

$query = $db->query('DELETE FROM commentaire WHERE id = '.$idCommentaire);
$query->closeCursor();

header("Location: ../page_perso.php");

?>