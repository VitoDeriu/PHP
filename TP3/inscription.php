<?php

include("connected.php");

$cnx = new PDO("mysql:host=localhost;dbname=tp_php","VitoDeriu","askiponfaitdesbdd");


if(isset($_POST['name']) && !empty($_POST["name"])){
    $name = htmlspecialchars($_POST["name"]);
    $_SESSION["username"] = $name;
}

if(isset($_POST["password"]) && !empty($_POST["password"])) {
    $password = password_hash(htmlspecialchars($_POST["password"]), PASSWORD_DEFAULT);
}

$rqt = 'INSERT INTO users (name_user, password) VALUES (:nom, :mdp)';
$stmt = $cnx->prepare($rqt);
$stmt->execute([
    ':nom' => $name,
    ':mdp' => $password
]);

header('location:login.php');