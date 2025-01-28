<?php
include_once('connected.php');



    //1. On se connecte à la base de données
    include_once('cnx_bdd.php');
    $connexion = new PDO($db_dsn, $db_user, $db_password);

    try {

        // 2. On prépare la requête d'insertion (utilisation de requête préparée paramétrique)
        $sql = <<<SQL
        SELECT email, avatar
        FROM user LEFT JOIN profile on profile.id = user.id 
        SQL; 
    
        $statement = $connexion->prepare($sql);
        $statement->execute(); 
        $resultats = $statement->fetchAll(PDO::FETCH_ASSOC);
    } catch(\Exception $e) {
        echo($e->getMessage());
        die(1);
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Porte faulieaux</title>
</head>
<body>
    <!-- TODO : Gérer le header dynamiquement en fonction de l'état de la connexion de l'utilisateur -->
    <?php 
        if($connected) {
            include('html/header-connected.html'); 
        } else {
            include('html/header-not-connected.html');
        }
    ?>

    <main>
        <h1>Porte faulieaux</h1>
        <table>
            <thead>
                <tr>
                <?php
                // on récupère les entêtes de colonnes en parcourant les clés du premier résultat
                if(count($resultats) > 0) {
                    $colonnes = array_keys($resultats[0]);
                    foreach($colonnes as $col) {
                        echo("<th>$col</th>");
                    }
                }
                ?>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($resultats as $user) {
                        echo("<tr>");
                        foreach($user as $key => $val) {
                            if($key != "avatar") {
                                echo("<td>$val</td>");
                            } else {
                                // ça, ça ne devrait pas être nécessaire !!!! (d'ailleurs, finalement on ne s'en sert plus)
                                $serverUrl = 'http' . ($_SERVER["HTTPS"] ? 's' :'') . '://'  . $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"]; 
                                echo("<td><img src='$val'></td>");
                            }
                        }
                        echo("</tr>");
                    }
                ?>
            </tbody>
        </table>
    </main>
    
    <!-- TODO : afficher les profils de tous les utilisateurs -->
</body>

</html>