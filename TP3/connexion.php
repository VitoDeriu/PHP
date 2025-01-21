<?php

include("connected.php");

$cnx = new PDO("mysql:host=localhost;dbname=tp_php","VitoDeriu","askiponfaitdesbdd");


if(isset($_POST['name']) && !empty($_POST["name"])) {
        $name = htmlspecialchars($_POST["name"]); 
}

$rqt = 'SELECT * FROM users WHERE name_user = :nom ';
$stmt = $cnx->prepare($rqt);    
$stmt->execute(['nom' => $name]);
$res = $stmt->fetch(PDO::FETCH_ASSOC);
$res_pwd = $res['password'];
$res_username = $res['name_user'];
print_r($res_username);
print_r($res_pwd);

if(isset($_POST["password"]) && !empty($_POST["password"])) {
    $password = password_hash(htmlspecialchars($_POST["password"]), PASSWORD_DEFAULT);
    if (password_verify($password, $res_pwd)){
        header('location:pagetest.php');
    } else {
        header('location:login.php');
    }
    //faire le verify
    //renvoyer sur login si c'est la comparaison est fausse
    //renvoyer sur pagetest si la connexion est faite
}
$_SESSION['username'] = $res_username;


?>