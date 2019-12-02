<?php
session_start();


include('config/config.php');
include('librairies/userModel.php');
include('librairies/db.lib.php');

$vue='login';
$title = 'Connexion';
$activeMenu='Utilisateurs';

$attention = 'alert-danger';
$submit ='connexion';
$error = [];
$_SESSION = [];
$username = '';
$passe = '';




if(array_key_exists('username',$_POST))
{
    $username  = $_POST['username'];
    $passe = $_POST['passe'];
    
    if($passe == ''){
        $error['passe'] = 'le mot de passe est vide';
    }
    
    if($username == ''){
        $error['username'] = 'le pseudo est vide';
    }

    if(count($error)== 0){

        $user = getUser($username);
    

        if($user !== false && password_verify($passe, $user['password'] ))
        {
            $_SESSION['connected'] = true;
            $_SESSION['user'] = ['id'=>$user['id'],'username'=>$user['username'],'email'=>$user['email'],'role'=>$user['role'],'avatar'=>$user['avatar']];
            updateLastLoginUser($username);
            

            header('Location:index.php');
    
            exit();

        }

    }
}

include(TPL_DIRECTORY.login.TPL_EXTENTION);