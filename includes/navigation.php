<!-- Auteurs : Paul & Guillaume -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<a class="navbar-brand" href="index.php">Miams&Miam</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarNav">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item">
				<a class="nav-link" href="index.php">Accueil</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="recherche.php">Rechercher</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="nous_contacter.php">Nous contacter</a>
			</li>
			<?php if(isset($_SESSION['connecte']) && $_SESSION['connecte'] == true) {
				if($_SESSION["type"] == "admin")
						echo "<li class='nav-item'><a class='nav-link' href='admin.php'>Interface d'administration</a></li>";
				else
						echo "<li class='nav-item'><a class='nav-link' href='page_perso.php'>Bienvenue ".$_SESSION['prenom']." ".$_SESSION['nom']."</a></li>";
				echo "<li class='nav-item'><a class='nav-link' href='scripts/script_deconnexion.php'>Déconnexion</a></li>";
		} ?>
		</ul>
		<form class="form-inline" method="post" action="scripts/script_connexion.php">
				<input class="form-control" type="email" placeholder="Email" name="email" id="email">
				<input class="form-control" type="password" placeholder="Mot de passe" name="password" id="password">
				<button class="btn btn-success" type="submit">Connexion</button>
				<a href="inscription.php"><button class="btn btn-default" type="button">Inscription</button></a>
		</form>
	</div>
</nav>