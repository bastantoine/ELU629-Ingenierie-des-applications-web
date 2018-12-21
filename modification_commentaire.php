<?php session_start() ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <?php include("includes/header.php"); ?>
	<title>Modifier un commentaire</title>
</head>
<body>
    <?php include("includes/navigation.php"); ?>
	<div class="container">
        <div class="row">
            <div class="col-lg-12">
                    <?php
                
                    include("includes/connexionpdo.php");
                
                    $idCommentaire = intval($_GET["id"]);
                    $idUtilisateur = $_SESSION["idUtilisateur"];
                
                    $query = $db->query("SELECT commentaire.id AS idCommentaire, commentaire.commentaire, commentaire.idAuteur, recettes.nom FROM commentaire JOIN recettes ON recettes.id = commentaire.idRecette WHERE commentaire.id = ".$idCommentaire);
                    $commentaire = $query->fetchAll()[0];
                    $query->closeCursor();
                
                    if($commentaire["idAuteur"] != $idUtilisateur)
                        header("Location: error_acces.php");
                
                    ?>
                    <h1>Modifier un commentaire</h1>
                    <form method="post" action="scripts/script_modification_commentaire.php?id=<?php echo $commentaire["idCommentaire"]; ?>">
					<div class="form-group row">
						<label for="nom_recette" class="col-lg-3 col-form-label" >Nom de la recette</label>
						<div class="col-lg-9">
							<input type="text" class="form-control" name="nom_recette" id="nom_recette" value="<?php echo $commentaire["nom"]; ?>" readonly>
						</div>
					</div>
					<div class="form-group row">
						<label for="commentaire" class="col-lg-3 col-form-label">Commentaire</label>
						<div class="col-lg-9">
						<textarea class="form-control" id="commentaire" name="commentaire" rows="5"><?php echo $commentaire["commentaire"]; ?></textarea>
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