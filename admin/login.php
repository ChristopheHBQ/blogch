<?php
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
