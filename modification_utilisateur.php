<?php

// Auteurs : Corentine & Soriba

session_start();

?>
<?php session_start() ?>
<!doctype html>
<html lang="fr">
<head>
    <?php include("includes/header.php"); ?>
	<title>Modifier un utilisateur</title>
</head>
<body>
    <?php include("includes/navigation.php"); ?>
	<div class="container">
        <div class="row">
            <div class="col-lg-12">
                <?php
            
                    $idUtilisateur = intval($_GET["id"]);
                    
                    if($idUtilisateur != $_SESSION["idUtilisateur"] && $_SESSION["type"] != "admin")
                        header("Location: error_acces.php");
                
                    include("includes/connexionpdo.php");

                    $query = $db->query("SELECT * FROM utilisateurs WHERE id = ".$idUtilisateur);
                    $utilisateur = $query->fetchAll()[0];
                    $query->closeCursor();

                ?>
                <h1>Modifier un utilisateur</h1>
                <form method="post" action="scripts/script_modification_utilisateur.php?id=<?php echo $utilisateur["id"]; ?>">
					<div class="form-group row">
						<label for="nom" class="col-lg-3 col-form-label">Nom</label>
						<div class="col-lg-9">
							<input type="text" class="form-control" name="nom" id="nom" value="<?php echo $utilisateur["nom"]; ?>">
						</div>
					</div>
					<div class="form-group row">
						<label for="prenom" class="col-lg-3 col-form-label">Prenom</label>
						<div class="col-lg-9">
							<input type="text" class="form-control" name="prenom" id="prenom" value="<?php echo $utilisateur["prenom"]; ?>">
						</div>
					</div>
					<div class="form-group row">
						<label for="email" class="col-lg-3 col-form-label">Email</label>
						<div class="col-lg-9">
							<input type="email" class="form-control" name="email" id="email" value="<?php echo $utilisateur["email"]; ?>">
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