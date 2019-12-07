<?php
// session_start();

// // connexion à la base de données
// include('include/connexion_bdd.php');

// if (!$_SESSION) {
//     echo "<div class='text-center mt-5 mb-5'>
//                               <h2 class='text-center text-danger m-auto'>Vous devez être connecté !<br/>
//                               <a class='text-dark' href='index.php'> 
//                                     <i class=\"fas fa-link pr-3\"></i>
//                                           Se connecter
//                                     <i class=\"fas fa-link pl-3\"></i> 
//                               </a>
//                               </h2>
//                         </div>";
// } else {
//     echo "<script>
//                   window.onload = function(){ 
//                         document.getElementById('txtUserConnexion').innerHTML = '" . $_SESSION['username'] . "';
//                   }; 
//             </script>";
// }

// if (isset($_GET['deconnexion'])) {
//     if ($_GET['deconnexion'] == true) {
//         $_SESSION['username'] = '';
//         session_destroy();
//         header("location:index.php");
//     }
// }

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Mange mamen</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/icon_resto.ico" />

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Yanone+Kaffeesatz:300&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Yanone+Kaffeesatz:700&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Luckiest+Guy&display=swap">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"> </script>
    <script src="https://kit.fontawesome.com/1cf86c30d1.js"></script>

    <link rel="stylesheet" href="css/style_mange.css">
</head>

<body class="bg-light">
    <div class="navbar navbar-expand-xl navbar-light bg-dark p-5">
        <div class='col-12'>
            <img width='50px' src="images/logo_resto.png" alt="">
            <span class="px-2 font-site logo text-center align-middle">Mange ton Php</span>
            <img width='50px' src="images/logo_resto.png" alt="">
        </div>

    </div>

    <div class='text-center mt-5 mb-5'>
        <h2 class='text-center text-danger m-auto'>Veuillez vous connecter pour accéder au contenu du site !<br />
            <a class='text-dark' href='index.php'>
                <i class="fas fa-link pr-3"></i>
                Se connecter
                <i class="fas fa-link pl-3"></i>
            </a>
        </h2>
    </div>

</body>

</html>