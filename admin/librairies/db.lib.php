<?php


function connexion()
{
    $dbh = new PDO(DB_DSN,DB_USER,DB_PASS);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $dbh;
}



