<?php
session_start();
if((!isset($_SESSION['connected']) || $_SESSION['connected'] == false) || (!isset($_SESSION['admin']) || $_SESSION['admin'] == false)){
    header("Location: " . $config['root_folder']);
}
?>