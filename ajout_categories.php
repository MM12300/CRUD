<?php
//Ici on traite le formulaire

//Vérifier si $_POST existe, si le traitement du form marche
if(isset($_POST) && !empty($_POST)){
    //On vérifie si tous les champs du formulaire sans remplis
    //on aurait pu utiliser la fonction verifForm mais il n'y a qu'un champ du formulaire à vérifier
    if(isset($_POST['nom']) && !empty($_POST['nom'])){
        //On récupère la valeur saisie dans input, non protégée
        //$nom=$_POST['nom'];
        
        //On récupère la valeur saisie dans le champ et on les nettoie
        //Pour éviter les failles XSS
        //METHODE 1 : enlever les balises HTML
        //$nom = strip_tags($_POST);
        //METHODE 2 : désactiver les balises HTML
        $nom = htmlentities($_POST['nom']);

        
        //on se connecte à la BDD
        require_once('connect.php');

        //Requête SQL
        $sql = 'INSERT INTO `categories` (`name`) VALUES (:nom);';

        //On prépare la requête
        $query= $db->prepare($sql);

        //On injecte les valeurs dans la requête
        $query->bindValue(':nom', $nom, PDO::PARAM_STR);

        //On éxécute la requête
        $query->execute();

        //On déconnecte la BDD
        require_once('close.php');

        //Ici on peut :
        // - Rediriger l'utilisateur
        // - Récupérer et afficher l'id de l'enregistrement ajouté
        // - Autre en fonction du site

        }else{
        echo "Attention il faut entrer un nom de catégorie";
    }
}




?>





<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une catégorie</title>
</head>
<body>
    <h1>Ajouter une catégorie</h1>
    <form method="post">
        <div>
            <label for="nom">Nom de la catégorie</label>
            <input type="text" id="nom" name="nom">
        </div>
        <button>Ajouter une catégorie</button>
    </form>
    
</body>
</html>