<?php

if(session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

$connected = isset($_SESSION["email"]) && !empty($_SESSION["email"]);
