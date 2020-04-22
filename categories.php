<?php
// Cette page récupère la liste de tous les articles de la base de données

// On se connecte à la base
require_once('connect.php');

// On écrit la requête SQL
$sql = 'SELECT * FROM `categories`;'; // ; SQL et ; PHP

// Requête sans variable donc utilisation de la méthode query
$query = $db->query($sql);

// On va chercher les résultats de la requête
$categories = $query->fetchAll(PDO::FETCH_ASSOC);

// On se déconnecte de la base
require_once('close.php');

foreach($categories as $categorie){
    echo "<p>".$categorie['name'].'</p>';
}