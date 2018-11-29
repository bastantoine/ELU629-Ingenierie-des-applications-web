<?php session_start(); $config = parse_ini_file("includes/config.ini"); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $title = "Accueil"; include($config["include_path"]."includes/header.inc.php"); ?>
</head>
<body>

    <?php include($config["include_path"]."includes/nav.inc.php"); ?>

    <div class="container">
        <div class="jumbotron">
        	
        	<h1 class="text-center">Les daleux</h1>

        	Site de recette développé dans le cadre de l'ELU 629 Ingénierie des applications web d'IMT Atlantique Brest

        </div>
    <?php include($config["include_path"]."includes/footer.inc.php"); ?>
    </div>

    <?php include($config["include_path"]."includes/scripts.inc.php"); ?>
</body>
</html>