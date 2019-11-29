<?php

session_start();

include('config/config.php');
include('librairies/userModel.php');
include('librairies/db.lib.php');

$vue='listUser';
$admin='admin';
$title = 'Liste Utilisateurs';
$activeMenu='Utilisateurs';

/**
 * On appéle la fonction de listing des utilisateurs son retour est renvoyé sur la variable users
 * 
 * 
 */


$users = listUser();

include(TPL_DIRECTORY.LAYOUT.TPL_EXTENTION);


