<?php
require 'db.php';

// Check if ID is provided
if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit();
}

$id = $_GET['id'];

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    
    $stmt = $pdo->prepare("UPDATE tasks SET title = ? WHERE id = ?");
    $stmt->execute([$title, $id]);
    
    header("Location: index.php");
    exit();
}

// Get the task to edit
$stmt = $pdo->prepare("SELECT * FROM tasks WHERE id = ?");
$stmt->execute([$id]);
$task = $stmt->fetch(PDO::FETCH_ASSOC);

// If task doesn't exist
if (!$task) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier la tâche</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Modifier la tâche</h1>
        
        <form method="POST" class="add-form">
            <input type="text" name="title" value="<?= htmlspecialchars($task['title']) ?>" required>
            <button type="submit">Mettre à jour</button>
            <a href="index.php" class="cancel-btn">Annuler</a>
        </form>
    </div>
</body>
</html>