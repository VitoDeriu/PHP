<?php
include("connected.php");
if(!$connected) {
    header('location:index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
</head>
<body>
        <?php echo("Hello $username"); ?>
        <a href="page2.php">Suivant</a>
        <hr>
        <a href="bye.php">Se décoooooooooooo</a>
</body>
</html>