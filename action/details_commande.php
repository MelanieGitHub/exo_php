<?php
session_start();

// connexion à la base de données
include('../include/connexion_bdd.php');

$id = mysqli_real_escape_string($db, htmlspecialchars($_GET['id']));

$requete_select_commande = "SELECT plat.Libelle, commande.ID_Commande AS Numero_Commande, plat_commande.Quantite, 
plat.Prix AS Prix_Unitaire, ROUND(plat.Prix * plat_commande.Quantite, 2) AS Total 
FROM plat_commande 
INNER JOIN plat ON plat.ID = plat_commande.Cle_plat 
INNER JOIN commande ON commande.ID_Commande = plat_commande.Cle_Commande 
WHERE plat_commande.Cle_Commande = '" . $id . "' GROUP BY plat.ID";


$stmt = $db->prepare($requete_select_commande);

/* Exécution de la requête */
$stmt->execute();

/* Association des variables de résultat */
$stmt->bind_result($nom, $comm, $quantite, $prix, $total);
$resulat = [];
/* Lecture des valeurs */
while ($stmt->fetch()) {
    array_push($resulat, $nom, $comm, $quantite, $prix, $total);
}

$return = json_encode($resulat);
echo $return;


// // $exec_requete_select = mysqli_query($db, $requete_select_commande);
// $exec_requete_select = $db->query($requete_select_commande);
// // $exec_requete_select -> free_result();
// // $exec_requete_select -> num_rows;
// $select = mysqli_fetch_assoc($exec_requete_select);

