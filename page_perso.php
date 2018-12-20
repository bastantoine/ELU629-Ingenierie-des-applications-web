<?php
session_start();
if(!isset($_SESSION["connecte"]) || $_SESSION['connecte'] == false){
	header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>Page personnelle</title>
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
				<p>
					<?php include("connexionpdo.php"); ?>
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
					
					<h5>Mes recettes</h5>
					<ul>
					<?php

						$query = $db->query("SELECT id, nom FROM utilisateurs WHERE id = ".$_SESSION["idUtilisateur"]);
						while($recette = $query->fetch()) {
							?>
								<li><a href="recette.php?id=<?php echo $recette["id"]; ?>"><?php echo $recette["nom"]; ?></a></li>
							<?php
						}
						$query->closeCursor();
					?>
					</ul>
					
					<h5>Mes commentaires</h5>
					<table>
					<?php

						$query = $db->query("SELECT commentaire.commentaire, recettes.nom FROM commentaire JOIN recettes ON recettes.id = commentaire.idRecette WHERE commentaire.idAuteur = ".$_SESSION["idUtilisateur"]);
						while($commentaire = $query->fetch()) {
							?>
								<tr>
									<td><?php echo $commentaire["nom"]; ?></td>
									<td><?php echo $commentaire["commentaire"]; ?></td>
								</tr>
							<?php
						}
						$query->closeCursor();
					?>
					</table>
				</p>
			</div>
		</section>
		<?php include("connexion.php"); ?>
	</div>
</body>
</html>