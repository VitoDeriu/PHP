<?php



include('connected.php');

if(!$connected) {
    $_SESSION["destination"] = "profile-form.php";
    header("Location:login-form.php", 401);
    die(1);
}


// Récupération des données du formulaires 
$hasAvatar = isset($_FILES["avatar"]) && !empty($_FILES["avatar"]); 
$hasInterest = isset($_POST["interest"]) && !empty($_POST["interest"]) && $_POST["interest"] != -1;  

// Valider les données du formulaire

// Nettoyer les données

// Insérer dans la base 

try {

    //1. On se connecte à la base de données
    include_once('cnx_bdd.php');
    $connexion = new PDO($db_dsn, $db_user, $db_password);


    // Gestion de l'image (avatar) si présente
    if($hasAvatar) {
        // Traitement de l'image envoyée
        $temporaryPath = $_FILES["avatar"]["tmp_name"];
        $originalName = $_FILES["avatar"]["name"];
        $fileParts = explode(".", $originalName);
        $extension = $fileParts[count($fileParts) - 1];
        $fileName = $fileParts[0];
        $imgName = /*urlencode($_SESSION["email"]) . "-" . */$fileName . "-" . date("Y-m-d-H-i-s") . "." . $extension;
        $destinationPath = "avatars/" . $imgName;

        // On déplace le fichier temporaire pour le garder sur le serveur
        if(move_uploaded_file($temporaryPath, $destinationPath)) {

            // 2. On prépare la requête d'insertion (utilisation de requête préparée paramétrique)
            $sql = <<<SQL
            REPLACE INTO profile(avatar, id) 
            VALUES (:cheminFichierAvatar, (SELECT id FROM user where email=:email LIMIT 1));
            SQL; 
    
            $statement = $connexion->prepare($sql);
            $statement->bindParam(':email', $_SESSION["email"]);
            $statement->bindParam(':cheminFichierAvatar', $destinationPath);
    
            $statement->execute();
        }

    }
    if($hasInterest) {
        // echo "hlello there";
        
        $id = $_POST["interest"];
        $id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
        $sql = <<<SQL
        INSERT INTO interest_user(interest_id, user_id) 
        VALUES (:interestId, (SELECT id FROM user where email=:email LIMIT 1));
        SQL; 

        $statement = $connexion->prepare($sql);
        $statement->bindParam(':email', $_SESSION["email"]);
        $statement->bindParam(':interestId', $id, PDO::PARAM_INT);

        $statement->execute();
    }
    exit;

    // ON execute la requête 

} catch(Exception $e ) {
    $_SESSION["errors"]["BDD"] = $e->getMessage();
    echo($e->getMessage());
    header('Location:profile-form.php', 400);
}
echo"on devrait aller ailleurs";
header('Location:profile-form.php');
exit();
