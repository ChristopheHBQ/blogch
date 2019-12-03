<?php

session_start();

include('config/config.php');
include('librairies/articleModel.php');
include('librairies/categorieModel.php');
include('librairies/userModel.php');
include('librairies/db.lib.php');

$vue='article';
$title = 'article';
$activeMenu ='article';
$connected = connected();

if(!isset($_SESSION['connected']) && $_SESSION['connected']!==true)
{
    header('location:login.php');
    exit();
}


$articles=listArticle();

include(TPL_DIRECTORY.LAYOUT.TPL_EXTENTION);