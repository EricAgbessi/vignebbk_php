<?php
        require_once('connexion.php');


       $sql = "SELECT
    'Eléments' AS AttributeName, GROUP_CONCAT(DISTINCT elements) AS DistinctValues FROM hh
UNION ALL
SELECT
    'Région/Domaine' AS AttributeName, GROUP_CONCAT(DISTINCT Region_domaine) AS DistinctValues FROM hh
UNION ALL
SELECT
    'Style de Vin' AS AttributeName, GROUP_CONCAT(DISTINCT Style_de_Vin) AS DistinctValues FROM hh
UNION ALL
SELECT
    'Teneur en alcool' AS AttributeName, GROUP_CONCAT(DISTINCT teneur_en_alcool) AS DistinctValues FROM hh
UNION ALL
SELECT
    'CEPAGES' AS AttributeName, GROUP_CONCAT(DISTINCT cepages) AS DistinctValues FROM hh
UNION ALL
SELECT
    'Allergenes' AS AttributeName, GROUP_CONCAT(DISTINCT allergenes) AS DistinctValues FROM hh
UNION ALL
SELECT
    'Aliments compatibles' AS AttributeName, GROUP_CONCAT(DISTINCT aliments_compatibles) AS DistinctValues FROM hh
UNION ALL
SELECT
    'Prix /Unité' AS AttributeName, GROUP_CONCAT(DISTINCT prix_unite) AS DistinctValues FROM hh
UNION ALL
SELECT
    'Côte' AS AttributeName, GROUP_CONCAT(DISTINCT cote) AS DistinctValues FROM hh
UNION ALL
SELECT
    'Classification' AS AttributeName, GROUP_CONCAT(DISTINCT classification) AS DistinctValues FROM hh
UNION ALL
SELECT
    'Années' AS AttributeName, GROUP_CONCAT(DISTINCT annees) AS DistinctValues FROM hh;";

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
