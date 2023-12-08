<?php
        require_once('connexion.php');
 if(isset($_GET['id'])) {
	$id=$_GET["id"];
       $sql = "SELECT * FROM aliments_compatibles where id_vin=$id";

       $result = $conn->query($sql);

        if ($result->num_rows > 0) {
	$data = array();
            while ($row = $result->fetch_assoc()) {
           	 $data[] = $row;
            
            }
             $json_data = json_encode($data);

	    // Affichage du JSON
	    echo $json_data;
    
        } else {
            echo "Aucun client trouvé.";
        }
    }

        $conn->close();
        
        
        ?>
