<?php
session_start();

include('config/config.php');
include('librairies/functions.php');
include('librairies/db.lib.php');

$vue='login';
$title = 'Connexion';
$activeMenu='Utilisateurs';

$attention = 'alert-danger';
$submit ='connexion';
$error = [];

$username = '';
$passe = '';
$checkpasse = '';
$checkname = '';

include(TPL_DIRECTORY.LAYOUT.TPL_EXTENTION);


if(array_key_exists('username',$_POST))
{
    $username  = $_POST['username'];
    $passe = $_POST['passe'];
    
    
    if(($passe !== '') !== true){
        $error['passe'] = 'le mot de passe est vide';
    }
    
    if(($username !== '') !== true){
        $error['username'] = 'le pseudo est vide';
    }


    if(count($error)== 0){
        $vue = loginUser();
        var_dump($_SESSION['connected']);
        
    }
}
    