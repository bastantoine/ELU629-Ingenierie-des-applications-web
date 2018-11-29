<?php $config = parse_ini_file("../includes/config.ini"); include("includes/connection.inc.php"); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $title = "Administration"; include($config["include_path"]."includes/header.inc.php"); ?>
</head>
<body>

    <?php include($config["include_path"]."includes/nav.inc.php"); ?>

    <div class="container">
        <div class="jumbotron">
        	
        	<h1 class="text-center">Administration</h1>

            <a href="gestion/videos.php">Page vidéos</a>
            <a href="calendrier.php">Page calendrier</a>

        </div>
    <?php include($config["include_path"]."includes/footer.inc.php"); ?>
    </div>

    <?php include($config["include_path"]."includes/scripts.inc.php"); ?>
</body>
</html>