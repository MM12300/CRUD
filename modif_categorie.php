<?php
//Cette page permet de modifier une catégorie
//On récupère dans l'url l'id de la catégorie
//par l'intermédiaire de $_GET


if(isset($_GET['id']) && !empty($_GET['id'])){
    //vérifier si on a un id et si il n'est pas vide

    //On récupère l'id et on nettoie
    $id = strip_tags($_GET['id']);

    //On se connecte à la base pour obtenir la categorie
    require_once('connect.php');

    //requête SQL
    $sql = 'SELECT * FROM `categories` WHERE `id` = :id;';

    //On a une variable donc on utilise une requête préparée
    $query = $db->prepare($sql);

    //On injecte les valeurs
    $query->bindValue(':id', $id, PDO::PARAM_INT);

    //On éxécute la requête
    $query->execute();

    //On récupère les données
    $categorie = $query->fetch(PDO::FETCH_ASSOC);

    //Si la catégorie n'existe pas
    if(!$categorie){
        echo 'La catégorie n\'existe pas';
        die;
    }

    //On vérifie le formulaire $_POST
    //On vérifier si name existe et n'est pas nul
if(isset($_POST['nom_modif']) && !empty($_POST['nom_modif'])){
        //On doit modifier l'engistrement de la base
        //On récupère le nom saisi et on le nettoie
        $nom = strip_tags($_POST['nom_modif']);

        //Requête SQL
        $sql = 'UPDATE `categories` SET `name` = :name WHERE `id`=:id;';

        //On prépare la requête
        $query = $db->prepare($sql);
        
        //On injecte les valeurs
        $query->bindValue(':name', $nom, PDO::PARAM_STR);
        $query->bindValue(':id', $id, PDO::PARAM_INT);

        //On éxécute la requête
        $query->execute();

        //On redirige vers une autre page (liste des catégories par exemple)  
        header('location: categories.php');
}
    //On se déconnecte
    require_once('close.php');  
           }else{
        echo "Message d'erreur";
    }

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
            <input type="text" id="nom" name="nom_modif" value="<?= $categorie['name']?>">
        </div>
        <button>Modifier la catégorie</button>
    </form>
    
</body>
</html>