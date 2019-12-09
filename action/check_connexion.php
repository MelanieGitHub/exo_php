<?php

session_start();

// connexion à la base de données
include('../bdd_sql/connexion_bdd.php');

////////////////////////////////////////////////////////
/////////////// CONNEXION //////////////////////////////
////////////////////////////////////////////////////////

if (isset($_POST['username']) && isset($_POST['password'])) {

   // mysqli_real_escape_string et htmlspecialchars || éliminer attaque de type injection SQL et XSS
   $username = mysqli_real_escape_string($db, htmlspecialchars($_POST['username']));
   $password = mysqli_real_escape_string($db, htmlspecialchars($_POST['password']));

   if ($username !== "" && $password !== "") {

      $requete_account = "SELECT ID_Compte, Pseudo FROM compte WHERE Pseudo = '" . $username . "' AND Password = '" . $password . "' ";
      $exec_requete_ = mysqli_query($db, $requete_account);
      $data = mysqli_fetch_assoc($exec_requete_);
      $id_session =  $data['ID_Compte'];
      $pseudo_session = $data['Pseudo'];

      $requete = "SELECT count(*) FROM compte WHERE Pseudo = '" . $username . "' AND Password = '" . $password . "' ";
      $exec_requete = mysqli_query($db, $requete);

      $reponse = mysqli_fetch_array($exec_requete);
      $count = $reponse['count(*)'];

      if ($count != 0) {
         $_SESSION['username'] = $pseudo_session;
         $_SESSION['idsession'] = $id_session;
         
         header('Location: ../mange.php');
      } else {
         header('Location: ../index.php?erreur=1');
      }
   } else {
      header('Location: ../index.php?erreur=2');
   }
} else {
   header('Location: ../index.php');
}

////////////////////////////////////////////////////////
/////////////// INSCRIPTION ////////////////////////////
////////////////////////////////////////////////////////

if (isset($_POST['username_i']) && isset($_POST['mail_i']) && isset($_POST['password_i']) && isset($_POST['password2_i'])) {


   // mysqli_real_escape_string et htmlspecialchars || éliminer attaque de type injection SQL et XSS
   $username = mysqli_real_escape_string($db, htmlspecialchars($_POST['username_i']));
   $mail = mysqli_real_escape_string($db, htmlspecialchars($_POST['mail_i']));
   $password = mysqli_real_escape_string($db, htmlspecialchars($_POST['password_i']));
   $password2 = mysqli_real_escape_string($db, htmlspecialchars($_POST['password2_i']));


   $regexPseudo = '/^[a-zA-Z0-9._-]{2,}$/';
   $regexMail = '/^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/';
   $regexPassword = '/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[-+!*$@%_])([-+!*$@%_\w]{8,15})$/';

   $testPseudo = preg_match($regexPseudo, $username);
   $testMail = preg_match($regexMail, $mail);
   $testPassword = preg_match($regexPassword, $password);

   if ($username !== "" && $mail !== "" && $password !== "" && $password2 !== "") {
      if ($testPseudo == true) {
         if ($testMail == true) {

            if ($testPassword == true) {

               if ($password == $password2) {

                  $requete_inscription = "INSERT INTO compte VALUES(NULL, '" . $username . "', '" . $mail . "', '" . $password . "')";
                  $exec_requete_inscription = mysqli_query($db, $requete_inscription);

                  header('Location: ../index.php?inscription=1');
               } else {
                  header('Location: ../index.php?erreur=6');
               }
            } else {
               header('Location: ../index.php?erreur=5');
            }
         } else {
            header('Location: ../index.php?erreur=3');
         }
      } else {
         header('Location: ../index.php?erreur=4');
      }
   } else {
      header('Location: ../index.php');
   }
}

mysqli_close($db); // fermer la connexion
