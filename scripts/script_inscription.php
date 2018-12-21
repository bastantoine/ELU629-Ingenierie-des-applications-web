<?php

// Auteurs : Corentine & Soriba

include("../includes/connexionpdo.php");

$query = $db->prepare("INSERT INTO utilisateurs (nom, prenom, email, mdp, type, statut) VALUES (:nom,:prenom,:email,:mdp,'utilisateur', 'OK')");
$query->bindValue('nom', $_POST["nom"]);
$query->bindValue('prenom', $_POST["prenom"]);
$query->bindValue('email', $_POST["email"]);
$query->bindValue('mdp', $_POST["password"]);
$query->execute();

header("Location: ../index.php");

?>