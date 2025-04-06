<?php
include '../config/database.php'; 
include '../includes/header.php';
include '../includes/painting_functions.php';
include '../includes/warehouse_functions.php';


// Initialisé la table
$painting = null;

// Si un tableau est en cours d'édition (GET avec id)
if (isset($_GET['id'])) {
    $painting = getPaintingById($_GET['id']);
}

// Traitement du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $artist = $_POST['artist'];
    $year = $_POST['year'];
    $width = $_POST['width'];
    $height = $_POST['height'];
    $id_warehouse = $_POST['id_warehouse'];

    if (isset($_POST['id']) && $_POST['id'] !== '') {
        $id = $_POST['id'];
        updatePainting($id, $title, $artist, $year, $width, $height, $id_warehouse);
    } else {
        addPainting($title, $artist, $year, $width, $height, $id_warehouse);
    }

    // Rediriger après enregistrement
    header('Location: paintings.php');
    exit;
}

// Charger les entrepôts pour le select
$warehouses = getAllWarehouses($pdo);
?>

<h2><?php echo $painting ? 'Edit Painting' : 'Add New Painting'; ?></h2>

<form method="post" action="">
    <input type="hidden" name="id" value="<?php echo isset($painting) ? $painting['id_painting'] : ''; ?>">

    <label for="title">Title:</label>
    <input type="text" name="title" id="title" value="<?php echo $painting['title'] ?? ''; ?>" required>

    <label for="artist">Artist:</label>
    <input type="text" name="artist" id="artist" value="<?php echo $painting['artist'] ?? ''; ?>" required>

    <label for="year">Year:</label>
    <input type="number" name="year" id="year" value="<?php echo $painting['year'] ?? ''; ?>" required>

    <label for="width">Width:</label>
    <input type="number" name="width" id="width" value="<?php echo $painting['width'] ?? ''; ?>" required>

    <label for="height">Height:</label>
    <input type="number" name="height" id="height" value="<?php echo $painting['height'] ?? ''; ?>" required>

    <label for="id_warehouse">Warehouse:</label>
    <select name="id_warehouse" id="id_warehouse" required>
        <option value="">Select a warehouse</option>
        <?php foreach ($warehouses as $warehouse): ?>
            <option value="<?php echo $warehouse['id_warehouse']; ?>"
                <?php echo (isset($painting) && $painting['id_warehouse'] == $warehouse['id_warehouse']) ? 'selected' : ''; ?>>
                <?php echo $warehouse['name_warehouse']; ?>
            </option>
        <?php endforeach; ?>
    </select>

    <br><br>
    <button type="submit">Save</button>
</form>

<?php include '../includes/footer.php'; ?>
