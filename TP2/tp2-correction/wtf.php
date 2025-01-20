<?php
include_once("connected.php");
if(!$connected) {
    header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WTF ???</title>
</head>
<body>
    <main>
        <?php echo("Hey, mais t'es déjà connecté $username !!") ?>
        <hr>
        <a href="index.php">retour</a>
    </main>
</body>
</html>