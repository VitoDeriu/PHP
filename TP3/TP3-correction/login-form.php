<?php 

include('connected.php');


?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page de connexion²</title>
</head>
<body>
    <!-- TODO : informer l'utilisateur s'il est déjà connecté -->
     <form action="login.php" method="post">
        <label for="email">email</label>
        <input type="email" name="email" id="email" required>
        <label for="password">password</label>
        <input type="password" name="password" id="password" required>
        <button type="submit">Se connecter</button>
     </form>
     <pre class="error">
        <?php
            if(isset($_SESSION["errors"]) && !empty($_SESSION["errors"])) {
                print_r($_SESSION["errors"]);
                unset($_SESSION["errors"]);
            } 
        ?>
     </pre>
</body>
</html>