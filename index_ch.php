<?php
        require_once('connexion.php');
    
        $sql = 'SELECT * FROM `champagne` LEFT JOIN images_champagne ON champagne.id = images_champagne.id_cognac AND images_champagne.main = 1;';
		

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
	$data = array();
            while ($row = $result->fetch_assoc()) {
           	 $data[] = $row;
            
            }
             $json_data = json_encode($data);

	    // Affichage du JSON
	   echo $json_data;
       // echo $sql;
        } else {
            echo $sql;
            echo json_encode([]);
        }

        $conn->close();
        ?>
