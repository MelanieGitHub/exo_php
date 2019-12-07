<?php
session_start();

// connexion à la base de données
include('../include/connexion_bdd.php');
    
$name = $_SESSION['username'];

$requete_user = "SELECT * FROM compte WHERE Pseudo = '" . $name . "'";
$exec_requete = mysqli_query($db, $requete_user);
$reponse = mysqli_fetch_assoc($exec_requete);
$return = serialize($reponse);
echo ($return);

