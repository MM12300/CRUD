<?php
try {
    //Connexion à la base de données
    $db = new PDO('mysql:host=localhost;dbname=blog', 'root', '');

    //On force les échanges en UTF8
    $db->exec('SET NAMES "UTF8"');

    echo "on est connecté";
}catch (PDOException $e) {
    //en cas de problème on émet un message d'erreur
    echo 'Erreur: ' . $e->getMessage();
    die;
}