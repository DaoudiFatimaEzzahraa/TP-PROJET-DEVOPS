<?php
require 'db.php';
$pdo->exec("CREATE TABLE IF NOT EXISTS tasks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255)
)");
$tasks = $pdo->query("SELECT * FROM tasks")->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Manager</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Task Manager</h1>
        
        <form method="POST" action="add_task.php" class="add-form">
            <input type="text" name="title" placeholder="Nouvelle tâche" required>
            <button type="submit">Ajouter</button>
        </form>
        
        <div class="tasks-list">
            <h2>Mes tâches</h2>
            <?php if (count($tasks) > 0): ?>
                <?php foreach ($tasks as $task): ?>
                    <div class="task-item">
                        <span class="task-title"><?= htmlspecialchars($task['title']) ?></span>
                        <div class="task-actions">
                            <a href="update.php?id=<?= $task['id']; ?>" class="edit-btn">Modifier</a>
                            <a href="delete_task.php?id=<?= $task['id']; ?>"class="delete-btn" onclick="return confirm('Supprimer cette tâche ?')">Supprimer</a>
                        </div>
                    </div>
                <?php endforeach; ?>           
            <?php endif; ?>
        </div>
    </div>
</body>
</html>