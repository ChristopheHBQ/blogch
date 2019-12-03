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



function addArticle($articleCategorie, $articletitle,$articlesubtitle,$articleimage,$articlestatus,string $articlecontent,int $idUser, DateTime $publishedDate)
{  
   
    
    $dbh = connexion();
    //`title``subtitle``content``image``status``created_date``published_date``users_id``categories_id`
    $sql = 'INSERT INTO articles(title,subtitle,content,image,status,created_date,published_date,users_id,categories_id) 
            VALUES(:title,:subtitle,:content,:image,:status,:created_date,:published_date,:users_id,:categories_id)';
    $insert = $dbh->prepare($sql);
    $stmt -> bindValue(':title', $articletitle);
    $stmt -> bindValue(':subtitle', $articlesubtitle);
    $stmt -> bindValue(':content', $articlecontent);
    $stmt -> bindValue(':image', $articleimage);
    $stmt -> bindValue(':status', $articlestatus);
    $stmt -> bindValue(':created_date', $date);
    $stmt -> bindValue(':published_date', $publishedDate->format('Y-m-d H:i:s'));
    $stmt -> bindValue(':users_id', $idUser);
    $stmt -> bindValue(':categories_id', $articleCategorie);
    $insert->execute();
    $dbh = $stmt->fetchAll(PDO::FETCH_ASSOC); 

    return $dbh->lastInsertId();
} 




?>