<?php

session_start();

include('config/config.php');
include('librairies/articleModel.php');
include('librairies/categorieModel.php');
include('librairies/userModel.php');
include('librairies/db.lib.php');

$vue='addArticle';
$title = 'ajout article';
$activeMenu ='ajout article';




include(TPL_DIRECTORY.LAYOUT.TPL_EXTENTION);