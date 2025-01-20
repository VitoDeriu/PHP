<?php
include("connected.php");
if($connected) {
    header('location:index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>
</head>
<body>
    <?php echo("Hello $username"); ?>
    <a href="login.php">Se connecter</a>
</body>
</html>