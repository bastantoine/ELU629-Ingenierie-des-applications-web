<?php session_start() ?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>Erreur</title>
	<link rel="stylesheet" media="screen" href="style.css">
</head>
<body id="css-exemple">
	<div class="page-wrapper">
		<section class="intro" id="intro">
			<div class="summary" id="summary" role="article">
				<p>Miam&Miams</p>
			</div>
			<?php include("navigation.php"); ?>
			<div class="preamble" id="preamble" role="article">
				<h3>Erreur</h3>
				<p>L'adresse email utilisée n'est pas valide<br/>Veuillez réessayer</p>
			</div>
		</section>
		<?php include("connexion.php"); ?>
	</div>
</body>
</html>