<?php
include '../config/database.php';
// toute les fonctiuons pareil que le fichier painting_functions.php
function getAllWarehouses() {
    global $pdo;
    $stmt = $pdo->query("SELECT * FROM warehouse");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function addWarehouse($name, $address) {
    global $pdo;
    $stmt = $pdo->prepare("INSERT INTO warehouse (name_warehouse, address_warehouse) VALUES (?, ?)");
    $stmt->execute([$name, $address]);
}




function updateWarehouse($id, $name, $address) {
    global $pdo;
    $stmt = $pdo->prepare("UPDATE warehouse SET name_warehouse = ?, address_warehouse = ? WHERE id_warehouse = ?");
    $stmt->execute([$name, $address, $id]);
}

function deleteWarehouse($id) {
    global $pdo;
    $stmt = $pdo->prepare("DELETE FROM warehouse WHERE id_warehouse = ?");
    $stmt->execute([$id]);
}


function getWarehouseById($id) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM warehouse WHERE id_warehouse = ?");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
?>
