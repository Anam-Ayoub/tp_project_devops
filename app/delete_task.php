<?php
require 'db.php';

if (!empty($_GET['id'])) {
    $stmt = $pdo->prepare("DELETE FROM taskDB WHERE id = ?");
    $stmt->execute([$_GET['id']]);
}

header("Location: index.php");