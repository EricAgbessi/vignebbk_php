<?php
        require_once('connexion.php');
    
        $sql = 'SELECT vodun_days.*, images.*, vodun_days.id AS id_important
		FROM vodun_days
		LEFT JOIN images ON images.id_vin = vodun_days.id AND images.main = 1
		';
        if (isset($_GET['cepages'])) {
                $sql = 'SELECT * FROM vodun_days,cepages_v WHERE 1=1';
        }

        if (isset($_GET['aliments_compatibles'])) {
                $sql = 'SELECT * FROM vodun_days,aliments_compatibles_v WHERE 1=1';
        }

        if (isset($_GET['aliments_compatibles']) && isset($_GET['cepages'])) {
                $sql = 'SELECT * FROM vodun_days,aliments_compatibles_v,cepages_v WHERE 1=1';
        }

        if (isset($_GET['Region_domaine'])) {
            $Region_domaine = $_GET['Region_domaine'];
            $sql .= 'WHERE Region_domaine = "'.$Region_domaine.'"';
        }

        if (isset($_GET['Style_de_Vin'])) {
            $Style_de_Vin = $_GET['Style_de_Vin'];
            $sql .= ' WHERE Style_de_Vin = "'.$Style_de_Vin.'"';
        }

        if (isset($_GET['teneur_en_alcool'])) {
            $teneur_en_alcool = $_GET['teneur_en_alcool'];
            $sql .= ' WHERE teneur_en_alcool = "'.$teneur_en_alcool.'"';
        }

        if (isset($_GET['cepages'])) {
            $cepages = $_GET['cepages'];
            $sql .= ' WHERE cepages.designation="'.$cepages.'" and cepages.id_vin=vodun_days.id ';
        }

         if (isset($_GET['aliments_compatibles'])) {
            $aliments_compatibles=$_GET['aliments_compatibles'];
            $sql .= ' WHERE aliments_compatibles_v.designation="'.$cepages.'" and aliments_compatibles_v.id_vin=vodun_days.id ';
        }

        if (isset($_GET['allergenes'])) {
            $allergenes = $_GET['allergenes'];
            $sql .= ' WHERE allergenes = "'.$allergenes.'"';
        }

        if (isset($_GET['classification'])) {
            $classification = $_GET['classification'];
            $sql .= ' WHERE classification = "'.$classification.'"';
        }

        if (isset($_GET['annees'])) {
            $annees = $_GET['annees'];
            $sql .= ' WHERE annees = "'.$annees.'"';
        }


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
