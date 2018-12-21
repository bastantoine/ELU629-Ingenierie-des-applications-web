<?php

// Auteurs : Corentine & Soriba

session_start();

if(!isset($_POST) || !isset($_GET))
    header("Location: ../index.php");

$idUtilisateur = intval($_GET["id"]);

if($idUtilisateur != $_SESSION["idUtilisateur"] && $_SESSION["statut"] != "admin")
    header("Location: ../index.php");

include("../includes/connexionpdo.php");

$query = $db->prepare('UPDATE recettes SET nom = :nom, prenom = :prenom, email = :email WHERE id = '.$idUtilisateur);
$query->bindValue("nom", $_POST["nom"]);
$query->bindValue("prenom", $_POST["prenom"]);
$query->bindValue("email", $_POST["email"]);
$query->execute();
$query->closeCursor();

header("Location: ../index.php");

?>