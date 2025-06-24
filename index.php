<?php
include('connexiondb.php');

// Ajouter une nouvelle tâche
if (isset($_POST['ajouter']) && !empty($_POST['description'])) {
    $desc = htmlspecialchars($_POST['description']);
    $stmt = $pdo->prepare("INSERT INTO tache (description) VALUES (?)");
    $stmt->execute([$desc]);
}

// Récupérer toutes les tâches
$stmt = $pdo->query("SELECT * FROM tache ORDER BY id DESC");
$taches = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ma To-Do List</title>
</head>
<body>
    <h1>To-Do List</h1>

    <form method="POST">
        <input type="text" name="description" placeholder="Nouvelle tâche">
        <button name="ajouter" type="submit">Ajouter</button>
    </form>

    <ul>
        <?php foreach ($taches as $tache): ?>
            <li>
                <?= $tache['description'] ?> 
                <?= $tache['status'] ? '✅' : '❌' ?>
                <a href="modifier.php?id=<?= $tache['id'] ?>">✏️</a>
                <a href="supprimer.php?id=<?= $tache['id'] ?>" onclick="return confirm('Supprimer ?')">🗑️</a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
