<?php





require_once 'db.php';



$connexion = connectDB();


// Vérifier la connexion
if ($connexion->connect_error) {
    die("Erreur de connexion à la base de données : " . $connexion->connect_error);
}

// Formulaire de connexion
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $motDePasse = $_POST['password'];

    // Exemple de requête pour récupérer le hachage du mot de passe
    $requete = "SELECT 	password_hash FROM user WHERE email='$email'";
    $resultat = $connexion->query($requete);


   // Vérifier si l'utilisateur existe dans la base de données
    if ($resultat->num_rows > 0) {
        $row = $resultat->fetch_assoc();
        $motDePasseHache = $row['password_hash'];
        // Vérifier le mot de passe avec password_verify
        if (password_verify($motDePasse, $motDePasseHache)) {
            $token = bin2hex(random_bytes(32)); // Génère un token de 64 caractères hexadécimaux
            $requete = "UPDATE user SET token = '$token' WHERE email = '$email' ";
            // Exécution de la requête
            if ($connexion->query($requete) === TRUE) {
                echo json_encode( "{\"token\":\"$token\", \"status\":true}");

            }
        } else {
            echo '{status:"Nom utilisateur ou mot de passe incorrect"}';
        }
    } else {
        echo '{status:"Nom utilisateur ou mot de passe incorrect"}';    }
    }

// Fermer la connexion
$connexion->close();
?>
