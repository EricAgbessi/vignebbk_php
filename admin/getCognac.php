<?php
        require_once 'db.php';

        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
        header("Access-Control-Allow-Headers: Content-Type");


        $conn = connectDB();
        $sql = 'SELECT cognac.*,images_cognac.url,images_cognac.main FROM `cognac` LEFT JOIN images_cognac ON cognac.id = images_cognac.id_cognac AND images_cognac.main = 1;';
		

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
