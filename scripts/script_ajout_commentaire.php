<?php

// Auteurs : Corentine & Soriba

session_start();
include("../includes/connexionpdo.php");

if(!isset($_POST))
    header("Location: ../recette.php?id=".$idRecette);

$idRecette = intval($_GET["idRecette"]);

$query = $db->prepare('INSERT INTO commentaire(idAuteur, idRecette, date, commentaire) VALUES(:idAuteur, :idRecette, NOW(), :commentaire)');
$query->bindValue("idAuteur", $_SESSION["idUtilisateur"]);
$query->bindValue("idRecette", $idRecette);
$query->bindValue("commentaire", $_POST["commentaire"]);
$query->execute();
$query->closeCursor();

header("Location: ../recette.php?id=".$idRecette);

?>