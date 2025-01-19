<?php
session_start();

// Si l'utilisateur est déjà connecté, on le redirige vers la page d'accueil
if (isset($_SESSION['username'])) {
    header('Location: index.php');
    exit();
}

// Traitement du formulaire de connexion
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';

    // Vérifie si un nom a été saisi
    if ($username) {
        $_SESSION['username'] = $username; // Stocke le nom dans la session
        header('Location: index.php'); // Redirige vers la page d'accueil
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
