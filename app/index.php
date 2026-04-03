 
<?php
require 'db.php';
$pdo->exec("CREATE TABLE IF NOT EXISTS tasks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL
)");
$tasks = $pdo->query("SELECT * FROM tasks")->fetchAll(PDO::FETCH_ASSOC);
?>
<h1>Task manager</h1>
<form method="POST" action="add_task.php">
    <input type="text" name="title" placeholder="nouvelle task">
    <button type="submit">Ajouter</button>
</form>
<ul>
    <?php foreach ($tasks as $task): ?>
        <li>
            <?= $task['title'] ?>
            <a href="delete_task.php?id=<?= $task['id']; ?>">Supprimer</a>
        </li>
    <?php endforeach; ?>
</ul>