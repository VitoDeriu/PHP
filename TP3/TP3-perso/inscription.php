<?php

include_once("connected.php");
include_once("connect_bdd.php");

//recup les données du form

if(isset($_POST['name']) && !empty($_POST["name"])){
    $name = htmlspecialchars($_POST["name"]);
}

if(isset($_POST["password"]) && !empty($_POST["password"])) {
    $password = password_hash(htmlspecialchars($_POST["password"]), PASSWORD_DEFAULT);
}

//valider les données cad checker si elles sont bien du bon format

//insertion dans la bdd

$rqt = 'INSERT INTO users (name_user, password) VALUES (:nom, :mdp)';
$stmt = $cnx->prepare($rqt);
$stmt->execute([
    ':nom' => $name,
    ':mdp' => $password
]);

//si tout est bon on connecte user


header('location:login.php');