<!doctype html>
<html lang="fr">
<head>
    <?php include("includes/header.php"); ?>
	<title>Ajouter une recette</title>
</head>
<body>
	<?php include("includes/navigation.php"); ?>
<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<h1>Ajouter une recette</h1>	
			<form method="post" action="scripts/script_ajout_recette.php">
				<div class="form-group row">
					<label for="nom_recette" class="col-lg-3 col-form-label">Nom de la recette</label>
					<div class="col-lg-9">
						<input type="text" class="form-control" name="nom_recette" id="nom_recette">
					</div>
				</div>
				<div class="form-group row">
					<label for="categorie" class="col-lg-3 col-form-label">Catégorie</label>
					<div class="col-lg-9">
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="checkbox" id="entree" name="categorie" value="entree">
							<label class="form-check-label" for="entree">Entrée</label>
						</div>
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="checkbox" id="plat" name="categorie" value="plat">
							<label class="form-check-label" for="plat">Plat</label>
						</div>
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="checkbox" id="dessert" name="categorie" value="dessert">
							<label class="form-check-label" for="dessert">Dessert</label>
						</div>
					</div>
				</div>
				<div class="form-group row">
					<label for="difficulte" class="col-lg-3 col-form-label">Difficulté</label>
					<div class="col-lg-9">
						<select class="form-control" name="difficulte"><?php for($i=1; $i<=5;$i++){ echo "<option>$i"; }?></select>
					</div>
				</div>
				<div class="form-group row">
					<label for="cout" class="col-lg-3 col-form-label">Coût</label>
					<div class="col-lg-9">
						<select class="form-control" name="cout"><?php for($i=1; $i<=5;$i++){ echo "<option>$i"; }?></select>
					</div>
				</div>
				<div class="form-group row">
					<label for="temps" class="col-lg-3 col-form-label">Temps de préparation</label>
					<div class="col-lg-9">
						<input class="form-control" type="time" name="temps">
					</div>
				</div>
				<div class="form-group row">
					<label for="ingredients" class="col-lg-3 col-form-label">Entrez la liste des ingrédients</label>
					<div class="col-lg-9">
					<textarea class="form-control" id="ingredients" name="ingredients" rows="5">Veuillez entrer la liste des ingrédients sous cette forme :
- 500g de fraises
- 100g de sucre 
- etc ...</textarea>
					</div>
				</div>
				<div class="form-group row">
					<label for="recette" class="col-lg-3 col-form-label">Entrez la recette</label>
					<div class="col-lg-9">
					<textarea class="form-control" id="recette" name="recette" rows="5">Veuillez entrer la liste des instructions sous cette forme :
- Etape 1
- Etape 2
- etc...</textarea>
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