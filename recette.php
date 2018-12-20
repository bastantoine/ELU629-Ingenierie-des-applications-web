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
				<p>En dessous on doit pouvoir voir des aperçus de recettes (titre, note, diffuculté, image, auteur). En cliquant sur les aperçus, cela mène aux recettes entières</p>
			</div>
		</section>

		<div class="main supporting" id="supporting" role="main">
			
			<?php
				
				function formatTemps($temps) {
					$heures = intdiv($temps, 60);
					$minutes = $temps % 60;
					if($minutes < 10)
						return $heures.'h0'.$minutes;
					return $heures.'h'.$minutes;
				}
				
				$idRecette = intval($_GET['id']);

				include("connexionpdo.php");
				
				$query = $db->query("SELECT * FROM recettes WHERE id = ".$idRecette);
				$recette = $query->fetchAll()[0];
				$query->closeCursor();

				$query = $db->query("SELECT nom, prenom FROM utilisateurs WHERE id = ".$recette["idAuteur"]);
				$auteur = $query->fetchAll()[0];
				$query->closeCursor();

			?>

			<div class="recipe" id="recipe" role="article">
				<p>
					<h3><?php echo $recette["nom"]; ?></h3>
					Catégorie : 
					<?php
					
						if($recette['entree'] == 1) {
							echo 'Entrée';
						} elseif($recette['plat'] == 1) {
							echo 'Plat';
						} elseif($recette['dessert'] == 1) {
							echo 'Dessert';
						}
					
					?><br/>

					Difficulté : <?php echo $recette['difficulte']; ?>/5<br/>
					Coût : <?php echo $recette['cout']; ?>/5<br/>
					Temps : <?php echo formatTemps($recette['temps']); ?>
					<h5>Ingrédients</h5>
					<?php echo str_replace(array("\r\n", "\n", "\r"),'<br />' ,$recette["ingredients"]); ?></br>

					<h5>Etapes</h5>
					<?php echo str_replace(array("\r\n", "\n", "\r"),'<br />' ,$recette["recette"]); ?></br>
					Recette par : <?php echo $auteur["prenom"]." ".$auteur["nom"]; ?>
				</p>
			</div>
		</div>
		<?php include("connexion.php"); ?>
	</div>
</body>
</html>