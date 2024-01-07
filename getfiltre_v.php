<?php
        require_once('connexion.php');


       $sql = "
SELECT
    'Région/Domaine' AS AttributeName, 'Region_domaine' AS r_Name, GROUP_CONCAT(DISTINCT Region_domaine) AS DistinctValues FROM vodun_days
UNION ALL
SELECT
    'Style de Vin' AS AttributeName, 'Style_de_Vin' AS r_Name, GROUP_CONCAT(DISTINCT Style_de_Vin) AS DistinctValues FROM vodun_days
UNION ALL
SELECT
    'Teneur en alcool' AS AttributeName, 'teneur_en_alcool' AS r_Name, GROUP_CONCAT(DISTINCT teneur_en_alcool) AS DistinctValues FROM vodun_days
UNION ALL



SELECT 'Cépages' AS AttributeName, 'designation' AS r_Name, GROUP_CONCAT(DISTINCT cepages_v.designation) AS DistinctValues
FROM cepages




UNION ALL
SELECT
    'Allergenes' AS AttributeName,'allergenes' AS r_Name, GROUP_CONCAT(DISTINCT allergenes) AS DistinctValues FROM vodun_days
UNION ALL



SELECT  'Aliments Compatibles' AS AttributeName,'designation' AS r_Name, GROUP_CONCAT(DISTINCT aliments_compatibles_v.designation) AS DistinctValues FROM aliments_compatibles



UNION ALL
SELECT
    'Prix /Unité' AS AttributeName,'prix_unite' AS r_Name, GROUP_CONCAT(DISTINCT prix_unite) AS DistinctValues FROM vodun_days
UNION ALL
SELECT
    'Côte' AS AttributeName,'cote' AS r_Name, GROUP_CONCAT(DISTINCT cote) AS DistinctValues FROM vodun_days
UNION ALL
SELECT
    'Classification' AS AttributeName, 'classification' AS r_Name, GROUP_CONCAT(DISTINCT classification) AS DistinctValues FROM vodun_days
UNION ALL
SELECT
    'Années' AS AttributeName, 'annees' AS r_Name, GROUP_CONCAT(DISTINCT annees) AS DistinctValues FROM vodun_days;";

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
