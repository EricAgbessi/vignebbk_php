<?php
        //require_once('pdo_db.php');
        $serveur = "localhost" ;
    $utilisateur = "root";
    $motDePasse ="";
    $nomBaseDeDonnees = "vignebb";
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
        header("Access-Control-Allow-Headers: Content-Type");

    try {
           // Connexion à la base de données avec PDO
    $connexion = new PDO("mysql:host=$serveur;dbname=$nomBaseDeDonnees", $utilisateur, $motDePasse);
    // Configurer PDO pour rapporter les erreurs
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Requête SQL pour l'insertion
    $requete = "INSERT INTO cognac (Nom, Categorie, AgeduCognac,Taillebouteille, Teneurenalcool, Marque, PrixdeVente)
                VALUES (:Nom, :Categorie,:AgeduCognac, :Taillebouteille, :Teneurenalcool, :Marque, :PrixdeVente)";

    // Préparation de la requête
    $statement = $connexion->prepare($requete);
    $statement->bindParam(':Nom',$_POST["Nom"]);
    $statement->bindParam(':Categorie',$_POST["Categorie"]);
    $statement->bindParam(':AgeduCognac',$_POST["AgeduCognac"]);
    $statement->bindParam(':Taillebouteille',$_POST["Taillebouteille"]);
    $statement->bindParam(':Teneurenalcool',$_POST["Teneurenalcool"]);
    $statement->bindParam(':Marque',$_POST["Marque"]);
    $statement->bindParam(':PrixdeVente',$_POST["PrixdeVente"]);
    // Exécution de la requête avec les données
    $statement->execute();
    
    // Récupération de l'id de l'enregistrement inséré
    $idEnregistrement = $connexion->lastInsertId();

    echo "Enregistrement réussi avec l'id : $idEnregistrement";
    } catch (PDOException $e) {
        echo $e;
    }

     


// Fermer la connexion à la base de données











// Vérifier si le formulaire a été soumis
/*if ($_SERVER["REQUEST_METHOD"] == "POST") {

    

    // Répertoire de destination pour les images
   $repertoireDestination = "uploads/";

    // Vérifier si le répertoire de destination existe, sinon le créer
    if (!file_exists($repertoireDestination)) {
        mkdir($repertoireDestination, 0777, true);
    }
    var_dump($_FILES['images']);

    // Récupérer les informations sur les fichiers uploadés
    //$nombreFichiers = count($_FILES['images']['name']);

    // Parcourir chaque fichier uploadé
 /*   for ($i = 0; $i < $nombreFichiers; $i++) {
        // Récupérer le nom et le chemin temporaire du fichier
        $nomFichier = $_FILES['images']['name'][$i];
        $cheminTemporaire = $_FILES['images']['tmp_name'][$i];

        // Construire le chemin de destination
        $cheminDestination = $repertoireDestination . $nomFichier;

        // Déplacer le fichier du répertoire temporaire vers le répertoire de destination
        move_uploaded_file($cheminTemporaire, $cheminDestination);

        echo "L'image $nomFichier a été téléchargée avec succès.<br>";
    }
}*/
?>