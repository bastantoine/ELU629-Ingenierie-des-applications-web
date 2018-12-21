<?php

// Auteurs : Paul & Guillaume

session_start();

?>
<?php session_start() ?>
<!doctype html>
<html lang="fr">
<head>
	<?php include("includes/header.php"); ?>
	<title>Accueil</title>
</head>
<body>
	<?php include("includes/navigation.php"); ?>
	<div class="container">
		<div class="row">
			
			<?php
				include("includes/connexionpdo.php");
				$query = $db->query("SELECT id, nom, recette FROM recettes ORDER BY id DESC LIMIT 5");
				while($data = $query->fetch()) {
			?>

			<div class="col-lg-4">
				<p><h3><a href="recette.php?id=<?php echo $data["id"]; ?>"><?php echo $data["nom"]; ?></a></h3>
				<?php echo substr(str_replace(array("\r\n", "\n", "\r"),'<br />' ,$data["recette"]), 0, 100); ?></br></p>
			</div>

			<?php
				}
				$query->closeCursor();
			?>
		</div>
	</div>
</body>
</html>