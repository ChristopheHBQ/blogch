<?php

function insertInBase()
{
    $username  = $_POST['username'];
    $email = $_POST['email'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $bio = $_POST['bio'];
    $passe1 = $_POST['passe1'];
    $role = $_POST['role'];
    $datecrea = date('Y-m-d H:i:s');

    $dbh = connexion();
    $insert = $dbh->prepare ('INSERT INTO users(username,email,password,firstname,lastname,bio,created_date,role) VALUES(:username,:email,:password,:firstname,:lastname,:bio,:created_date,:role)');
    
    var_dump($insert);
    $insert ->execute(array('username'=>$username, 'email'=>$email, 'password'=>$passe1, 'firstname'=>$firstname, 'lastname'=>$lastname, 'bio'=>$bio,'created_date'=>$datecrea, 'role'=>$role));
}