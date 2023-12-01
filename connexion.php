<?php

// connexion à ma base de donnée
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'vignebb';

// créer une requête
$conn = mysqli_connect($host, $username, $password, $database);

// executer la requête créée
if (!$conn) {
    exit('La connexion à la base de données a échoué : '.mysqli_connect_error());
}
