<?php
include('connexiondb.php');

$id = $_GET['id'] ?? null;
$tache = null;

if ($id) {
    $stmt = $pdo->prepare("SELECT * FROM tache WHERE id = ?");
    $stmt->execute([$id]);
    $tache = $stmt->fetch();
}

if (!$tache) {
    echo "Tâche introuvable";
    exit;
}

if (isset($_POST['modifier'])) {
    $desc = htmlspecialchars($_POST['description']);
    $status = isset($_POST['status']) ? true : false;
    $stmt = $pdo->prepare("UPDATE tache SET description = ?, status = ? WHERE id = ?");
    $stmt->execute([$desc, $status, $id]);
    header("Location: index.php");
    exit;
}
?>

<form method="POST">
    <input type="text" name="description" value="<?= $tache['description'] ?>">
    <label>
        <input type="checkbox" name="status" <?= $tache['status'] ? 'checked' : '' ?>>
        Terminée ?
    </label>
    <button name="modifier" type="submit">Modifier</button>
</form>
