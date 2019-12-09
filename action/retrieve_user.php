<?php
session_start();

// connexion à la base de données
include('../bdd_sql/connexion_bdd.php');
    
$id = $_SESSION['idsession'];

$requete_user = "SELECT * FROM compte WHERE ID_Compte = '" . $id . "'";
$exec_requete = mysqli_query($db, $requete_user);
$reponse = mysqli_fetch_assoc($exec_requete);
$return = serialize($reponse);
echo ($return);

