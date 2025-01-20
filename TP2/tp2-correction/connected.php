<?php

if(session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

$connected = isset($_SESSION["username"]) && !empty($_SESSION["username"]);
$username = $connected ? $_SESSION["username"] : "inconnu";