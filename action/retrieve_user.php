<?php
session_start();

    // connexion à la base de données
    $db_username = 'root';
    $db_password = '';
    $db_name     = 'ff_manager';
    $db_host     = 'localhost';
    $db = mysqli_connect($db_host, $db_username, $db_password, $db_name) or die('could not connect to database');

    $name = $_GET['name'];

    $requete_user = "SELECT Pseudo, Mail, Password, Avatar FROM compte WHERE Pseudo = '" . $name . "'";
    $exec_requete = mysqli_query($db, $requete_user);
    $reponse = mysqli_fetch_assoc($exec_requete);
    $return = serialize($reponse); 
    echo ($return);

mysqli_close($db); // fermer la connexion





// <?php
// session_start();

// // connexion à la base de données
// // $db_username = 'root';
// // $db_password = '';
// // $db_name     = 'ff_manager';
// // $db_host     = 'localhost';
// // $db = mysqli_connect($db_host, $db_username, $db_password, $db_name) or die('could not connect to database');

// include('../include/connexion_pdo.php');
// $pdo = new Database;

// $name = $_GET['name'];

// // $requete_user = "SELECT Pseudo, Mail, Password, Avatar FROM compte WHERE Pseudo = '" . $name . "'";
// // $requete_user = $pdo->query(
// //     "SELECT Pseudo, Mail, Password, Avatar FROM compte WHERE Pseudo = '" . $name . "'"
// // );

// // $requete_user = "SELECT Pseudo, Mail, Password, Avatar FROM compte WHERE Pseudo = '" . $name . "'";

// $exec_requete = mysqli_query($pdo->dbConnection(), "SELECT Pseudo, Mail, Password, Avatar FROM compte WHERE Pseudo = '" . $name . "'");


// $reponse = mysqli_fetch_assoc($exec_requete);
// $return = serialize($reponse);
// echo ($return);

// // mysqli_close($db); // fermer la connexion
