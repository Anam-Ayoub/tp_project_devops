
<?php

require 'db.php';

$pdo->exec("CREATE TABLE IF NOT EXISTS taskDB (
	id INT AUTO_INCREMENT PRIMARY KEY,
	title VARCHAR(255)
    )");

$tasks = $pdo->query("SELECT * FROM taskDB")->fetchAll(PDO::FETCH_ASSOC);
?>
<html>
<body>
    <h1>Welcome to TaskInator!</h1>
    <p>The Task Manager used by the Moroccan Space Agency!</p>

    <h2>Tasks:</h2>
    <form action="add_task.php" method="POST">
        <input name="title" placeholder="Let's Reach the Moon!" required>
        <button type="submit">Add Task</button>
    </form>

    <ul>
        <?php foreach ($tasks as $tsk): ?>
            <li>
                <?= $tsk['title'] ?>
                <a href="delete_task.php?id=<?= $tsk['id'] ?>">Delete</a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
