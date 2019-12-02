<?php


function addUser($username,$email,$passe,$firstname,$lastname,$bio, $datecrea, $role)
{  
    $dbh = connexion();
    
    $sql = 'INSERT INTO users(username,email,password,firstname,lastname,bio,created_date,role) 
            VALUES(:username,:email,:password,:firstname,:lastname,:bio,:created_date,:role)';
    $insert = $dbh->prepare($sql);
    $insert->execute(array('username'=>$username, 'email'=>$email, 'password'=>$passe, 'firstname'=>$firstname, 'lastname'=>$lastname, 'bio'=>$bio,'created_date'=>$datecrea, 'role'=>$role));

    return $dbh->lastInsertId();
} 

function checkUser($username)
{
    $dbh = connexion();
    $sql = 'SELECT id, username
            FROM users
            WHERE username = :username'; 
    $stmt = $dbh -> prepare($sql);
    $stmt -> bindValue(':username', $username);
    $stmt -> execute();
    $checkIdUsername = $stmt -> fetch(PDO::FETCH_ASSOC);
    if($checkIdUsername !== false)
        return true;

    return false;
}

function checkMail($email)
{
    $dbh = connexion();
    $sql = 'SELECT id, email
            FROM users
            WHERE email = :email'; 
    $stmt = $dbh -> prepare($sql);
    $stmt -> bindValue(':email', $email);
    $stmt -> execute();
    $checkIdUsermail = $stmt -> fetch(PDO::FETCH_ASSOC);
    if($checkIdUsermail !== false)
        return true;

    return false;
}
 


function updateLastLoginUser($username) 
{    
    $user = getUser($username);
    $userid = $user['id'];
    var_dump($userid);
    $date = Date('Y-m-d H:i:s');
    var_dump($date);

    $dbh = connexion();
    $sql = 'UPDATE users
            SET  last_login_date = :date
            WHERE id = :id';
    $stmt = $dbh -> prepare($sql);
    $stmt ->bindValue(':date',$date);
    $stmt ->bindValue(':id', $userid);
    $stmt -> execute();
}



function getUser($username)
{
    $dbh = connexion();
    $sql = 'SELECT *
            FROM users
            WHERE username = :username';
    $stmt = $dbh->prepare($sql);
    $stmt -> bindValue(':username' , $username);
    $stmt -> execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);

}

 


function listUser()
{
    
    $dbh = connexion();
    $sql = 'SELECT * 
            FROM users';
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC); 
        
    return $users;
   
}
