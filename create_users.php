// Connexion à la base de données (à adapter selon votre configuration)
$mysqli = new mysqli("localhost", "nom_utilisateur", "mot_de_passe", "nom_base_de_donnees");

// Vérification de la connexion
if ($mysqli->connect_error) {
    die("Erreur de connexion à la base de données : " . $mysqli->connect_error);
}

// Exemple d'inscription d'un utilisateur (ajustez selon vos besoins)
$username = "utilisateur1";
$email = "utilisateur1@example.com";
$password = password_hash("mot_de_passe_secret", PASSWORD_BCRYPT);

$stmt = $mysqli->prepare("INSERT INTO user (username, email, password_hash) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $username, $email, $password);

if ($stmt->execute()) {
    echo "Utilisateur enregistré avec succès.";
} else {
    echo "Erreur lors de l'inscription de l'utilisateur : " . $stmt->error;
}

$stmt->close();
$mysqli->close();
