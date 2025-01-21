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
    <?php  
    echo ("Bonjour $username !");
    ?>
    <a href="alluser.php">Voir tous les utilisateurs</a>
    <a href="deconnexion.php">Se Déconnecter</a>
</body>
</html>