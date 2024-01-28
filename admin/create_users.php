<?php
require_once 'db.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");


$connexion = connectDB();

// Vérifier la connexion
if ($connexion->connect_error) {
    die("Erreur de connexion à la base de données : " . $connexion->connect_error);
}

// Formulaire de création d'utilisateur
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nomUtilisateur = $_POST['username'];
    $email= $_POST['email'];
    $motDePasse = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hachage du mot de passe

    // Exemple de requête d'insertion
    $requete = "INSERT INTO user (username, password_hash,email) VALUES ('$nomUtilisateur', '$motDePasse','$email')";
      echo $requete;
    // Exécution de la requête
    if ($connexion->query($requete) === TRUE) {
        echo "Utilisateur créé avec succès.";
    } else {
        echo "Erreur lors de la création de l'utilisateur : " . $connexion->error;
    }
  
}

// Fermer la connexion
$connexion->close();
?>