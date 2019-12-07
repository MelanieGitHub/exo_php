<?php
session_start();

// connexion à la base de données
include('../include/connexion_bdd.php');

$id = mysqli_real_escape_string($db, htmlspecialchars($_POST['id']));
$check = mysqli_real_escape_string($db, htmlspecialchars($_POST['check']));

$requete_select_user = "SELECT * FROM compte WHERE ID_Compte = " . $id . ";";
$exec_requete_select = mysqli_query($db, $requete_select_user);

$data = mysqli_fetch_assoc($exec_requete_select);
$password = $data['Password'];

if ($password == $check) {
    $requete_user = "DELETE FROM `compte` WHERE `ID_Compte` = " . $id . ";";
    $exec_requete = mysqli_query($db, $requete_user);
    echo 'ok';
} else {
    echo 'invalide';
}
