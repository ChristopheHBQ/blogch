<?php


function addUser($username,$email,$passe,$firstname,$lastname,$bio, $datecrea, $role)
{
    try 
    {
        $dbh = connexion();
        
        $sql = 'INSERT INTO users(username,email,password,firstname,lastname,bio,created_date,role) 
                VALUES(:username,:email,:password,:firstname,:lastname,:bio,:created_date,:role)';
        $insert = $dbh->prepare ($sql);
        $insert->execute(array('username'=>$username, 'email'=>$email, 'password'=>$passe, 'firstname'=>$firstname, 'lastname'=>$lastname, 'bio'=>$bio,'created_date'=>$datecrea, 'role'=>$role));

        return $dbh->lastInsertId();
    }
    catch(PDOException $e)
    {
        $vue = 'erreur.phtml';
        //Si une exception est envoyée par PDO (exemple : serveur de BDD innaccessible) on arrive ici
        $messageErreur = 'Une erreur de connexion a eu lieu :'.$e->getMessage();
    }
    catch(Exception $e)
    {
        $vue = 'erreur.phtml';
        //Si une exception est envoyée
        $messageErreur =  'Erreur dans la page :'.$e->getMessage();
    } 
} 
 


function updateLastLoginUser() 
{
    try 
    {
        $userid = $_SESSION['id'];
        $date = new DateTime();;

        $dbh = connexion();
        $sql = 'UPDATE users
                SET  last_login_date = :date
                WHERE id = :userid';
        $stmt = $dbh -> prepare($sql);
        $stmt ->bindValue(':date',$date);
        $stmt ->bindValue(':userid', $userid);
        $stmt -> execute();
    }
    catch(PDOException $e)
    {
        $vue = 'erreur.phtml';
        //Si une exception est envoyée par PDO (exemple : serveur de BDD innaccessible) on arrive ici
        $messageErreur = 'Une erreur de connexion a eu lieu :'.$e->getMessage();
    }
    catch(Exception $e)
    {
        $vue = 'erreur.phtml';
        //Si une exception est envoyée
        $messageErreur =  'Erreur dans la page :'.$e->getMessage();
    }  
} 



function loginUser()
{
    try
    {
        $username  = $_POST['username'];
        $passe = $_POST['passe'];

        $dbh = connexion();
        $sql = 'SELECT *
                FROM users
                WHERE username = :username';
        $stmt = $dbh->prepare($sql);
        $stmt -> bindValue(':username' , $username);
        $stmt -> execute();
        $_SESSION = $stmt->fetch(PDO::FETCH_ASSOC);

        if(password_verify($passe, $_SESSION['password'] ))
        {
            $_SESSION['connected'] = true;
            timelog();
            $vue = 'listUser';
            return $vue;
        }
        $vue = 'login';
        return $vue;
    }
    catch(PDOException $e)
    {
        $vue = 'erreur.phtml';
        //Si une exception est envoyée par PDO (exemple : serveur de BDD innaccessible) on arrive ici
        $messageErreur = 'Une erreur de connexion a eu lieu :'.$e->getMessage();
    }
    catch(Exception $e)
    {
        $vue = 'erreur.phtml';
        //Si une exception est envoyée
        $messageErreur =  'Erreur dans la page :'.$e->getMessage();
    } 
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
