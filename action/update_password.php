<?php
session_start();

// connexion à la base de données
include('../include/connexion_bdd.php');

$id = mysqli_real_escape_string($db, htmlspecialchars($_POST['id']));
$element = mysqli_real_escape_string($db, htmlspecialchars($_POST['element']));

if ($element == 'Password') {
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
                echo 'ok';
            } else {
                echo 'different';
            }
        } else {
            echo 'invalide';
        }
    } else {
        echo 'faux';
    }
}




if ($element == 'Mail') {
    $mail = mysqli_real_escape_string($db, htmlspecialchars($_POST['mail']));
    
    $regexMail = '/^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/';
    $testMail = preg_match($regexMail, $mail);

    if ($testMail == true) {
        $requete_user = "UPDATE `compte` SET `Mail` = '" . $mail . "' WHERE `compte`.`ID_Compte` = " . $id . ";";
        $exec_requete = mysqli_query($db, $requete_user);
        echo 'ok';
    } else {
        echo 'invalide';
    }
}
