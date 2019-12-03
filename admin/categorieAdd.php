<?php

session_start();

include('config/config.php');
include('librairies/categorieModel.php');
include('librairies/db.lib.php');

$vue='categorieAdd';
$title = 'catégories';
$submit = 'enregistrer';

$error = [];


$libele = '';
$libeleParent = '';
$categories = '';

if(!isset($_SESSION['connected']) && $_SESSION['connected']!==true)
{
    header('location:login.php');
    exit();
}



try 
{
    $categories = listCategorie();

    if(array_key_exists('libele',$_POST))
    {

        $libele = $_POST['libele'];
        $libeleParent = $_POST['libeleParent'];
    
        if (($libele !== '') !== true)
        {   
            $error['libele'] = 'le libélé est vide';
        }

        
        if(count($error)== 0)
        {   
            if($libeleParent == 0) 
                $libeleParent = 'NULL';
            addCate($libele, $libeleParent);
            header('Location:categorieListe.php');

            exit();

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