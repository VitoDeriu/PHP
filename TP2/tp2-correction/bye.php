<?php
include_once("connected.php");


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
    <title>Bye</title>
</head>
<body>
    <main>

<?php echo "Reviens $name, j'ai les même à la maison !" ?>
<hr>
<a href="index.php">Play again</a>
    </main>
</body>
</html>