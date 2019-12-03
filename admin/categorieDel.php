<?php

session_start();

include('config/config.php');
include('librairies/categorieModel.php');
include('librairies/db.lib.php');

$vue='categorieDel';
$title = 'catégories';
$submit = 'enregistrer';
$id= $_GET;
$error = [];

if(!isset($_SESSION['connected']) && $_SESSION['connected']!==true)
{
    header('location:login.php');
    exit();
}

try
{
    deleteCat($id);


}

catch(PDOException $e)
{
    $vue = 'erreur';
    //Si une exception est envoyée par PDO (exemple : serveur de BDD innaccessible) on arrive ici
    $messageErreur = 'Une erreur de connexion a eu lieu :'.$e->getMessage();
}
$vue='categorieListe';
include(TPL_DIRECTORY.LAYOUT.TPL_EXTENTION);