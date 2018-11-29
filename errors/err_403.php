<?php $config = parse_ini_file("./includes/config.ini");?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $title = "Erreur 403"; include($config["include_path"]."includes/header.inc.php"); ?>
</head>
<body>
    <?php include($config["include_path"]."includes/nav.inc.php"); ?>

    <div class="container">
        <div class="jumbotron">

        	<h1 class="text-center">Les daleux</h1>

            <h1 class="text-center">Erreur 403</h1>
            <h1 class="text-center">Permission non accordée</h1>

        </div>
    <?php include($config["include_path"]."includes/footer.inc.php"); ?>
    </div>

    <?php include($config["include_path"]."includes/scripts.inc.php"); ?>
</body>
</html>
