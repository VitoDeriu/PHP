<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;
use App\Model;

// On crée une instance de Dotenv en pointant vers le dossier où se trouve votre fichier .env
$dotenv = Dotenv::createImmutable(__DIR__ . '');
$dotenv->load();  // Charge les variables d'environnement dans $_ENV et $_SERVER



$model = new Model("user");
// var_dump($)
print_r($model->findAll());