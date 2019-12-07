<?php
session_start();

// connexion à la base de données
include('../include/connexion_bdd.php');

$id = mysqli_real_escape_string($db, htmlspecialchars($_POST['id']));
$password = mysqli_real_escape_string($db, htmlspecialchars($_POST['password']));
$password2 = mysqli_real_escape_string($db, htmlspecialchars($_POST['password2']));
$check = mysqli_real_escape_string($db, htmlspecialchars($_POST['check']));

$regexPassword = '/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[-+!*$@%_])([-+!*$@%_\w]{8,15})$/';
$testPassword = preg_match($regexPassword, $password);

$requete_select_user = "SELECT * FROM compte WHERE ID_Compte = " . $id . ";";
$exec_requete_select = mysqli_query($db, $requete_select_user);

$data = mysqli_fetch_assoc($exec_requete_select);
$ancien_password = $data['Password'];

if ($ancien_password == $check) {
    if ($testPassword == true) {

        if ($password == $password2) {

            $requete_user = "UPDATE `compte` SET `Password` = '" . $password . "' WHERE `compte`.`ID_Compte` = " . $id . ";";
            $exec_requete = mysqli_query($db, $requete_user);
            // header('Location: ../index.php?inscription=1');
            echo 'ok';
        } else {
            // header('Location: ../index.php?erreur=6');
            echo 'different';
        }
    } else {
        // header('Location: ../index.php?erreur=5');
        echo 'invalide';
    }
} else {
    // header('Location: ../index.php?erreur=5');
    echo 'faux';

}
