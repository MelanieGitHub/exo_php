<?php 

$value = $_POST['select_ingredient'];

$requete_ing = "SELECT plat.Libelle AS Plat, type.Libelle AS Type, origine.Libelle AS Origine, plat.Prix AS Prix, plat.Poids AS Poids, plat.Image AS Image, 
GROUP_CONCAT(ingredient.Libelle SEPARATOR ', ') AS Ingredient2, plat.ID AS ID_plat FROM ingredient_plat INNER JOIN plat ON plat.ID = ingredient_plat.Cle_Plat 
INNER JOIN ingredient ON ingredient.ID_Ingredient = ingredient_plat.Cle_Ingredient INNER JOIN type ON plat.Type = type.ID_Type 
INNER JOIN origine ON plat.Origine = origine.ID_Origine 
GROUP BY plat.ID HAVING GROUP_CONCAT(ingredient.Libelle SEPARATOR ', ') LIKE '%" . $value . "%'";