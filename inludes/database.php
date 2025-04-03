<?php
$dsn = 'mysql:host=localhost;dbname=artprojet;charset=utf8';
$username = 'root';
$password = '';

//options de connexion
$options = [
PDO::MYSQL_ATTR_INIT_COMMAND =>"SET NAMES utf8", //flux/échange des données PHP/MySQL en utf8
PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, //afficher les messages d'erreurs
PDO::ATTR_DEFAULT_FETCH_MODE =>PDO::FECTH_ASSOC, //données SQL dans un tableau associatif PHP
];

$pdo = new PDO(
'mysql:host=localhost;dbname=artprojet', //chaine de connexion
'root', //login
'', //password aucun sur le serveur local
$options
);

// print_r($pdo); // ressource PDO dans le script PHP, connexion
// # terminer la connexion, on écrase l'objet dans le script
// // $pdo = Null;