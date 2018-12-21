<?php session_start() ?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>Accueil</title>
	<link rel="stylesheet" media="screen" href="style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="An exemple of web page for cooking application.">
	<meta name="robots" content="all">
</head>
<body id="css-exemple">
	<div class="page-wrapper">
		<section class="intro" id="intro">
			<div class="summary" id="summary" role="article">
				<p>Miam&Miams</p>
			</div>
			<?php include("navigation.php"); ?>
			<div class="preamble" id="preamble" role="article">
				<h3>Preamble</h3>
				<p>En dessous on doit pouvoir voir des aperçus de recettes (titre, note, difficulté, image, auteur). En cliquant sur les aperçus, cela mène aux recettes entières</p>
			</div>
		</section>

		<div class="main supporting" id="supporting" role="main">
			
			<?php
				include("connexionpdo.php");
				$query = $db->query("SELECT id, nom, recette FROM recettes ORDER BY id DESC LIMIT 5");

				while($data = $query->fetch()) {

			?>

			<div class="recipe" id="recipe" role="article">
				<p><h3><a href="recette.php?id=<?php echo $data["id"]; ?>"><?php echo $data["nom"]; ?></a></h3>
				<?php echo str_replace(array("\r\n", "\n", "\r"),'<br />' ,$data["recette"]); ?></br></p>
			</div>

			<?php

				}

				$query->closeCursor();
			
			?>
			<div class="recipe" id="recipe" role="article">
				<h3>Aperçu</h3>
				<p>Aperçu recette 2</p></br>
			</div>
			<div class="recipe" id="recipe" role="article">
				<h3>Aperçu</h3>
				<p>Aperçu recette 3</p></br>
			</div>
		</div>
		<?php include("connexion.php"); ?>
	</div>
</body>
</html>