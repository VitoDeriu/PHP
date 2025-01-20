<?php
session_start();

if (isset($_SESSION['username'])) {
    header('Location: index.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    if ($username) {
        $_SESSION['username'] = $username; 
        header('Location: index.php'); 
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Se connecter</title>
</head>
<body>
    <h1>Connexion</h1>
    <form method="POST">
        <label for="username">Nom :</label>
        <input type="text" id="username" name="username" required>
        <button type="submit">Se connecter</button>
    </form>
</body>
</html>
