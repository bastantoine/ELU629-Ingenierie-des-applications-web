<?php

// Auteurs : Bastien & Pierre-Adrien

session_start();
session_destroy();
header("Location: ../index.php");

?>