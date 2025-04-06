<!-- POUR CE CONNECTER AVEC LABASE DE DONNEE artprojet -->
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "artprojet"; // le nom de la base de donnée 

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // connexion avec la basededonnée 
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
