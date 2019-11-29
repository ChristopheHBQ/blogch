<?php

include('config/config.php');
include('librairies/userModel.php');
include('librairies/db.lib.php');

$vue='listUser';
$title = 'Liste Utilisateurs';
$activeMenu='Utilisateurs';

$users = listUser();

include(TPL_DIRECTORY.LAYOUT.TPL_EXTENTION);


