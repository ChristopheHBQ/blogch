<?php

session_start();

include('config/config.php');
include('librairies/categorieModel.php');
include('librairies/db.lib.php');

$vue='categorieListe';
$title = 'catégories';
$submit = 'enregistrer';

$error = [];


$libele = '';
$libeleParent = '';
$libeleIDParent = '';
$categories = '';

if(!isset($_SESSION['connected']) && $_SESSION['connected']!==true)
{
    header('location:login.php');
    exit();
}



try 
{
    $categories = listCategorie();
    
}
catch(PDOException $e)
{
    $vue = 'erreur';
    //Si une exception est envoyée par PDO (exemple : serveur de BDD innaccessible) on arrive ici
    $messageErreur = 'Une erreur de connexion a eu lieu :'.$e->getMessage();
}

include(TPL_DIRECTORY.LAYOUT.TPL_EXTENTION);