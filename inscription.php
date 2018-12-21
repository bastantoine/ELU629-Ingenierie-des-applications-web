<?php session_start() ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <?php include("includes/header.php"); ?>
	<title>Inscription</title>
</head>
<body>
<?php include("includes/navigation.php"); ?>
	<div class="container">
		<div class="row">	
            <div class="col-lg-12">
                <form method="post" action="scripts/script_inscription.php">
					<div class="form-group row">
						<label for="nom" class="col-lg-3 col-form-label">Nom</label>
						<div class="col-lg-9">
							<input type="text" class="form-control" name="nom" id="nom" value="<?php echo $nomRecette; ?>">
						</div>
					</div>
					<div class="form-group row">
						<label for="prenom" class="col-lg-3 col-form-label">Prenom</label>
						<div class="col-lg-9">
							<input type="text" class="form-control" name="prenom" id="prenom">
						</div>
					</div>
					<div class="form-group row">
						<label for="email" class="col-lg-3 col-form-label">Email</label>
						<div class="col-lg-9">
							<input type="email" class="form-control" name="email" id="email">
						</div>
					</div>
					<div class="form-group row">
						<label for="password" class="col-lg-3 col-form-label">Nom de la recette</label>
						<div class="col-lg-9">
							<input type="password" class="form-control" name="password" id="password">
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