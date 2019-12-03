<?php

session_start();

include('config/config.php');
include('librairies/userModel.php');
include('librairies/db.lib.php');

$vue='userListe';
$connected = connected();
$title = 'Liste Utilisateurs';
$activeMenu='Utilisateurs';

if(!isset($_SESSION['connected']) && $_SESSION['connected']!==true)
{
    header('location:login.php');
    exit();
}

/**
 * On appéle la fonction de listing des utilisateurs son retour est renvoyé sur la variable users
 * 
 * 
 */

try 
{
    $users = listUser();
}
catch(PDOException $e)
{
    $vue = 'erreur.phtml';
    //Si une exception est envoyée par PDO (exemple : serveur de BDD innaccessible) on arrive ici
    $messageErreur = 'Une erreur de connexion a eu lieu :'.$e->getMessage();
}

include(TPL_DIRECTORY.LAYOUT.TPL_EXTENTION);


