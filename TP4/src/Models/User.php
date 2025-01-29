<?php

namespace App\Models;

class User
{
    private $name;
    private $email;

    public function __construct($name, $email)
    {
        $this->name = $name;
        $this->email = $email;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function createUser()
    {

    }

}


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