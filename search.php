<?php session_start() ?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>Rechercher</title>
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
				<p>En dessous on doit pouvoir voir des aperçus de recettes (titre, note, diffuculté, image, auteur). En cliquant sur les aperçus, cela mène aux recettes entières</p>
			</div>
		</section>

		<div class="main supporting" id="supporting" role="main">
		</div>
		<?php include("connexion.php"); ?>
	</div>
</body>
</html>