<?php
//Ce fichier sert à supprimer une catégorie

//On vérifie si on a un ID
if(isset($_GET['id']) && !empty($_GET['id'])){
    //On récupère l'id envoyée et on nettoie
    $id = strip_tags($_GET['id']);

    //On se connecte à la base
    require_once("connect.php");

    //On écrit la requête
    $sql = 'DELETE FROM `categories` WHERE `id`= :id;';

    //On prépare la requête
    $query = $db->prepare($sql);

    //On injecte les valeurs dans la requête
    $query->bindValue(':id', $id, PDO::PARAM_STR);

    //On éxécute la requête
    $query->execute();

    //On déconnecte la BDD
    require_once('close.php');

    //On redirige ou un affiche un message une fois la suppression effectué


}else{
    //pas d'id
    //On redirige l'utilisateur 
}