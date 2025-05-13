<?php
require_once __DIR__ . '/vendor/autoload.php';

use App\Controllers\UserController;

$userController = new UserController();
$newUser = $userController->createUser('Alice', 'alice@example.com');

echo "Utilisateur créé : " . $newUser->getName() . " (" . $newUser->getEmail() . ")";

?>