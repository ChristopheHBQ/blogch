<?php
include('config/config.php');
include('librairies/userModel.php');
include('librairies/db.lib.php');

$vue='index';
$title = 'Connexion';
$activeMenu='Utilisateurs';

$submit ='connexion';

include(TPL_DIRECTORY.LAYOUT.TPL_EXTENTION);
