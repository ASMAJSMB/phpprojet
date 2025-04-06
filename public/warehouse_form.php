<?php
include '../config/database.php';
include '../includes/header.php';
include '../includes/warehouse_functions.php';

$warehouse = null;

// Vérifier si l'id est passé en paramètre GET
if (isset($_GET['id'])) {
    $warehouse = getWarehouseById($_GET['id']);
}

// Si le formulaire est soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $address = $_POST['address'];

    if (isset($_POST['id']) && $_POST['id'] != '') {
        $id = $_POST['id'];
        updateWarehouse($id, $name, $address);
    } else {
        // Appel correct sans passer $pdo
        addWarehouse($name, $address);
    }

    header('Location: warehouses.php');
    exit;
}
?>

<h2><?php echo isset($warehouse) ? 'Edit Warehouse' : 'Add Warehouse'; ?></h2>
<link rel="stylesheet" href="assets/css/style.css">
<form method="post" action="">
    <input type="hidden" name="id" value="<?php echo isset($warehouse) ? htmlspecialchars($warehouse['id_warehouse']) : ''; ?>">
    <label for="name">Name:</label>
    <input type="text" name="name" id="name" required value="<?php echo isset($warehouse) ? htmlspecialchars($warehouse['name_warehouse']) : ''; ?>">
    <label for="address">Address:</label>
    <input type="text" name="address" id="address" required value="<?php echo isset($warehouse) ? htmlspecialchars($warehouse['address_warehouse']) : ''; ?>">
    <button type="submit">Save</button>
</form>
