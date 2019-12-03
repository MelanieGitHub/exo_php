<?php
$rep_materiaux = $pdo->query(
	'SELECT materiaux.Nom,
	type_materiaux.Libelle AS Type,
	materiaux.Experience, materiaux.Multiplicateur, materiaux.Rang, materiaux.Acquisition,
	materiaux.Prix_Achat, materiaux.Prix_Vente
	FROM materiaux
	INNER JOIN type_materiaux ON materiaux.Type = type_materiaux.ID_Type_M'
);
