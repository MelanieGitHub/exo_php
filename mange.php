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

      <script src='js/script_mange.js'></script>

      <link rel="stylesheet" href="css/style_mange.css?">
</head>

<body class="bg-light">

      <?php
      session_start();
      ?>
      <!-- //////////////////////////////////////////////////////////////////////// -->
      <!-- //////////////////////////// HEADER //////////////////////////////////// -->

      <nav class="navbar navbar-expand-xl navbar-light bg-info">
            <div class='col-4'>
                  <img width='6%' src="images/logo_resto.png" alt="">
                  <span class="px-2 font-site logo text-center align-middle">Mange ton Php</span>
                  <img width='6%' src="images/logo_resto.png" alt="">
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
            </button>

            <div class="col-8 collapse navbar-collapse" id="navbarContent">
                  <ul class="navbar-nav col-12 justify-content-around">

                        <li class="nav-item">
                              <a class="cursor-pointer nav-link text-light" onClick="window.location.reload();">
                                    <i class="fas fa-dice-d20"></i>
                                    <span class="pl-2">Accueil</span>
                              </a>
                        </li>

                        <li class="nav-item">
                              <a id='lk_Profil' class="cursor-pointer nav-link text-light">
                                    <i class="fas fa-user"></i>
                                    <span id='txtUserConnexion' class="pl-2"></span>
                              </a>
                        </li>

                        <!-- <li class="nav-item">
                              <a id='lk_About_Forum' class="nav-link text-light">
                                    <i class="fas fa-cogs"></i>
                                    <span class="pl-2">À propos du Forum</span>
                              </a>
                        </li> -->

                        <li class="nav-item">
                              <a href='mange.php?deconnexion=true' class="cursor-pointer nav-link text-light">
                                    <i class="fas fa-lightbulb"></i>
                                    <span class="pl-2">Déconnexion</span>
                              </a>
                        </li>
                  </ul>
            </div>
      </nav>

      <!-- //////////////////////////////////////////////////////////////////////// -->
      <!-- ///////////////////////////// BODY ///////////////////////////////////// -->

      <?php

      if (!$_SESSION) {
            echo "<div class='text-center mt-5'>
                        <h2 class='text-center text-danger m-auto'>Vous devez être connecté !<br/>
                        <a class='text-dark' href='index.php'> 
                              <i class=\"fas fa-link pr-3\"></i>
                                    Se connecter
                              <i class=\"fas fa-link pl-3\"></i> 
                        </a>
                        </h2>
                  </div>";
      } else {
            echo "<script>document.getElementById('txtUserConnexion').innerHTML = '" . $_SESSION['username'] . "';</script>";
      }

      if (isset($_GET['deconnexion'])) {
            if ($_GET['deconnexion'] == true) {
                  $_SESSION['username'] = '';
                  session_destroy();
                  header("location:index.php");
            }
      }
      ?>

      <article id='bodyArticle' class='d-none mt-5'>

            <!-- //////////////////////////////////////////////////////////////////////// -->
            <!-- ////////////////// TOUS LES ARTICLES | SUJETS ////////////////////////// -->
            <!-- //////////////////////////////////////////////////////////////////////// -->

            <section id='sctSujets' class='container'>
                  <div class='p-2 bg-info rounded mb-3'>
                        <a class="nav-link text-light d-flex">
                              <input class="form-control" type="text" placeholder="Rechercher ...">
                              <i class="fas fa-search ml-4 mt-2"></i>
                        </a>
                  </div>


                  <?php

                  // while ($data = $rep_sujet->fetch()) {
                  ?>
                  <div class='p-4 border rounded bg-smooth-white row'>
                        <h4 class='col-12 border-bottom pb-3 font-weight-bold'>Bienvenue ! </h4>

                       
                  </div>

                  <?php
                  // }
                  ?>
            </section>

            <!-- //////////////////////////////////////////////////////////////////////// -->
            <!-- /////////////////////// A PROPOS DU FORUM /////////////////////////////// -->
            <!-- //////////////////////////////////////////////////////////////////////// -->

            <section id='sctAboutForum' class='container'>

                  <div class='border rounded'>
                        <p>Titre</p>
                        <p>Olala</p>
                        <p>Que d'émotions</p>
                        <p>Tellement de balise p !!!!!!!!!</p>
                  </div>

            </section>


            <!-- //////////////////////////////////////////////////////////////////////// -->
            <!-- /////////////////// PROFIL | UPDATE | DELETE /////////////////////////// -->
            <!-- //////////////////////////////////////////////////////////////////////// -->

            <section id='sctProfil' class='container border border-dark rounded'>
                  <div class='text-center'>
                        <div class='d-sm-flex p-4'>
                              <div class='border p-4 col-sm-6 row'>
                                    <p id='pseudoCompte' class='col-12 border-bottom pb-3'></p>
                                    <div class='col-6 mt-3 border-right'>
                                          <p class='col-12 pb-3'>
                                                <img id='avatarCompte' width='35%' class='border border-secondary' src="" alt="avatar">
                                          </p>

                                          <p>
                                                <a role='button' class='text-info' href=''>Modifier mon avatar</a>
                                          </p>
                                    </div>

                                    <div class='col-6 mt-3 align-self-end'>
                                          <p id='mailCompte' class='pb-4'></p>

                                          <p>
                                                <a role='button' class='text-info' href=''>Mettre à jour mon mail</a>
                                          </p>
                                    </div>
                                    <p class='col-12 border-top mt-4 mb-0 pt-3'>
                                          <a role='button' class='text-danger' href=''>Supprimer mon compte</a>
                                    </p>

                              </div>

                              <div class='p-4 m-auto col-sm-6'>
                                    <p class='mx-auto align-self-start'>
                                          <a role='button' id='majPassword' class='btn btn-dark text-light'>Mettre à jour mon mot de passe</a>
                                    </p>
                                    <div id='UpdatePassword' class='border rounded p-4 col-10 m-auto'>
                                          <form action="update_mdp.php">
                                                <input class='form-control mb-3' type="password" placeholder="Votre mot de passe actuel" autocomplete="false" readonly onfocus="this.removeAttribute('readonly');">
                                                <input class='form-control mb-3' type="password" placeholder="Votre nouveau mot de passe" autocomplete="false" readonly onfocus="this.removeAttribute('readonly');">
                                                <input class='form-control' type="password" placeholder="Confirmez votre nouveau mot de passe" autocomplete="false" readonly onfocus="this.removeAttribute('readonly');">
                                                <input class='btn btn-info' type="submit" value='Confirmer'>
                                          </form>
                                    </div>
                              </div>


                        </div>
                  </div>

            </section>

      </article>


</body>

</html>