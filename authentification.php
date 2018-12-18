<?php
// Start the session
$errorMessage = '';

  // Test de l'envoi du formulaire
  if(!empty($_POST)) 
  {
    // Les identifiants sont transmis ?
    if(!empty($_POST['login']) && !empty($_POST['password'])) 
    {
    // info pour base de données
    require('paramConnexion.php');
				
	$pdo= new PDO($dsn,$admin,$pass);
	$requete="SELECT * FROM `utilisateur` WHERE login = $_POST['login']";
	$res=$pdo->query($requete);

    $row=$res->fetch()


      // Sont-ils les mêmes que les constantes ?
      if( !empty($row['login']) ) 
      {
        $errorMessage = 'Mauvais login !';
      }
        elseif($_POST['password'] !== $row['password']) 
      {  
        $errorMessage = 'Mauvais password !';
      }
        else
      {
        // On ouvre la session
        session_start();
        // On enregistre le login en session
        $_SESSION['login'] = $_POST['login'];
        // On redirige vers ???
        ////////////
        exit();
      }
    }
      else
    {
      $errorMessage = 'Veuillez vous inscrire svp !';
    }
  }
?>
<!doctype html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>????</title>
		<style type="text/css">
			header {
			background-color: lightblue;
		}
		table {
border: medium solid #000000;
width: 100%;

}
td, th {
border: thin solid #6495ed;
width: 100px;
text-align: center;
}
</style>
	</head>
	<header > 
			<div id="first">
			<font size="10" ><b> session </b></font>
	</header>
	<body>


	</body>
</html>
