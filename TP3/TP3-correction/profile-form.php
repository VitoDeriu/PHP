<?php 


include('connected.php');
if(!$connected) {
    // on garde en "mémoire" la page à laquelle essayé d'accéder l'utilisateur
    $_SESSION["destination"] = $_SERVER['PHP_SELF'];
    header('Location:login-form.php', 401);
} 

// Récupération des centres d'intérêts stockés en BDD

try {

    //1. On se connecte à la base de données
    include_once('cnx_bdd.php');
    $connexion = new PDO($db_dsn, $db_user, $db_password);

    // 2. On prépare la requête d'insertion (utilisation de requête préparée paramétrique)
    $sql = <<<SQL
    SELECT id, name FROM interest;
    SQL; 

    $statement = $connexion->prepare($sql);
    $statement->execute(); 
    $interests = $statement->fetchAll(PDO::FETCH_ASSOC);

} catch(\Exception $e) {
    echo($e->getMessage());
    exit(1);
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon profile</title>
</head>
<body>
    <main>
        <!-- TODO: afficher la liste des centres d'interêts -->

        <form action="profile.php" method="post" enctype="multipart/form-data">
            <label for="avatar">Ajouter/modifier mon avatar</label>
            <input type="file" name="avatar" id="avatar">
            <fieldset>
                <label for="interest"> Ajouter un centre d'intérêt</label>
                <select name="interest" id="interest">
                    <!-- TODO : gérer les centres d'interêts -->
                    <option value="-1">--Choisissez</option> 

                    <?php
                        foreach($interests as $interest) {
                            $id = $interest["id"];
                            $name = $interest["name"];
                            $option=<<<html
                            <option value="$id">$name</option> 
                            html;
                            echo($option);
                        }
                    ?>
                </select>
            </fieldset>
            <button type="submit">Envoyer</button>
        </form>

    </main>

</body>
</html>