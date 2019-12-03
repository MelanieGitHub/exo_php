<?php

//mysqli_query($base, 'SELECT * FROM accessoire')
$rep_accessoire = $pdo->query(
	'SELECT accessoire.Nom,
	
	accessoire.Rang, accessoire.Niveau_Max, accessoire.Attr_Min, accessoire.Attr_Max, accessoire.Increment,
	accessoire.Propriete, accessoire.Cpt_Derivees, accessoire.Prix_Achat, accessoire.Prix_Vente,
	boutique.Libelle AS Boutique, catalyste.Libelle AS Catalyste
	FROM accessoire
	
	
	INNER JOIN boutique ON accessoire.Boutique = boutique.ID_Boutique
	INNER JOIN catalyste ON accessoire.Catalyste = catalyste.ID_Catalyste ORDER BY ID_Accessoire'

);

// nbr ligne de la réponse : mysqli_num_rows
