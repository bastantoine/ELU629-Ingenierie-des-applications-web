<?php
	
	// Auteurs : Bastien & Pierre-Adrien

	session_start();
	if(!isset($_SESSION["connecte"]) || $_SESSION['connecte'] == false){
		header("Location: index.php");
	}
?>
<!doctype html>
<html lang="fr">
<head>
	<?php include("includes/header.php"); ?>
	<title>Page personnelle</title>
</head>
<body>
	<?php include("includes/navigation.php"); ?>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<p>
					<?php include("includes/connexionpdo.php"); ?>
					<h3>Page personnelle</h3>
					
					<h5>Mes infos personnelles</h5>
					<?php
	
						$query = $db->query("SELECT * FROM utilisateurs WHERE id = ".$_SESSION["idUtilisateur"]);
						$user = $query->fetchAll()[0];
						$query->closeCursor();
					
					?>
					Nom : <?php echo $user["nom"]; ?><br/>
					Prénom : <?php echo $user["prenom"]; ?><br/>
					Adresse email : <?php echo $user["email"]; ?><br/>
					Catégorie : <?php echo $user["type"]; ?><br/>
					Statut : <?php echo $user["statut"]; ?><br/>
					Id : <?php echo $_SESSION["idUtilisateur"]; ?><br/>
	
					<a href="modification_utilisateur.php?id=<?php echo $_SESSION["idUtilisateur"]; ?>"><button class="btn btn-default">Modifier mes informations</button></a>
					
					<h5>Mes recettes</h5>
					<table class="table table-striped">
					<?php
						$query = $db->query("SELECT id, nom FROM recettes WHERE idAuteur = ".$_SESSION["idUtilisateur"]);
						while($recette = $query->fetch()) {
							?>
								<tr>
									<td><a href="recette.php?id=<?php echo $recette["id"]; ?>"><?php echo $recette["nom"]; ?></a></td>
									<td><a href="modification_recette.php?id=<?php echo $recette["id"]; ?>">Modifier la recette</a></td>
									<td><a href="scripts/script_suppression_recette.php?id=<?php echo $recette["id"]; ?>">Supprimer la recette</a></td>
								</tr>
							<?php
						}
						$query->closeCursor();
					?>
					</table>
	
					<a href="ajout_recette.php"><button class="btn btn-default">Créer une recette</button></a>
					
					<h5>Mes commentaires</h5>
					<table class="table table-striped">
					<?php
	
						$query = $db->query("SELECT commentaire.id, commentaire.commentaire, recettes.nom FROM commentaire JOIN recettes ON recettes.id = commentaire.idRecette WHERE commentaire.idAuteur = ".$_SESSION["idUtilisateur"]);
						while($commentaire = $query->fetch()) {
							?>
								<tr>
									<td><?php echo $commentaire["nom"]; ?></td>
									<td><?php echo $commentaire["commentaire"]; ?></td>
									<td><a href="modification_commentaire.php?id=<?php echo $commentaire["id"]; ?>">Modifier le commentaire</a></td>
									<td><a href="scripts/script_suppression_commentaire.php?id=<?php echo $commentaire["id"]; ?>">Supprimer le commentaire</a></td>
								</tr>
							<?php
						}
						$query->closeCursor();
					?>
					</table>
				</p>
			</div>
		</div>
	</div>
</body>
</html>