<?php
include('config/config.php');
include('librairies/functions.php');
include('librairies/db.lib.php');

$vue='index';
$title = 'Connexion';
$activeMenu='Utilisateurs';

$submit ='connexion';

include(TPL_DIRECTORY.LAYOUT.TPL_EXTENTION);
