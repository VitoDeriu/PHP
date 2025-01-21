<?php
    include("connected.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="inscription.php" method="post">
        <label for="name">Identifiant</label>
        <input type="text" id="name" name="name">

        <label for="password">Mot de passe</label>
        <input type="password" id="password" name="password">

        <button type="submit">S'inscrire</button>
    </form>
</body>
</html>