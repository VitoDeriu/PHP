<?php

if(session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

//vérifie si l'utilisateur est connecté et si son username est bien renseigné et pas vide.
$connected = isset($_SESSION["username"]) && !empty($_SESSION["username"]);
$username = $connected ? $_SESSION["username"] : "inconnu";