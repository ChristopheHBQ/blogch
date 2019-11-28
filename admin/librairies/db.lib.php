<?php


function connexion()
{
    $dbh = new PDO(DB_DSN,DB_USER,DB_PASS);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $dbh;
}

function insertInBase($username, $email, $password, $firstname, $lastname, $bio, $role)
{
    $insert
}

//INSERT INTO `users` (`id`, `username`, `email`, `password`, `firstname`, `lastname`, `bio`, `created_date`, `last_login_date`, `role`, `avatar`) VALUES (NULL, 'jghj', 'ghjghjgh', 'jghjghj', 'ghjghjg', 'jghjghj', 'ghjghjghjgh', '2019-11-28 00:00:00', '2019-11-28 00:00:00', '', NULL);