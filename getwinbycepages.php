<?php
        require_once('connexion.php');

       $sql = "SELECT * FROM `hh`,cepages,images WHERE hh.id=cepages.id_vin AND images.id_vin=hh.id;";

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
    

        $conn->close();
        
        
        ?>
