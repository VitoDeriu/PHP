<?php
session_start();
session_destroy(); // Détruit la session (déconnexion)
header('Location: index.php'); // Redirige vers la page d'accueil
exit();
