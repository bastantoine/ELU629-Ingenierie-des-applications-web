<?php

session_start();

if(!empty($_POST)) 
{
	if(!empty($_POST['email']) && !empty($_POST['password'])) 
	{
		include('connexionpdo.php');
		
		$requete = $db->query("SELECT * FROM utilisateurs WHERE email = '".htmlentities($_POST["email"])."'");
		$user = $requete->fetchAll()[0];
		echo '<pre>';
		var_dump($user);
		echo '</pre>';
		if(htmlentities($_POST['email']) != $user['email']) 
		{
			header("Location: error_email.php");
		}
		//elseif(hash("md5", htmlentities($_POST['password'])) != $user['mdp'])
		elseif(htmlentities($_POST['password']) != $user['mdp']) 
		{  
			header("Location: error_password.php");
		}
		else
		{
			$_SESSION['email'] = htmlentities($_POST['email']);
			$_SESSION['nom'] = $user['nom'];
			$_SESSION['prenom'] = $user['prenom'];
			$_SESSION['type'] = $user['type'];
			$_SESSION['statut'] = $user['statut'];
			$_SESSION['connecte'] = true;
			header("Location: index.php");
		}
	}
	else
	{
		header("Location: inscription.php");
	}
}
?>