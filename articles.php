<?php
// Cette page récupère la liste de tous les articles de la base de données
//On écrit la requête SQL

// On se connecte à la base :
require_once('connect.php');
//require_once car on se connecte qu'une fois

$sql = 'SELECT * FROM `articles`;';
// BONNE PRATIQUE : 1 ; pour SQL et 1 ; pour PHP

// Requête sans variable donc utilisation de la méthode query
$query = $db->query($sql);

//On va chercher les résultats de la requête
$articles = $query->fetchAll(PDO::FETCH_ASSOC);

//On se déconnecte de la bse une fois que $articles contient les données de la base, libère la variable $db
require_once('close.php');


echo '<pre>';
var_dump($articles);
echo '</pre>';