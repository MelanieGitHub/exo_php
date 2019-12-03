<?php

//mysqli_query($base, 'SELECT * FROM arme')
$rep_armes = $pdo->query(
	'SELECT personnage.Prenom AS Personnage, arme.Nom, arme.Rang, arme.Niveau_Max, arme.
	Propriete, arme.Cpt_Derivees, arme.Prix_Achat, arme.Prix_Vente, boutique.Libelle AS Boutique, 
	catalyste.Libelle AS Catalyste, arme.Attr_Min_Force, arme.Attr_Max_Force, 
	arme.Increment_Force, arme.Attr_Min_Magie, arme.Attr_Max_Magie, arme.Increment_Magie 
	
	FROM arme
	
	INNER JOIN personnage ON arme.Personnage = personnage.ID_Personnage
	INNER JOIN boutique ON arme.Boutique = boutique.ID_Boutique
	INNER JOIN catalyste ON arme.Catalyste = catalyste.ID_Catalyste ORDER BY Personnage'

);

// nbr ligne de la réponse : mysqli_num_rows
