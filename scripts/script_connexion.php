<?php

// Auteurs : Bastien & Pierre-Adrien

session_start();

if(!empty($_POST)) 
{
	if(!empty($_POST['email']) && !empty($_POST['password'])) 
	{
		include('../includes/connexionpdo.php');
		
		$requete = $db->query("SELECT * FROM utilisateurs WHERE email = '".htmlentities($_POST["email"])."'");
		$user = $requete->fetchAll()[0];
		if(htmlentities($_POST['email']) != $user['email']) 
		{
			header("Location: ../error_email.php");
		}
		//elseif(hash("md5", htmlentities($_POST['password'])) != $user['mdp'])
		elseif(htmlentities($_POST['password']) != $user['mdp']) 
		{  
			header("Location: ../error_password.php");
		}
		else
		{
			$_SESSION['email'] = htmlentities($_POST['email']);
			$_SESSION['nom'] = $user['nom'];
			$_SESSION['prenom'] = $user['prenom'];
			$_SESSION['type'] = $user['type'];
			$_SESSION['statut'] = $user['statut'];
			$_SESSION['connecte'] = true;
			$_SESSION['idUtilisateur'] = $user["id"];
			header("Location: ../index.php");
		}
	}
	else
	{
		header("Location: ../inscription.php");
	}
}
?>