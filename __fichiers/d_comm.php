<?php
// session_start();

// // connexion à la base de données
// include('../include/connexion_bdd.php');
// $id = mysqli_real_escape_string($db, htmlspecialchars($_GET['id']));

// $requete_user = "SELECT plat_commande.ID AS ID, commande.Cle_Compte AS Compte, commande.ID_Commande AS N_Com, 
//     commande.Total_Commande as Total_Com
//     FROM plat_commande 
//     INNER JOIN commande ON commande.ID_Commande = plat_commande.Cle_Commande 
//     WHERE commande.Cle_Compte = '" . $id . "' GROUP BY N_Com";
    
//     $exec_requete = mysqli_query($db, $requete_user);
//     $row = $exec_requete->fetch_array(MYSQLI_ASSOC);
//     $reponse = mysqli_fetch_array($exec_requete);
//     $return = serialize($reponse);
   
//     $object = json_decode(json_encode($return), FALSE);
//     print_r($object);

// $id = $_SESSION['idsession'];
