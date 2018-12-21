<?php
session_start();
include("../includes/connexionpdo.php");

$idCommentaire = intval($_GET["id"]);

if(!isset($_POST) || !isset($_GET))
    header("../Location: index.php");

$query = $db->query("SELECT idRecette FROM commentaire WHERE id = ".$idCommentaire);
$idRecette = $query->fetchAll()[0]["idRecette"];
$query->closeCursor();

$query = $db->prepare('UPDATE commentaire SET commentaire = :commentaire WHERE id = '.$idCommentaire);
$query->bindValue("commentaire", $_POST["commentaire"]);
$query->execute();
$query->closeCursor();

header("Location: ../recette.php?id=".$idRecette);

?>