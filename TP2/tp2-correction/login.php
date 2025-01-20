<?php
    include_once("connected.php");
    if($connected) {
        header('location:wtf.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Connexion</h1>
    <form action="connexion.php" method="post">
        <label for="name"></label>
        <input type="text" id="name" name="name" required>
        <button type="submit">Se connecter</button>
    </form>
</body>
</html>