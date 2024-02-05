<?php

$host = 'localhost';
$dbname = 'library';
$user = 'root';
$password = '';

try {
    $connexion = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}


