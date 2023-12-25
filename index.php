<?php
        require_once('connexion.php');
    
        $sql = 'SELECT * FROM hh,images WHERE 1=1 AND images.id_vin=hh.id AND images.main=1';
        if (isset($_GET['cepages'])) {
                $sql = 'SELECT * FROM hh,cepages WHERE 1=1';
        }

        if (isset($_GET['aliments_compatibles'])) {
                $sql = 'SELECT * FROM hh,aliments_compatibles WHERE 1=1';
        }

        if (isset($_GET['aliments_compatibles']) && isset($_GET['cepages'])) {
                $sql = 'SELECT * FROM hh,aliments_compatibles,cepages WHERE 1=1';
        }

        if (isset($_GET['Region_domaine'])) {
            $Region_domaine = $_GET['Region_domaine'];
            $sql .= ' AND Region_domaine = "'.$Region_domaine.'"';
        }

        if (isset($_GET['Style_de_Vin'])) {
            $Style_de_Vin = $_GET['Style_de_Vin'];
            $sql .= ' AND Style_de_Vin = "'.$Style_de_Vin.'"';
        }

        if (isset($_GET['teneur_en_alcool'])) {
            $teneur_en_alcool = $_GET['teneur_en_alcool'];
            $sql .= ' AND teneur_en_alcool = "'.$teneur_en_alcool.'"';
        }

        if (isset($_GET['cepages'])) {
            $cepages = $_GET['cepages'];
            $sql .= ' AND cepages.designation="'.$cepages.'" and cepages.id_vin=hh.id ';
        }

         if (isset($_GET['aliments_compatibles'])) {
            $aliments_compatibles=$_GET['aliments_compatibles'];
            $sql .= ' AND aliments_compatibles.designation="'.$cepages.'" and aliments_compatibles.id_vin=hh.id ';
        }

        if (isset($_GET['allergenes'])) {
            $allergenes = $_GET['allergenes'];
            $sql .= ' AND allergenes = "'.$allergenes.'"';
        }

        if (isset($_GET['classification'])) {
            $classification = $_GET['classification'];
            $sql .= ' AND classification = "'.$classification.'"';
        }

        if (isset($_GET['annees'])) {
            $annees = $_GET['annees'];
            $sql .= ' AND annees = "'.$annees.'"';
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
    
        } else {
            echo $sql;
            echo json_encode([]);
        }

        $conn->close();
        ?>
