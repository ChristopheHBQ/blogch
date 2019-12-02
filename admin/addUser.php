<?php

session_start();

include('config/config.php');
include('librairies/userModel.php');
include('librairies/db.lib.php');

$vue='addUser';
$admin = 'admin';
$title = 'Nouvel utilisateur';
$activeMenu ='Utilisateurs';


$username ='';
$email ='';
$firstname ='';
$lastname ='';
$bio ='';
$passe1 ='';
$passe2 ='';
$role ='';
$submit ='enregistrer';
$error = [];


try 
{
    var_dump($_POST);
    if(array_key_exists('username',$_POST))
    {
        $username  = $_POST['username'];
        $email = $_POST['email'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $bio = $_POST['bio'];
        $passe1 = $_POST['passe1'];
        $passe2 = $_POST['passe2'];
        $role = $_POST['role'];
        
        var_dump($username);
        var_dump(checkUser($username));

        if(strlen($passe1) < '4')
        {
            $error['passlen'] = 'les mots de passe doit contenir au moins 4 caractérer';  
        }
        elseif(($passe1 !== $passe2) == true)
        {
            $error['pass'] = 'les mots de passe ne concordent pas';
        }

        if(!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            $error['email'] = 'email non valide'; 
        }
        
        if(checkMail($email))
        {
            $error['email'] = 'email déja utilisé';
        }
        
        if(($username !== '') !== true)
        {
            $error['username'] = 'le pseudo est vide';
        }

        if(($firstname !== '') !== true)
        {
            $error['firstname'] = 'le prenom est vide';
        }

        if(($lastname !== '') !== true)
        {
            $error['lastname'] = 'le nom est vide';
        }
        
        if(($role !== '') !== true)
        {
            $error['role'] = 'le role doit etre saisit';
        }
        
        if (checkUser($username))
        {   
            $error['username'] = 'l\'utilisateur existe déjà';
        }

        if(count($error)== 0)
        {   
            
            $datecrea = new DateTime();
            $passe = password_hash($passe1,PASSWORD_DEFAULT);
            addUser($username, $email, $passe, $firstname, $lastname, $bio, $datecrea->format('Y-m-d H:i:s'), $role);
            //header('Location:listUser.php');
    
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


