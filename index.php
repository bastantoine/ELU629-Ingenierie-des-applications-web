<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>Accueil</title>

	<link rel="stylesheet" media="screen" href="style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="author" content="Paul VALOIS, Guillaume GHIENNE" >
	<meta name="description" content="An exemple of web page for cooking application.">
	<meta name="robots" content="all">
</head>
<body id="css-exemple">
	<div class="page-wrapper">
		<section class="intro" id="intro">
			<div class="summary" id="summary" role="article">
				<p>Miam&Miams</p>
			</div>
			<ul>
				<li><a class="active" href="index.php">Acceuil</a></li>
				<li><a class="active" href="search.html">Rechercher</a></li>
				<li><a class="active" href="#entree">Entrée</a></li>
				<li><a classe="active" href="#plats">Plats</a></li>
				<li><a classe="active" href="#dessert">Dessert</a></li>
				<li><a classe="active" href="contact_us.html">Contactez nous</a></li>
			</ul>
			<div class="preamble" id="preamble" role="article">
				<h3>Preamble</h3>
				<p>En dessous on doit pouvoir voir des aperçus de recettes (titre, note, diffuculté, image, auteur). En cliquant sur les aperçus, cela mène aux recettes entières</p>
			</div>
		</section>

		<div class="main supporting" id="supporting" role="main">
			<div class="recipe" id="recipe" role="article">
				<h3>Aperçu</h3>
				<p>Aperçu recette 1</p></br>
			</div>
			<div class="recipe" id="recipe" role="article">
				<h3>Aperçu</h3>
				<p>Aperçu recette 2</p></br>
			</div>
			<div class="recipe" id="recipe" role="article">
				<h3>Aperçu</h3>
				<p>Aperçu recette 3</p></br>
			</div>
		</div>

		<aside class="sidebar" role="complementary">
		<div class="wrapper">
			<div class="design-selection" id="design-selection">
				<nav role="navigation">
					<form class="form">
						<fieldset class="fieldset">
							<legend>Vos coordonnées :</legend>
							<label for="email">Email :</label></br>
							<input type="email" name="email" size="20" 
							maxlength="40" id="email" /></br>
							<label for="mdp">Mot de passe:</label></br>
							<input type="password" name="pwd" size="20" id="pwd" /></br>
							<input type="submit" value="Se connecter" />
							<input type="submit" value="S'inscrire" />
						</fieldset>
					</form>					
				</nav>
				</div>
			</div>
		</aside>
	</div>
</body>
</html>