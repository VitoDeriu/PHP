<?php
session_start();

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
} else {
    $username = null;
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'Accueil</title>
</head>
<body>
    <?php if ($username): ?>
        <h1>Bienvenue, <?php echo htmlspecialchars($username); ?>!</h1>
        <a href="logout.php">Se déconnecter</a>
    <?php else: ?>
        <h1>Bienvenue sur notre site!</h1>
        <a href="login.php">Se connecter</a>
    <?php endif; ?>
</body>
</html>
