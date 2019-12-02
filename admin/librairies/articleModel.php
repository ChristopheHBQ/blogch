<?php

function listArticle()
{
    
    $dbh = connexion();
    $sql = 'SELECT * 
            FROM articles';
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
    $articles = $stmt->fetchAll(PDO::FETCH_ASSOC); 
        
    return $articles;
   
}






?>