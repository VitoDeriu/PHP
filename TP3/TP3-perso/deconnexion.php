<?php
    include("connected.php");
    $name = $username;
    session_unset();
    session_destroy();
    setcookie(session_name(), "", strtotime("-1 day"));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php echo "Reviens $name, j'ai les même à la maison !" ?>
    <a href="index.php">Encore !</a>
</body>
</html>