<?php

// Auteurs : Paul & Guillaume

session_start();

?>
<!doctype html>
<html lang="fr">
<head>
	<?php include("includes/header.php"); ?>
	<title>Recette</title>
</head>
<body>
	<?php include("includes/navigation.php"); ?>
	<div class="container">
		<div class="row">
			<?php
				
				function formatTemps($temps) {
					$heures = intdiv($temps, 60);
					$minutes = $temps % 60;
					if($minutes < 10)
						return $heures.'h0'.$minutes;
					return $heures.'h'.$minutes;
				}

				function showRange($numberOn, $numberMax) {
					$numberOff = $numberMax - $numberOn;
					for($i = 0; $i<$numberOn; $i++) {
						echo '<i class="fas fa-star"></i>';
					}
					for($i = 0; $i<$numberOff; $i++) {
						echo '<i class="far fa-star"></i>';
					}
				}
				
				$idRecette = intval($_GET['id']);

				include("includes/connexionpdo.php");
				
				$query = $db->query("SELECT * FROM recettes WHERE id = ".$idRecette);
				$recette = $query->fetchAll()[0];
				$query->closeCursor();

				$query = $db->query("SELECT * FROM utilisateurs WHERE id = ".$recette["idAuteur"]);
				$auteur = $query->fetchAll()[0];
				$query->closeCursor();

			?>

			<div class="col-lg-12">
				<h3><?php echo $recette["nom"]; ?></h3>
				Recette par : <?php echo $auteur["prenom"]." ".$auteur["nom"]; ?>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-8">
				<h5>Etapes</h5>
				<?php echo str_replace(array("\r\n", "\n", "\r"),'<br />' ,$recette["recette"]); ?></br>
			</div>
			<div class="col-lg-4">
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

				Difficulté : <?php showRange($recette['difficulte'], 5); ?><br/>
				Coût : <?php showRange($recette['cout'], 5); ?><br/>
				Temps : <?php echo formatTemps($recette['temps']); ?>
				<h5>Ingrédients</h5>
				<?php echo str_replace(array("\r\n", "\n", "\r"),'<br />' ,$recette["ingredients"]); ?></br>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<h5>Commentaires</h5>
				<?php

					$query = $db->query("SELECT commentaire.date, commentaire.commentaire, utilisateurs.nom, utilisateurs.prenom FROM commentaire JOIN utilisateurs ON utilisateurs.id = commentaire.idAuteur WHERE idRecette = ".$idRecette);
					echo '<ul>';
					while($commentaire = $query->fetch()) {
						?>

						<li><?php echo $commentaire["prenom"]." ".$commentaire["nom"].' - '.$commentaire["date"].' : '.$commentaire["commentaire"]; ?></li>

						<?php
					}
					echo '</ul>';
					$query->closeCursor();	

				?>
				<a href="ajout_commentaire.php?idRecette=<?php echo $idRecette; ?>">Ajouter un commentaire</a>
			</div>
		</div>
	</div>
</body>
</html>