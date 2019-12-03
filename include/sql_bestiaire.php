<?php

$rep_bestiaire = $pdo->query(
	'SELECT bestiaire.Nom, type_bestiaire.Libelle AS Type, habitat.Libelle AS Habitat, zone_habitat.Libelle AS Zone_Habitat,
		PV, Magie, Force_, PC, S_Choc, Res_Combos, Courant.Libelle AS Butin_Courant, BC_Stat, Rare.Libelle AS Butin_Rare, BR_Stat,
		Feu.Abbreviation AS Degat_Feu, Glace.Abbreviation AS Degat_Glace, Foudre.Abbreviation AS Degat_Foudre,
		Eau.Abbreviation AS Degat_Eau, Air.Abbreviation AS Degat_Air, Terre.Abbreviation AS Degat_Terre,
		Physiques.Abbreviation AS Degat_Physiques, Magiques.Abbreviation AS Degat_Magiques, bestiaire.ET_Fragilite, bestiaire.ET_Defaillance,
		bestiaire.ET_Vulnerabilite, bestiaire.ET_Poison, bestiaire.ET_Lenteur, bestiaire.ET_Supplice, bestiaire.ET_Oubli,
		bestiaire.ET_Malediction, bestiaire.ET_Stase, bestiaire.ET_Provocation, bestiaire.ET_Mort, bestiaire.ET_Dissipation,
		bestiaire.Notes, bestiaire.Image
	FROM bestiaire
		INNER JOIN type_bestiaire ON bestiaire.Type = type_bestiaire.ID_Type_B
		INNER JOIN habitat ON bestiaire.Habitat = habitat.ID_Habitat
		INNER JOIN zone_habitat ON bestiaire.Zone_Habitat = zone_habitat.ID_Zone_Habitat
		INNER JOIN recompense AS Courant ON bestiaire.Butin_Courant = Courant.ID_Recompense
		INNER JOIN recompense AS Rare ON bestiaire.Butin_Rare = Rare.ID_Recompense
		INNER JOIN degat AS Feu ON bestiaire.DG_Feu = Feu.ID_Degat
		INNER JOIN degat AS Glace ON bestiaire.DG_Glace = Glace.ID_Degat
		INNER JOIN degat AS Foudre ON bestiaire.DG_Foudre = Foudre.ID_Degat
		INNER JOIN degat AS Eau ON bestiaire.DG_Eau = Eau.ID_Degat
		INNER JOIN degat AS Air ON bestiaire.DG_Air = Air.ID_Degat
		INNER JOIN degat AS Terre ON bestiaire.DG_Terre = Terre.ID_Degat
		INNER JOIN degat AS Physiques ON bestiaire.DG_Physiques = Physiques.ID_Degat
		INNER JOIN degat AS Magiques ON bestiaire.DG_Magiques = Magiques.ID_Degat'
);
