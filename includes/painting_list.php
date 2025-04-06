<?php

include_once  'painting_functions.php'; // cette ligne inclut le fichier painting-fnction qui se trouve dans le méme dossier
// pour utiliser les fonctions declarées dans ce dossier en question


$paintings = get_all_paintings($pdo);

// Vérifier si un id de suppression est passé en GET et appeler la fonction de suppression
if (isset($_GET['delete_id'])) {
    // Récupérer l'ID de la peinture à supprimer
    $deleteId = $_GET['delete_id'];
    
    // Appeler la fonction pour supprimer la peinture
    deletePainting($deleteId);
    
    // Rediriger vers la même page après la suppression
    header("Location: /project/public/paintings.php");
    exit;// Arrêter l'exécution du script après la redirection
}


?>
<!-- ça cest le html de la liste des painting simple rien a dire  -->
<h2>List of Paintings</h2>
<a href="../public/painting_form.php?action=add">Add New Painting</a>
<table border="1" cellpadding="8" cellspacing="0">
    <thead>
        <tr>
            <th>Title</th>
            <th>Year</th>
            <th>Artist</th>
            <th>Dimensions</th>
            <th>Warehouse</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($paintings as $painting): ?>
            <tr>
                <!-- ici on a appelé les informations qui se trouvent dans la base de donnée et je lai ai mis dans cette page -->
                <td><?php echo htmlspecialchars($painting['title_painting']); ?></td>
                <td><?php echo htmlspecialchars($painting['production_year']); ?></td>
                <td><?php echo htmlspecialchars($painting['artist_name']); ?></td>
                <td><?php echo htmlspecialchars($painting['width']) . ' x ' . htmlspecialchars($painting['height']); ?></td>
                <td><?php echo htmlspecialchars($painting['id_warehouse']); ?></td>
            <td>
                <a href="painting_form.php?id=<?php echo $painting['id_painting']; ?>">Edit</a>
<!-- le bouton edit  -->
                    <a href="paintings.php?delete_id=<?php echo $painting['id_painting']; ?>" onclick="return confirm('Are you sure you want to delete this warehouse?');">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php include '../includes/footer.php'; ?>
