<?php

include('config/config.php');
include('librairies/functions.php');
include('librairies/db.lib.php');

$vue='addUser';
$title = 'Nouvel utilisateur';
$activeMenu='Utilisateurs';


$username ='';
$email ='';
$firstname ='';
$lastname ='';
$bio ='';
$passe1 ='';
$passe2 ='';
$role ='';
$submit ='enregistrer';
$checkusername = '';
$checkpasse = '';
$checkemail = '';
$checkfirstname = '';
$checklastname = '';
$checkrole = '';
$checkbio = '';
$error = [];

$attention = 'alert-danger';


//var_dump($_POST);
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
    
    if(strlen($passe1) < '4'){
        $error['passlen'] = 'les mots de passe doit contenir au moins 4 caractérer';  
        $checkpasse = $attention;
    }
    elseif(($passe1 !== $passe2) == true){
        $error['pass'] = 'les mots de passe ne concordent pas';
        $checkpasse = $attention;
    }

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $error['email'] = 'email non valide'; 
        $checkemail = $attention;
    }
    
    if(($username !== '') !== true){
        $error['username'] = 'le pseudo est vide';
    }

    if(($firstname !== '') !== true){
        $error['firstname'] = 'le prenom est vide';
        $checkfirstname = $attention;
    }

    if(($lastname !== '') !== true){
        $error['lastname'] = 'le nom est vide';
        $checklastname = $attention;
    }
    
    if(($role !== '') !== true){
        $error['role'] = 'le role doit etre saisit';
        $checkrole = $attention;
    }


    if(count($error)== 0){

        
        insertInBase();
    }
    
    //if empty ($error);

}

include(TPL_DIRECTORY.LAYOUT.TPL_EXTENTION);


