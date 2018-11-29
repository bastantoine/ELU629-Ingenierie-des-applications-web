<?php session_start(); $config = parse_ini_file("../includes/config.ini"); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $title = "Connexion"; include($config["include_path"]."includes/header.inc.php"); ?>
</head>
<body>

    <?php include($config["include_path"]."includes/nav.inc.php"); ?>

    <div class="container">
        <div class="jumbotron">
        	
        	<h1 class="text-center">Connexion</h1>

            <form method="post" action="scripts/login.script.php">
                <div class="form-group">
                    <label for="name">Identifiant</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <button type="submit" class="btn btn-primary">Se connecter</button>
            </form>

        </div>
    <?php include($config["include_path"]."includes/footer.inc.php"); ?>
    </div>

    <?php include($config["include_path"]."includes/scripts.inc.php"); ?>
</body>
</html>