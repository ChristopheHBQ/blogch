<?php

function listCategorie()
{
    
    $dbh = connexion();
    $sql = 'SELECT * 
            FROM categories';
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
    $categories = $stmt->fetchAll(PDO::FETCH_ASSOC); 
        
    return $categories;
   
}