<?php
include('connected.php');

if($connected) {
    header("Location:index.php");
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
$confirmPass = $_POST["confirm_password"];
$isPasswordConfirmed = $password === $confirmPass; 

if(!$isPasswordConfirmed) {
    $_SESSION["errors"]["confirm_password"] ="Les mots de passes doivent être identiquement saisis";
}
// Valider les données du formulaire
if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION["errors"]["email"] = "le format de l'adresse email n'est pas valide";
}

if(isset($_SESSION["errors"]) && count($_SESSION["errors"]) > 0) {
    header('Location:register-form.php', 400);
}

// Nettoyer l'email 
$email = filter_var($email, FILTER_SANITIZE_EMAIL);

// Insérer dans la base 

try {

    //1. On se connecte à la base de données
    include_once('cnx_bdd.php');
    $connexion = new PDO($db_dsn, $db_user, $db_password);

    // 2. On prépare la requête d'insertion (utilisation de requête préparée paramétrique)
    $sql = <<<SQL
    INSERT INTO user(email, password) VALUES (:email, :password);
    SQL; 

    $statement = $connexion->prepare($sql);

    // indique les valeurs des paramètres de notre requête préparée
    $statement->bindParam(":email", $email, PDO::PARAM_STR);
    //2.1 hashage du mot de passe a
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $statement->bindParam(':password', $hashedPassword, PDO::PARAM_STR);

    // ON execute la requête 
    $statement->execute();

} catch(Exception $e ) {
    $_SESSION["errors"]["BDD"] = $e->getMessage();
    echo($e->getMessage());
    header('Location:register-form.php', 400);
}

// Si tout se passe bien, connecter l'utilisateur
$_SESSION["email"] = $email; 

header('Location:index.php', 200);
