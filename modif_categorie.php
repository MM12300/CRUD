<?php
//Cette page permet de modifier une catégorie
//On récupère dans l'url l'id de la catégorie
//par l'intermédiaire de $_GET


if(isset($_GET['id']) && !empty($_GET['id'])){
    //vérifier si on a un id et si il n'est pas vide

    //On récupère l'id et on nettoie
    $id = strip_tags($GET['id']);

    //On se connecte à la base pour obtenir la categorie
    require_once('connect.php');

    //requête SQL
    $sql = 'SELECT * FROM `categories` WHERE `id` = :id;';

    //On a une variable donc on utilise une requête préparée
    $query = $db->prepare($SQL);

    //On injecte les valeurs
    $query->bindValue(':id', $id, PDO::PARAM_INT);

    //On éxécute la requête
    $query->execute();

    //On récupère les données
    $categorie = $query->fetch(PDO::FETCH_ASSOC);

    //On se déconnecte
    require_once('close.php');

    //Si la catégorie n'existe pas
    if(!$categorie){
        echo 'La catégorie n\'existe pas';
        die;
    }




    
           }else{
        echo "Message d'erreur";
    }



$nomchange = ;
//Requête SQL
$sql= UPDATE `categories` SET `name`=":nom_modif" WHERE id=""

?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier une catégorie</title>
</head>
<body>
    <h1>Modifier une catégorie</h1>
    <form method="post">
        <div>
            <label for="nom">Nom de la catégorie</label>
            <input type="text" id="nom" name="nom_modif" value="<?= $categories['name']?>">
        </div>
        <button>Modifier la catégorie</button>
    </form>
    
</body>
</html>