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
$submit = 'enregistrer';
$idUser= 6;
$error = [];

$articleCategorie = '';
$articletitle = '';
$articlesubtitle = '';
$articleimage = '';
$articlestatus = '';
$articlecontent = '';

if(!isset($_SESSION['connected']) && $_SESSION['connected']!==true)
{
    header('location:login.php');
    exit();
}

try 
{
    var_dump($_POST);
    if(array_key_exists('username',$_POST))
    {
        $articleCategorie  = $_POST['categorie'];
        $articletitle = $_POST['title'];
        $articlesubtitle = $_POST['subtitle'];
        $articleimage = $_POST['image'];
        $articlestatus = $_POST['status'];
        $articlecontent = $_POST['contenu'];
                        
        var_dump($_SESSION);
        
        if(strlen($articletitle !== '') !== true)
        {
            $error['titleArt'] = 'le titre ne peut etre vide';  
        }
                
        if(($articlecontent !== '') !== true)
        {
            $error['contentArt'] = 'le contenu de l article ne peut est vide';
        }

                

        if(count($error)== 0)
        {   
            
            $datecrea = new DateTime();
            $passe = password_hash($passe1,PASSWORD_DEFAULT);
            addArticle($articleCategorie,$articletitle,$articlesubtitle,$articleimage,$articlestatus,$articlecontent,$idUser,$datecrea);
            
            //header('Location:listArticle.php');
    
            //exit();
        }
    }
}
catch(PDOException $e)
{
    $vue = 'erreur';
    //Si une exception est envoyée par PDO (exemple : serveur de BDD innaccessible) on arrive ici
    $messageErreur = 'Une erreur de connexion a eu lieu :'.$e->getMessage();
}




include(TPL_DIRECTORY.LAYOUT.TPL_EXTENTION);