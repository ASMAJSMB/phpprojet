<?php
include 'warehouse_functions.php';
$warehouses = getAllWarehouses();

// Vérifier si un id de suppression est passé en GET et appeler la fonction de suppression
if (isset($_GET['delete_id'])) {
    // Récupérer l'ID de l'entrepôt à supprimer
    $deleteId = $_GET['delete_id'];
    
    // Appeler la fonction pour supprimer l'entrepôt
    deleteWarehouse($deleteId);
    
    // Rediriger vers la même page après la suppression
    header("Location: /project/public/warehouses.php");
    exit; // Arrêter l'exécution du script après la redirection
}
?>

<h2>Warehouses</h2>
<a href="warehouse_form.php">Add New Warehouse</a>
<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Address</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($warehouses as $warehouse): ?>
            <tr>
                <td><?php echo $warehouse['name_warehouse']; ?></td>
                <td><?php echo $warehouse['address_warehouse']; ?></td>
                <td>
                    <a href="warehouse_form.php?id=<?php echo $warehouse['id_warehouse']; ?>">Edit</a>
                    <a href="warehouses.php?delete_id=<?php echo $warehouse['id_warehouse']; ?>" onclick="return confirm('Are you sure you want to delete this warehouse?');">Delete</a>

            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
