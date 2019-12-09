<?php
session_start();

// connexion à la base de données
include('../bdd_sql/connexion_bdd.php');

$id = mysqli_real_escape_string($db, htmlspecialchars($_GET['id']));

$requete_select_plat = "SELECT * FROM plat
WHERE plat.ID = '" .$id. "'";


$stmt = $db->prepare($requete_select_plat);

/* Exécution de la requête */
$stmt->execute();

/* Association des variables de résultat */
$stmt->bind_result($prix_comm, $date, $nom, $comm, $quantite, $prix, $total);
$resulat = [];
/* Lecture des valeurs */
while ($stmt->fetch()) {
    array_push($resulat, $prix_comm, $date, $nom, $comm, $quantite, $prix, $total);
}

$return = json_encode($resulat);
echo $return;