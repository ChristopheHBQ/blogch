<?php
session_start();
include('config/config.php');
include('librairies/userModel.php');
include('librairies/db.lib.php');

$vue='index';
$title = 'Connexion';
$activeMenu='Utilisateurs';


if(!isset($_SESSION['connected']) && $_SESSION['connected']!==true)
{
    header('location:login.php');
    exit();
}

include(TPL_DIRECTORY.LAYOUT.TPL_EXTENTION);

?>
