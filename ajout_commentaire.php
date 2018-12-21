<?php

// Auteurs : Corentine & Soriba

session_start();

?>
<!doctype html>
<html lang="fr">
<head>
    <?php include("includes/header.php"); ?>
	<title>Ajouter un commentaire</title>
</head>
<body>
	<?php include("includes/navigation.php"); ?>
<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<h1>Ajouter un commentaire</h1>
				<?php
			
					include("includes/connexionpdo.php");
			
					$idRecette = intval($_GET["idRecette"]);
			
					$query = $db->query("SELECT nom FROM recettes WHERE id = ".$idRecette);
					$nomRecette = $query->fetchAll()[0]["nom"];
					$query->closeCursor();
			
				?>
				<form method="post" action="scripts/script_ajout_commentaire.php?idRecette=<?php echo $idRecette; ?>">
					<div class="form-group row">
						<label for="nom_recette" class="col-lg-3 col-form-label">Nom de la recette</label>
						<div class="col-lg-9">
							<input type="text" class="form-control" name="nom_recette" id="nom_recette" value="<?php echo $nomRecette; ?>" readonly>
						</div>
					</div>
					<div class="form-group row">
						<label for="commentaire" class="col-lg-3 col-form-label">Commentaire</label>
						<div class="col-lg-9">
						<textarea class="form-control" id="commentaire" name="commentaire" rows="5">Veuillez entrer votre commentaire</textarea>
						</div>
					</div>
					<div class="offset-lg-3 col-lg-9">
						<button type="submit" class="btn btn-primary">Envoyer</button>
					</div>
				</form>
		</div>
	</div>
</div>
</body>
</html>	