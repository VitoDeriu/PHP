<?php 
include_once('connected.php');
// if($connected === true) {
//     header('location:index.php');
// }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>S'enregistrer</title>
</head>
<body>
    <main>
        <p>Bienvenu sur ce site de folie !!!</p>
        <?php 
        
        if(isset($_SESSION["errors"]) && count($_SESSION["errors"])>0) {
            print_r($_SESSION["errors"]);
            unset($_SESSION["errors"]);
        }
        ?>
        <form method="post" action="register.php">
            
            <label for="email"></label><input type="email" name="email" id="email" required>
            <label for="password"></label><input type="password" id="password" name="password" required>
            <label for="confirm_password"></label><input type="password" id="confirm_password" name="confirm_password" required>
            <button type="submit">Go!!!!!!!!!!!!!</button>
        </form>
    </main>
</body>
</html>