<?php

include_once('connected.php'); 
if(!$connected) {
    header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page 2</title>
</head>
<body>
    <main>
        <?php echo("Encore là $username ?"); ?>
        <a href="index.php">Retour</a> 
    </main>
</body>
</html>