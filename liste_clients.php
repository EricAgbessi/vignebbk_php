
        <?php
        require_once('connexion.php');

       $sql = "SELECT * FROM hh";

	 $data = array();
        $result = $conn->query($sql);
          while ($row = $result->fetch_assoc()) {
		$data[] = $row;
	    }
	     // Encodage du tableau en format JSON
	    $json_data = json_encode($data);

	    // Affichage du JSON
	    echo $json_data;


        if ($result->num_rows > 0) {
       
           /* echo '<table class="table">';
            echo '<thead><tr><th>ID</th><th>Nom</th><th>Prénom</th><th>Email</th><th>Actions</th></tr></thead>';
            echo '<tbody>';
            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $row["idClient"] . '</td>';
                echo '<td>' . $row["nom"] . '</td>';
                echo '<td>' . $row["prenom"] . '</td>';
                echo '<td>' . $row["email"] . '</td>';
                echo '<td><a href="modifier_client.php?id=' . $row["idClient"] . '" class="btn btn-primary btn-sm">Modifier</a> ';
                echo '<a href="supprimer_client.php?id=' . $row["idClient"] . '" class="btn btn-danger btn-sm" onclick="return confirm(\'Êtes-vous sûr de vouloir supprimer ce client ?\')">Supprimer</a></td>';
                echo '</tr>';
            }
            echo '</tbody>';
            echo '</table>';*/
        } else {
            echo "Aucun client trouvé.";
        }

        $conn->close();
        ?>

