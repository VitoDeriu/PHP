<?php


include('connected.php');

if($connected) {
    // TODO : inform user that he/she is allready connected
    // header("Location:index.php");
}


// Récupération des données du formulaires 
$hasEmail = isset($_POST["email"]) && !empty($_POST["email"]); 
$hasPassword = isset($_POST["password"]) && !empty($_POST["password"]);  
if(!$hasEmail) {
    $_SESSION["errors"]["email"] ="Il faut saisir une adresse email";
} else {
    $email = $_POST["email"];
}

if(!$hasPassword) {
    $_SESSION["errors"]["password"] ="Il faut saisir un password";
} else {
    $password = $_POST["password"];
}

// Valider les données du formulaire
if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION["errors"]["email"] = "le format de l'adresse email n'est pas valide";
}

if(isset($_SESSION["errors"]) && count($_SESSION["errors"]) > 0) {
    header('Location:login-form.php', 400);
    die();
}

// Nettoyer l'email 
$email = filter_var($email, FILTER_SANITIZE_EMAIL);


try {

    //1. On se connecte à la base de données
    include_once('cnx_bdd.php');
    $connexion = new PDO($db_dsn, $db_user, $db_password);

    // 2. On prépare la requête d'insertion (utilisation de requête préparée paramétrique)
    $sql = <<<SQL
    SELECT email, password
    FROM user
    WHERE email=:email;
    SQL; 

    $statement = $connexion->prepare($sql);

    // indique les valeurs des paramètres de notre requête préparée
    $statement->bindParam(":email", $email, PDO::PARAM_STR);

    // ON execute la requête 
    $statement->execute();

    // ON récupère l'utilisateur
    $user = $statement->fetch(PDO::FETCH_ASSOC);
    
    if(!isset($user) || empty($user)) {
        $_SESSION["errors"]["identification"] ="Données d'identification incorrectes. user: " . $email;
        header('Location:login-form.php', 400);
        die();
    }

    // ON l'utilisateur, on vérifie son mot de passe
    if(!password_verify($password, $user['password'])){
        $_SESSION["errors"]["identification"] ="Données d'identification incorrectes. password" . $password;
        header('Location:login-form.php', 400);
        exit;
    }

} catch( \Exception $e ) {
    $_SESSION["errors"]["BDD"] = $e->getMessage();
    echo($e->getMessage());
    header('Location:login-form.php', 400);
    die();
}

// Si tout se passe bien, connecter l'utilisateur
$_SESSION["email"] = $email;
$destination = "index.php" ;
if(isset($_SESSION["destination"]) && !empty($_SESSION["destination"])) {
    $destination = $_SESSION["destination"];
    unset( $_SESSION["destination"]);
}
header("Location:$destination");