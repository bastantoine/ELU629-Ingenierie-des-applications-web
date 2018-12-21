<?php
session_start();

if(!isset($_SESSION) || !isset($_SESSION["connecte"]) || !isset($_GET) || $_SESSION["statut"] != "admin")
    header("Location: ../index.php");

include("../includes/connexionpdo.php");

$idUtilisateur = intval($_GET["id"]);

$query = $db->query('DELETE FROM utilisateurs WHERE id = '.$idUtilisateur);
$query->closeCursor();

header("Location: ../page_perso.php");

?>