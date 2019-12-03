<?php

function compter_visite()
{
	$monfichier = fopen('fichiers/compteur.txt', 'r+');

	$pages_vues = fgets($monfichier);
	$pages_vues += 1;
	fseek($monfichier, 0);
	fputs($monfichier, $pages_vues);

	fclose($monfichier);

	global $pdo;

	$query = $pdo->prepare("UPDATE `stats_visites` SET Nbr_Visites = $pages_vues WHERE ID = 1");
	$query->execute(array(':Nbr_Visites' => $pages_vues));
}
