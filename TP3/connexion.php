<?php

include("connected.php");

if(isset($_POST['name']) && !empty($_POST["name"])) {
        $name = htmlspecialchars($_POST["name"]);
        $_SESSION["username"] = $name;
        header('location:connected.php');
}

if(isset($_POST["password"]) && !empty($_POST["password"])) {
    //faire le verify
    //renvoyer sur login si c'est la comparaison est fausse
    //renvoyer sur page 2 si la connexion est faite
}


?>