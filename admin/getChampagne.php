<?php
        require_once 'db.php';

        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
        header("Access-Control-Allow-Headers: Content-Type");


        $conn = connectDB();
        $sql = 'SELECT champagne.*,images_champagne.url FROM `champagne` LEFT JOIN images_champagne ON champagne.id = images_champagne.id_champagne AND images_champagne.main = 1;';
		

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
