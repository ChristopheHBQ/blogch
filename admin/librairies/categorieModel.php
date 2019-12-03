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

function checkCategorieLibele($libele)
{
    $dbh = connexion();
    $sql = 'SELECT id, libele
            FROM categories
            WHERE libele = :libele'; 
    $stmt = $dbh -> prepare($sql);
    $stmt -> bindValue(':libele', $libele);
    $stmt -> execute();
    $checkIdCategorie = $stmt -> fetch(PDO::FETCH_ASSOC);
    if($checkIdCategorie !== false)
        return true;

    return false;
}

function addCate($libele, $libeleParent=NULL)
{
    $dbh = connexion();
    $sql = 'INSERT INTO categories(libele, categories_id) 
            VALUES(:libele,:categories_id)';
    $insert = $dbh -> prepare($sql);
    $insert -> bindValue(':libele', $libele);
    $insert -> bindValue(':categories_id', $libeleParent);
    $insert-> execute();

    return $dbh->lastInsertId();
}

//function getIDCate($libeleParent)
//{
//    $dbh = connexion();
//    $sql = 'SELECT id
//            FROM categories
//            WHERE libele = :libele';
//    $stmt = $dbh->prepare($sql);
//    $stmt -> bindValue(':libele' , $libeleParent);
//    $stmt -> execute();
//    $idCatch = $stmt->fetch(PDO::FETCH_ASSOC);
//    return intval($idCatch['id']);
//}

function deleteCat($id)
{
    $dbh = connexion();  
    $sql = 'DELETE FROM categories
            WHERE id = :id';
    $stmt = $dbh -> prepare($sql);
    $stmt -> bindValue('id',$id);
    $stmt -> execute();
}