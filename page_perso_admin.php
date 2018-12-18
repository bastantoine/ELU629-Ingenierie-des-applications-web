<?php
session_start();
include 'functions.php';
if(isset($_SESSION["login"])){
    $login=$_SESSION["login"];
}
else
    header("Location: index.php");
?>
<!doctype html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>page perso</title>
	</head>
	<header > 
			<div id="first">
			<font size="10" ><b> page perso </b></font>
	</header>
	<body>
<?php

/* Affichage des utilisateurs */

echo "<input type=\"button\" value=\"Liste des utilisateurs\" onclick=\"location.href='https://p17verge.perso1.web.telecom-bretagne.eu/website/page_perso_admin.php'\" />";

    require('paramConnexion.php');		
	$pdo= new PDO($dsn,$admin,$pass);
	$requete="SELECT * FROM `utilisateur`";
	$res=$pdo->query($requete);

/* Suppression d'un utilisateur */

echo "<input type=\"button\" value=\"Supprimer cet utilisateur\" onclick=\"location.href='https://p17verge.perso1.web.telecom-bretagne.eu/website/page_perso_admin.php'\" />";

    require('paramConnexion.php');		
	$pdo= new PDO($dsn,$admin,$pass);
	$requete="DELETE FROM `utilisateur` WHERE `id`=$id";
	$res=$pdo->query($requete);
    echo "l'utilisateur $id a bien été supprimé";

/* Affichage des recettes */


echo "<input type=\"button\" value=\"Liste des recettes \" onclick=\"location.href='https://p17verge.perso1.web.telecom-bretagne.eu/website/page_perso_admin.php'\" />";

    require('paramConnexion.php');		
	$pdo= new PDO($dsn,$admin,$pass);
	$requete="SELECT * FROM `recette`";
	$res=$pdo->query($requete);


/* Affichage des recettes par utilisateur */

echo "<input type=\"button\" value=\"Utilisateur \" onclick=\"location.href='https://p17verge.perso1.web.telecom-bretagne.eu/website/page_perso_admin.php'\" />";

    require('paramConnexion.php');		
	$pdo= new PDO($dsn,$admin,$pass);
	$requete="SELECT * FROM `recette` WHERE 'id'=(SELECT 'id' FROM 'utlisateurs' WHERE login=$login)";
	$res=$pdo->query($requete);



?>
	</body>
</html>
