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

                        <li class="nav-item">
                              <a id='lk_Panier' class="nav-link text-light">
                                    <i class="fas fa-shopping-cart"></i>
                                    <span class="pl-2">Mon panier</span>
                              </a>
                        </li>

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

      <article id='bodyArticle' class='mt-5'>

            <!-- //////////////////////////////////////////////////////////////////////// -->
            <!-- ////////////////// TOUS LES ARTICLES | SUJETS ////////////////////////// -->
            <!-- //////////////////////////////////////////////////////////////////////// -->

            <section id='sctSearch' class='container'>
                  <div class='mb-3 p-4 border rounded row'>
                        <h4 class='col-12 border-bottom pb-3 font-weight-bold'>Bienvenue ! </h4>
                  </div>


                  <div class='p-2 bg-info rounded mb-3'>
                        <a class="nav-link text-light d-flex">
                              <input class="form-control" type="text" placeholder="Liste des plats contenant le mot...">
                              <i class="fas fa-search ml-4 mt-2"></i>
                        </a>
                  </div>

                  <div class='d-flex justify-content-around'>
                        <div class='p-4'>
                              <form class='p-4 border border-info rounded' action="">
                                    <div class="form-group">
                                          <label class='text-center font-weight-bold'>Liste des plats par prix, origine: </label>
                                          <div class='row'>
                                                <p class='col-sm-6 mb-0'>
                                                      <label>Prix minimum : </label>
                                                      <input type="number" step='1' class='form-control'>
                                                </p>

                                                <p class='col-sm-6 mb-0'>
                                                      <label>Prix maximum : </label>
                                                      <input type="number" step='1' class='form-control'>
                                                </p>

                                          </div>
                                          <div class="mt-3 form-group">
                                                <label class='text-center' for="selectOrigine">Origine : </label>
                                                <select id="selectOrigine" class="form-control">
                                                      <option value="">Option 1</option>
                                                      <option value="">Option 2</option>
                                                      <option value="">Option 3</option>
                                                      <option value="">...</option>
                                                      <?php
                                                      // session_start();

                                                      // $requete = "SELECT Libelle FROM ingredient";
                                                      // $exec_requete = mysqli_query($db, $requete);
                                                      // $rep_ingredient = mysqli_fetch_array($exec_requete);

                                                      // $exec_requete = $mysqli->query($db, $requete);
                                                      // $rep_ingredient = mysqli_fetch_array($exec_requete);

                                                      // while ($data = $rep_ingredient->fetch_assoc()) {
                                                      ?>
                                                      <!-- <option>  -->
                                                      <?php //echo $data['Libelle']; 
                                                      ?>
                                                      <!-- </option> -->
                                                      <?php
                                                      // }

                                                      // $rep_ingredient->closeCursor();

                                                      // mysqli_close($db); // fermer la connexion
                                                      ?>
                                                </select>

                                          </div>
                                          <input type="submit" class='btn btn-info col-12 mt-3' value='Rechercher'>
                                    </div>
                              </form>
                        </div>

                        <div class='p-4 align-self-center'>
                              <form class='p-4 border border-info rounded' action="">
                                    <div class="form-group">
                                          <label class='text-center font-weight-bold' for="selectIngredient">Liste des plats contenant l'ingrédient : </label>
                                          <select id="selectIngredient" class="form-control">
                                                <option value="">Option 1</option>
                                                <option value="">Option 2</option>
                                                <option value="">Option 3</option>
                                                <option value="">...</option>
                                                <?php
                                                // session_start();

                                                // $requete = "SELECT Libelle FROM ingredient";
                                                // $exec_requete = mysqli_query($db, $requete);
                                                // $rep_ingredient = mysqli_fetch_array($exec_requete);

                                                // $exec_requete = $mysqli->query($db, $requete);
                                                // $rep_ingredient = mysqli_fetch_array($exec_requete);

                                                // while ($data = $rep_ingredient->fetch_assoc()) {
                                                ?>
                                                <!-- <option>  -->
                                                <?php //echo $data['Libelle']; 
                                                ?>
                                                <!-- </option> -->
                                                <?php
                                                // }

                                                // $rep_ingredient->closeCursor();

                                                // mysqli_close($db); // fermer la connexion
                                                ?>
                                          </select>

                                          <input type="submit" class='btn btn-info col-12 mt-3' value='Rechercher'>
                                    </div>
                              </form>
                        </div>
                  </div>

            </section>

            <!-- //////////////////////////////////////////////////////////////////////// -->
            <!-- //////////////////////////////// AFFICHAGE ///////////////////////////// -->
            <!-- //////////////////////////////////////////////////////////////////////// -->

            <section id='sctAffichage' class='container border border-dark rounded'>
                  <div class='p-4'>
                        <p>Résultat de la recherche :</p>
                        <?php
                        // session_start();

                        // $requete = "SELECT Libelle FROM ingredient";
                        // $exec_requete = mysqli_query($db, $requete);
                        // $rep_ingredient = mysqli_fetch_array($exec_requete);

                        // $exec_requete = $mysqli->query($db, $requete);
                        // $rep_ingredient = mysqli_fetch_array($exec_requete);

                        // while ($data = $rep_ingredient->fetch_assoc()) {
                        ?>

                        <div class='border-top border-bottom p-3'>
                              <div class='row justify-content-between'>
                                    <p class='font-weight-bold'> Titre<?php //echo $data['Titre recette'];  
                                                                        ?> </p>
                                    <p class='text-secondary'> Type<?php //echo $data['Type recette'];  
                                                                        ?> </p>
                                          <label for="">Quantité : </label>
                                          <input class='col-1 form-control' type="number" step='1' value='<?php //echo $data['quantite']; 
                                                                                    ?>'>

                                    <p>
                                          <button class='btn btn-dark' type='button'>
                                                <i class="fas fa-cart-plus"></i>
                                                <span>Ajouter</span>
                                          </button>
                                    </p>
                              </div>
                              <div class='row justify-content-between'>
                                    <p>
                                          <label for="">Prix : </label>
                                          <p><?php //echo $data['prix']; 
                                                                                    ?></p>
                                    </p>
                                    <p class='font-weight-bold'> Catégorie<?php //echo $data['categorie'];  
                                                                              ?> </p>
                                    <p class='text-secondary'> Poids<?php //echo $data['poids'];  
                                                                        ?> </p>
                              </div>

                              <div class='row'>
                                    <label for="">Origine : </label>
                                    <p type="number"><?php //echo $data['origine']; 
                                                      ?></p>
                              </div>

                              <div class='row'>
                                    <label for="">Ingrédients : </label>
                                    <p type="number"><?php //echo $data['ingredients']; 
                                                      ?></p>
                              </div>
                        </div>
                        <?php
                        // }

                        // $rep_ingredient->closeCursor();

                        // mysqli_close($db); // fermer la connexion
                        ?>


                  </div>

            </section>

            <!-- //////////////////////////////////////////////////////////////////////// -->
            <!-- //////////////////////////////// PANIER ///////////////////////////////// -->
            <!-- ///////////////////////////////////////////////////////////////////////// -->

            <section id='sctPanier' class='container border border-dark rounded'>
                  <p>Votre commande :</p>

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