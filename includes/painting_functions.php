<?php
// ce fichier represente les fonctions que jai utilisée pour tout ce qui conserne painting comme ajouter supprimer modifier 
require_once '../config/database.php';

if (!$pdo instanceof PDO) {
    die("La connexion à la base de données a échoué.");
}
function get_all_paintings($pdo) {
    $stmt = $pdo->query('SELECT * FROM painting'); //ici pour selectionner les colonnes dans la table painting
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getPaintingById($id) {
    global $pdo;  
    // ici on a selectionne la table ou le id correspend a le id quon veut travailler sur 
    $query = "SELECT * FROM painting WHERE id_painting = :id";
    $stmt = $pdo->prepare($query);
    $stmt->execute(['id' => $id]);
    
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function addPainting($title, $artist,$year,$width,$height,$id_warehouse) {
    global $pdo; // cette fontion permet de ajouter un painting 
    $stmt = $pdo->prepare("INSERT INTO painting (title_painting, artist_name, production_year, width , height , id_warehouse) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->execute([$title, $artist, $year, $width, $height ,$id_warehouse ]);
}
function updatePainting($id, $title, $artist, $year, $width, $height, $id_warehouse) {
    global $pdo;  //cellla pour modifier 
    $stmt = $pdo->prepare("UPDATE painting SET title_painting = ?, artist_name = ?, production_year = ?, width = ?, height = ?, id_warehouse = ? WHERE id_painting = ?");
    $stmt->execute([$title, $artist, $year, $width, $height, $id_warehouse, $id]);
}


function deletePainting($id) {
    // et cella pour supprimer une painting dans la page et méme dans la base de donnée 
    global $pdo;
    $stmt = $pdo->prepare("DELETE FROM painting WHERE id_painting = ?");
    $stmt->execute([$id]);
}
?>

