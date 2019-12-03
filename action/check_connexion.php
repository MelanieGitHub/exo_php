<?php
// connexion à la base de données
$db_username = 'root';
$db_password = '';
$db_name     = 'exo_php';
$db_host     = 'localhost';
$db = mysqli_connect($db_host, $db_username, $db_password, $db_name)
   or die('could not connect to database');

session_start();

////////////////////////////////////////////////////////
/////////////// CONNEXION //////////////////////////////
////////////////////////////////////////////////////////

if (isset($_POST['username']) && isset($_POST['password'])) {

   // mysqli_real_escape_string et htmlspecialchars || éliminer attaque de type injection SQL et XSS
   $username = mysqli_real_escape_string($db, htmlspecialchars($_POST['username']));
   $password = mysqli_real_escape_string($db, htmlspecialchars($_POST['password']));

   if ($username !== "" && $password !== "") {

      $requete_if = "SELECT count(*) FROM compte WHERE Pseudo = '" . $username . "' AND Password = '" . $password . "' ";
      $exec_requete_if = mysqli_query($db, $requete_if);
      $reponse_if = mysqli_fetch_array($exec_requete_if);
      $count_if = $reponse_if['count(*)'];

      if ($count_if != 0) {
         $_SESSION['username'] = $username;
         header('Location: ../mange.php');
      } else {
         header('Location: ../user_login.php?erreur=1');
      }
   } else {
      header('Location: ../user_login.php?erreur=2');
   }
} else {
   header('Location: ../user_login.php');
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

                  $requete_inscription = "INSERT INTO compte VALUES('" . $username . "', '" . $mail . "', '" . $password . "', '" . $password2 . "')";
                  $exec_requete_inscription = mysqli_query($db, $requete_inscription);
         
                  header('Location: ../user_login.php?inscription=1');
               } else {
                  header('Location: ../user_login.php?erreur=6');
               }
            } else {
               header('Location: ../user_login.php?erreur=5');
            }
         } else {
            header('Location: ../user_login.php?erreur=3');
         }
      } else {
         header('Location: ../user_login.php?erreur=4');
      }
   } else {
      header('Location: ../user_login.php');
   }
}

   mysqli_close($db); // fermer la connexion



