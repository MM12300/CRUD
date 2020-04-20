<?php
//On se connecte à la base
require_once('connect.php');
$sql = 'SELECT * FROM `users` WHERE `id` = :id;';


//id est variable, donc on utilise une requête "préparée"
$query = $db->prepare($sql);
//On injecte les valeurs dans la requête 
$query->bindValue(':id', 2, PDO::PARAM_INT);
$query->execute();


//On récupère les données d'un utilisateur
$user = $query->fetch(PDO::FETCH_ASSOC);

//On se déconnecte
require_once('close.php');

var_dump($user);