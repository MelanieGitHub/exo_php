<?php
session_start();

// connexion à la base de données
include('bdd_sql/connexion_bdd.php');

// Gestion de la session utilisateur 
if (!$_SESSION) {
      header("location:deconnecte.php");
} else {
      echo "<script>
                  window.onload = function(){ 
                        document.getElementById('txtUserConnexion').innerHTML = '" . $_SESSION['username'] . "';
                  }; 
            </script>";
}

if (isset($_GET['deconnexion'])) {
      if ($_GET['deconnexion'] == true) {
            $_SESSION['username'] = '';
            session_destroy();
            header("location:index.php");
      }
}
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

      <script src='js/script_mange.js'></script>

      <link rel="stylesheet" href="css/style_mange.css">
</head>

<body class="bg-light">

      <!-- //////////////////////////////////////////////////////////////////////// -->
      <!-- //////////////////////////// NAVBAR //////////////////////////////////// -->
      <!-- //////////////////////////////////////////////////////////////////////// -->

      <nav class="navbar navbar-expand-xl navbar-light bg-dark">
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
                              <a id='lk_Commande' class="cursor-pointer nav-link text-light">
                                    <i class="fas fa-list"></i>
                                    <span class="pl-2">Mes commandes</span>
                              </a>
                        </li>

                        <li class="nav-item">
                              <a id='lk_Panier' class="cursor-pointer nav-link text-light">
                                    <i class="fas fa-shopping-cart"></i>
                                    <span class="pl-2">Mon panier</span>
                              </a>
                        </li>

                        <li class="nav-item">
                              <a href='mange.php?deconnexion=true' class="cursor-pointer nav-link text-light">
                                    <i class="fas fa-sign-out-alt"></i>
                                    <span class="pl-2">Déconnexion</span>
                              </a>
                        </li>
                  </ul>
            </div>
      </nav>

      <!-- //////////////////////////////////////////////////////////////////////// -->
      <!-- ///////////////////////////// BODY CONTENT ///////////////////////////// -->
      <!-- //////////////////////////////////////////////////////////////////////// -->

      <article id='bodyArticle' class='container mt-5'>

            <header class='mb-3 p-4 border rounded row'>
                  <h4 class='col-12 border-bottom text-center pb-3 font-weight-bold'>Bienvenue ! </h4>
                  <p class='p-5 text-center col-12'>
                        <!-- <span class='text-primary'>Ajouter un champs 'statut' au compte utilisateur (admin, user); <br></span> -->
                        <span class='text-primary'>Création d'un back-office pour la gestion totale du site sans utilisation du SGBD -- /!\ Stabilité 100% /!\<br></span>
                        <span class='text-success'>Ajouter un champs 'statut' à la commande (en cours, fini); <br> </span>
                        <span class='text-success'>Onclick '.ajouter_plat' --> INSERT INTO plat_commande; <br> </span>
                        <span class='text-danger'>If commande empty --> INSERT INTO commande with statut : en cours; <br> </span>
                        <span class='text-danger'>OU créer deux tables temporaire, tant que la commande n'est pas passé et qu'il ne s'est pas passé x temps <br>--> Possibilité d'ajouter à la commande + plat_commande temporaire <br> </span>
                  </p>
            </header>

            <!-- //////////////////////////////////////////////////////////////////////// -->
            <!-- ////////////////////// SECTION RECHERCHE /////////////////////////////// -->
            <!-- //////////////////////////////////////////////////////////////////////// -->

            <section id='sctSearch'>
                  <div class='d-flex justify-content-around mb-4'>
                        <form method="post">
                              <input type='submit' name='all_plat' class='show-section btn btn-dark font-weight-bold' value='Tous nos plats'>
                        </form>
                        <button id='cmdSearch_mot' type='button' class='btn btn-dark'>Mot clés</button>
                        <button id='cmdSearch_prix' type='button' class='btn btn-dark'>Prix</button>
                        <button id='cmdSearch_type' type='button' class='btn btn-dark'>Type</button>
                        <button id='cmdSearch_ingredient' type='button' class='btn btn-dark'>Ingrédient</button>
                  </div>

                  <!-- //////////////////////////////////////////////////////////////////////// -->
                  <!-- /////////////////////// Recherche par MOT CLES ///////////////////////// -->
                  <!-- //////////////////////////////////////////////////////////////////////// -->

                  <aside id='asideMot' class='p-2 bg-dark rounded mb-3'>
                        <form method='post'>
                              <p class="nav-link text-light d-flex">
                                    <input class="form-control" type="text" name='search' placeholder="Liste des plats contenant le mot...">
                                    <input class='show-section ml-3 btn btn-light' type='submit' value='Search'>
                              </p>
                        </form>
                  </aside>

                  <!-- //////////////////////////////////////////////////////////////////////// -->
                  <!-- ///////////////////////// Recherche par PRIX /////////////////////////// -->
                  <!-- //////////////////////////////////////////////////////////////////////// -->

                  <aside id='asidePrix' class='p-4'>
                        <form class='p-4 border border-dark rounded' method="post">
                              <div class="form-group">
                                    <label class='text-center font-weight-bold'>Liste des plats par prix : </label>
                                    <div class='row'>
                                          <p class='col-sm-6 mb-0'>
                                                <label>Prix minimum : </label>
                                                <input name='prix_min_search' type="number" step='1' class='form-control'>
                                          </p>

                                          <p class='col-sm-6 mb-0'>
                                                <label>Prix maximum : </label>
                                                <input name='prix_max_search' type="number" step='1' class='form-control'>
                                          </p>

                                    </div>
                                    <input type="submit" name='prix_search' class='show-section btn btn-dark col-12 mt-3' value='Rechercher'>
                              </div>
                        </form>
                  </aside>

                  <!-- //////////////////////////////////////////////////////////////////////// -->
                  <!-- /////////////////////// Recherche par TYPE ///////////////////////////// -->
                  <!-- //////////////////////////////////////////////////////////////////////// -->

                  <aside id='asideType' class='p-4'>
                        <form class='p-4 border border-dark rounded' method="post">
                              <div class="form-group">
                                    <label class='text-center font-weight-bold'>Liste des plats par type: </label>

                                    <div class="mt-3 form-group">
                                          <label class='text-center'>Type : </label>
                                          <select class="form-control" name='type_search'>
                                                <?php
                                                $requete_typ = "SELECT Libelle FROM type";
                                                $exec_requete_typ = mysqli_query($db, $requete_typ);

                                                while ($data = mysqli_fetch_assoc($exec_requete_typ)) {
                                                      echo "<option>" . $data['Libelle'] . "</option>";
                                                }
                                                ?>
                                          </select>
                                    </div>
                                    <input type="submit" name='type_search_submit' class='show-section btn btn-dark col-12 mt-3' value='Rechercher'>
                              </div>
                        </form>
                  </aside>

                  <!-- //////////////////////////////////////////////////////////////////////// -->
                  <!-- /////////////////////// Recherche par INGREDIENT /////////////////////// -->
                  <!-- //////////////////////////////////////////////////////////////////////// -->

                  <aside id='asideIngredient' class='p-4 align-self-center'>
                        <form class='p-4 border border-dark rounded' method="post">
                              <div class="form-group">
                                    <label class='text-center font-weight-bold' for="selectIngredient">Liste des plats contenant l'ingrédient : </label>
                                    <select id="selectIngredient" class="form-control" name='select_ingredient'>

                                          <?php
                                          $requete_ingredient = "SELECT Libelle FROM ingredient";
                                          $exec_requete_ingredient = mysqli_query($db, $requete_ingredient);

                                          while ($data = mysqli_fetch_assoc($exec_requete_ingredient)) {
                                                echo "<option>" . $data['Libelle'] . "</option>";
                                          }
                                          ?>
                                    </select>

                                    <input type='submit' name='submit_ingredient' class='show-section btn btn-dark col-12 mt-3' value='Rechercher'>
                              </div>
                        </form>
                  </aside>
            </section>

            <!-- //////////////////////////////////////////////////////////////////////// -->
            <!-- //////////////////////////// SECTION AFFICHAGE ///////////////////////// -->
            <!-- //////////////////////////////////////////////////////////////////////// -->

            <section id='sctAffichage' class='border border-dark rounded mb-5'>
                  <p class='p-4 border-bottom border-dark text-center w-50 m-auto font-weight-bold'>Votre recherche :</p>
                  <div class='p-4'>

                        <!-- //////////////////////////////////////////////////////////////////////// -->
                        <!-- /////////////////////// TOUS les PLATS ///////////////////////////////// -->
                        <!-- //////////////////////////////////////////////////////////////////////// -->

                        <?php
                        if (isset($_POST['all_plat'])) {

                              $requete_onload = "SELECT plat.Libelle AS Plat, type.Libelle AS Type, 
                              origine.Libelle AS Origine, plat.Prix AS Prix, plat.Poids AS Poids, plat.Image AS Image, 
                              GROUP_CONCAT(ingredient.Libelle SEPARATOR ', ') AS Ingredient2, plat.ID AS ID_plat, plat.ID AS ID_plat
                              FROM ingredient_plat INNER JOIN plat ON plat.ID = ingredient_plat.Cle_Plat 
                              INNER JOIN ingredient ON ingredient.ID_Ingredient = ingredient_plat.Cle_Ingredient 
                              INNER JOIN type ON plat.Type = type.ID_Type INNER JOIN origine ON plat.Origine = origine.ID_Origine GROUP BY plat.ID";

                              $exec_requete_recherche_onload = mysqli_query($db, $requete_onload);

                              while ($data = mysqli_fetch_assoc($exec_requete_recherche_onload)) {

                                    ?>
                                    <div class='border-bottom border-dark p-3 d-flex'>
                                          <div class='col-2 align-center my-auto'>
                                                <p>
                                                      <img src="<?php echo $data['Image']; ?>" width='100%' alt="">
                                                </p>
                                          </div>
                                          <div class='col-10'>
                                                <div class='d-flex justify-content-between border-bottom p-3'>
                                                      <p class='col-4'>
                                                            <span class='font-weight-bold'><?php echo $data['Plat']; ?></span> <span class='text-secondary'><?php echo $data['Poids']; ?>g</span><br>
                                                            <span class='font-italic'><?php echo $data['Type']; ?></span>
                                                      </p>

                                                      <p class='col-4 d-flex justify-content-start'>
                                                            <label class='align-self-center'>Quantité : </label>
                                                            <input data-cle='<?php echo $data['ID_plat']; ?>' class='input-quantite ml-3 w-50 form-control text-center' type="number" step='1' value='1' readonly onfocus="this.removeAttribute('readonly');">
                                                      </p>

                                                      <p class='col-4 d-flex justify-content-end'>
                                                            <button data-cle='<?php echo $data['ID_plat']; ?>' class='ajouter_plat btn btn-dark' type='button'>
                                                                  <i class="fas fa-cart-plus mr-2"></i>
                                                                  <span>Ajouter</span>
                                                            </button>
                                                      </p>
                                                </div>
                                                <div class='d-flex justify-content-start border-bottom p-3'>
                                                      <p class='col-4'>
                                                            <label>Prix : </label>
                                                            <span class='font-weight-bold text-dark'><?php echo $data['Prix']; ?> €</span>
                                                      </p>

                                                      <p class='col-4'>
                                                            <label>Origine : </label>
                                                            <span class='text-dark'><?php echo $data['Origine']; ?></span>
                                                      </p>
                                                </div>
                                                <div class='d-flex justify-content-start p-3'>
                                                      <p class='col-10 '>
                                                            <label class='font-weight-bold'>Ingrédients : </label>
                                                            <span class='text-dark'><?php echo $data['Ingredient2']; ?></span>
                                                      </p>
                                                </div>

                                          </div>

                                    </div>



                        <?php
                              }
                        }
                        ?>

                        <!-- /////////////////////////////////////////////////////////////////////// -->
                        <!-- /////////////////////// Tri par MOT CLES /////////////////////////////// -->
                        <!-- //////////////////////////////////////////////////////////////////////// -->

                        <?php
                        if (isset($_POST['search'])) {
                              include('bdd_sql/sql_recherche_mots.php');

                              $exec_requete_recherche = mysqli_query($db, $requete_recherche);

                              while ($data = mysqli_fetch_assoc($exec_requete_recherche)) {

                                    ?>
                                    <div class='border-bottom border-dark p-3 d-flex'>
                                          <div class='col-2 align-center my-auto'>
                                                <p>
                                                      <img src="<?php echo $data['Image']; ?>" width='100%' alt="">
                                                </p>
                                          </div>
                                          <div class='col-10'>
                                                <div class='d-flex justify-content-between border-bottom p-3'>
                                                      <p class='col-4'>
                                                            <span class='font-weight-bold'><?php echo $data['Plat']; ?></span> <span class='text-secondary'><?php echo $data['Poids']; ?>g</span><br>
                                                            <span class='font-italic'><?php echo $data['Type']; ?></span>
                                                      </p>

                                                      <p class='col-4 d-flex justify-content-start'>
                                                            <label class='align-self-center'>Quantité : </label>
                                                            <input class='ml-3 w-50 form-control text-center' type="number" step='1' value='1' readonly onfocus="this.removeAttribute('readonly');">
                                                      </p>

                                                      <p class='col-4 d-flex justify-content-end'>
                                                            <button data-cle='<?php echo $data['ID_plat']; ?>' class='ajouter_plat btn btn-dark' type='button'>
                                                                  <i class="fas fa-cart-plus mr-2"></i>
                                                                  <span>Ajouter</span>
                                                            </button>
                                                      </p>
                                                </div>
                                                <div class='d-flex justify-content-start border-bottom p-3'>
                                                      <p class='col-4'>
                                                            <label>Prix : </label>
                                                            <span class='font-weight-bold text-dark'><?php echo $data['Prix']; ?> €</span>
                                                      </p>

                                                      <p class='col-4'>
                                                            <label>Origine : </label>
                                                            <span class='text-dark'><?php echo $data['Origine']; ?></span>
                                                      </p>
                                                </div>
                                                <div class='d-flex justify-content-start p-3'>
                                                      <p class='col-10 '>
                                                            <label class='font-weight-bold'>Ingrédients : </label>
                                                            <span class='text-dark'><?php echo $data['Ingredient2']; ?></span>
                                                      </p>
                                                </div>

                                          </div>

                                    </div>



                        <?php
                              }
                        }

                        ?>

                        <!-- //////////////////////////////////////////////////////////////////////// -->
                        <!-- /////////////////////// Tri par TYPE /////////////////////////////////// -->
                        <!-- //////////////////////////////////////////////////////////////////////// -->

                        <?php
                        if (isset($_POST['type_search_submit'])) {
                              include('bdd_sql/sql_recherche_type.php');

                              $exec_requete_recherche = mysqli_query($db, $requete_type);

                              while ($data = mysqli_fetch_assoc($exec_requete_recherche)) {

                                    ?>
                                    <div class='border-bottom border-dark p-3 d-flex'>
                                          <div class='col-2 align-center my-auto'>
                                                <p>
                                                      <img src="<?php echo $data['Image']; ?>" width='100%' alt="">
                                                </p>
                                          </div>
                                          <div class='col-10'>
                                                <div class='d-flex justify-content-between border-bottom p-3'>
                                                      <p class='col-4'>
                                                            <span class='font-weight-bold'><?php echo $data['Plat']; ?></span> <span class='text-secondary'><?php echo $data['Poids']; ?>g</span><br>
                                                            <span class='font-italic'><?php echo $data['Type']; ?></span>
                                                      </p>

                                                      <p class='col-4 d-flex justify-content-start'>
                                                            <label class='align-self-center'>Quantité : </label>
                                                            <input class='ml-3 w-50 form-control text-center' type="number" step='1' value='1' readonly onfocus="this.removeAttribute('readonly');">
                                                      </p>

                                                      <p class='col-4 d-flex justify-content-end'>
                                                            <button data-cle='<?php echo $data['ID_plat']; ?>' class='ajouter_plat btn btn-dark' type='button'>
                                                                  <i class="fas fa-cart-plus mr-2"></i>
                                                                  <span>Ajouter</span>
                                                            </button>
                                                      </p>
                                                </div>
                                                <div class='d-flex justify-content-start border-bottom p-3'>
                                                      <p class='col-4'>
                                                            <label>Prix : </label>
                                                            <span class='font-weight-bold text-dark'><?php echo $data['Prix']; ?> €</span>
                                                      </p>

                                                      <p class='col-4'>
                                                            <label>Origine : </label>
                                                            <span class='text-dark'><?php echo $data['Origine']; ?></span>
                                                      </p>
                                                </div>
                                                <div class='d-flex justify-content-start p-3'>
                                                      <p class='col-10 '>
                                                            <label class='font-weight-bold'>Ingrédients : </label>
                                                            <span class='text-dark'><?php echo $data['Ingredient2']; ?></span>
                                                      </p>
                                                </div>

                                          </div>

                                    </div>
                        <?php
                              }
                        }
                        ?>

                        <!-- //////////////////////////////////////////////////////////////////////// -->
                        <!-- /////////////////////// Tri par INGREDIENT ///////////////////////////// -->
                        <!-- //////////////////////////////////////////////////////////////////////// -->

                        <?php
                        if (isset($_POST['submit_ingredient'])) {
                              include('bdd_sql/sql_recherche_ingredient.php');

                              $exec_requete_ing = mysqli_query($db, $requete_ing);

                              while ($data = mysqli_fetch_assoc($exec_requete_ing)) {

                                    ?>
                                    <div class='border-bottom border-dark p-3 d-flex'>
                                          <div class='col-2 align-center my-auto'>
                                                <p>
                                                      <img src="<?php echo $data['Image']; ?>" width='100%' alt="">
                                                </p>
                                          </div>
                                          <div class='col-10'>
                                                <div class='d-flex justify-content-between border-bottom p-3'>
                                                      <p class='col-4'>
                                                            <span class='font-weight-bold'><?php echo $data['Plat']; ?></span> <span class='text-secondary'><?php echo $data['Poids']; ?>g</span><br>
                                                            <span class='font-italic'><?php echo $data['Type']; ?></span>
                                                      </p>

                                                      <p class='col-4 d-flex justify-content-start'>
                                                            <label class='align-self-center'>Quantité : </label>
                                                            <input class='ml-3 w-50 form-control text-center' type="number" step='1' value='1' readonly onfocus="this.removeAttribute('readonly');">
                                                      </p>

                                                      <p class='col-4 d-flex justify-content-end'>
                                                            <button data-cle='<?php echo $data['ID_plat']; ?>' class='ajouter_plat btn btn-dark' type='button'>
                                                                  <i class="fas fa-cart-plus mr-2"></i>
                                                                  <span>Ajouter</span>
                                                            </button>
                                                      </p>
                                                </div>
                                                <div class='d-flex justify-content-start border-bottom p-3'>
                                                      <p class='col-4'>
                                                            <label>Prix : </label>
                                                            <span class='font-weight-bold text-dark'><?php echo $data['Prix']; ?> €</span>
                                                      </p>

                                                      <p class='col-4'>
                                                            <label>Origine : </label>
                                                            <span class='text-dark'><?php echo $data['Origine']; ?></span>
                                                      </p>
                                                </div>
                                                <div class='d-flex justify-content-start p-3'>
                                                      <p class='col-10 '>
                                                            <label class='font-weight-bold'>Ingrédients : </label>
                                                            <span class='text-dark'><?php echo $data['Ingredient2']; ?></span>
                                                      </p>
                                                </div>

                                          </div>

                                    </div>
                        <?php
                              }
                        }
                        ?>

                        <!-- //////////////////////////////////////////////////////////////////////// -->
                        <!-- /////////////////////// Tri par PRIX /////////////////////////////////// -->
                        <!-- //////////////////////////////////////////////////////////////////////// -->

                        <?php
                        if (isset($_POST['prix_search'])) {
                              include('bdd_sql/sql_recherche_prix.php');
                              $exec_requete_recherche = mysqli_query($db, $requete_prix);

                              while ($data = mysqli_fetch_assoc($exec_requete_recherche)) {

                                    ?>
                                    <div class='border-bottom border-dark p-3 d-flex'>
                                          <div class='col-2 align-center my-auto'>
                                                <p>
                                                      <img src="<?php echo $data['Image']; ?>" width='100%' alt="">
                                                </p>
                                          </div>
                                          <div class='col-10'>
                                                <div class='d-flex justify-content-between border-bottom p-3'>
                                                      <p class='col-4'>
                                                            <span class='font-weight-bold'><?php echo $data['Plat']; ?></span> <span class='text-secondary'><?php echo $data['Poids']; ?>g</span><br>
                                                            <span class='font-italic'><?php echo $data['Type']; ?></span>
                                                      </p>

                                                      <p class='col-4 d-flex justify-content-start'>
                                                            <label class='align-self-center'>Quantité : </label>
                                                            <input class='ml-3 w-50 form-control text-center' type="number" step='1' value='1' readonly onfocus="this.removeAttribute('readonly');">
                                                      </p>

                                                      <p class='col-4 d-flex justify-content-end'>
                                                            <button data-cle='<?php echo $data['ID_plat']; ?>' class='ajouter_plat btn btn-dark' type='button'>
                                                                  <i class="fas fa-cart-plus mr-2"></i>
                                                                  <span>Ajouter</span>
                                                            </button>
                                                      </p>
                                                </div>
                                                <div class='d-flex justify-content-start border-bottom p-3'>
                                                      <p class='col-4'>
                                                            <label>Prix : </label>
                                                            <span class='font-weight-bold text-dark'><?php echo $data['Prix']; ?> €</span>
                                                      </p>

                                                      <p class='col-4'>
                                                            <label>Origine : </label>
                                                            <span class='text-dark'><?php echo $data['Origine']; ?></span>
                                                      </p>
                                                </div>
                                                <div class='d-flex justify-content-start p-3'>
                                                      <p class='col-10 '>
                                                            <label class='font-weight-bold'>Ingrédients : </label>
                                                            <span class='text-dark'><?php echo $data['Ingredient2']; ?></span>
                                                      </p>
                                                </div>

                                          </div>

                                    </div>
                        <?php
                              }
                        }
                        ?>

                  </div>
            </section>

            <!-- //////////////////////////////////////////////////////////////////////// -->
            <!-- ////////////////////// SECTION COMMANDES /////////////////////////////// -->
            <!-- //////////////////////////////////////////////////////////////////////// -->

            <section id='sctCommande'>
                  <?php
                  include('bdd_sql/sql_retrieve_commande.php');
                  $exec_requete_commande = mysqli_query($db, $req_commande);

                  while ($data = mysqli_fetch_assoc($exec_requete_commande)) {
                        ?>
                        <div class='mb-3'>
                              <div class='col-12 border-bottom mb-3'>
                                    <div class='col-10 m-auto rounded py-2 d-flex justify-content-around'>
                                          <p>
                                                <span> <b>Commande n° :</b> </span><span class='text-primary'>CN300<?php echo $data['N_Com']; ?></span>
                                          </p>
                                          <p>
                                                <span class='font-weight-bold'>Total : </span>
                                                <span><?php echo $data['Total_Com']; ?></span>
                                          </p>
                                          <p>
                                                <span class='font-weight-bold'>Date : </span>
                                                <span><?php echo $data['Date']; ?></span>
                                          </p>

                                          <p>
                                                <button data-cle='<?php echo $data['N_Com']; ?>' class='details-commande btn btn-dark font-weight-bold' type='button'>Détails</button>
                                          </p>
                                    </div>
                              </div>
                        </div>

                  <?php
                  }

                  ?>
            </section>

            <!-- //////////////////////////////////////////////////////////////////////// -->
            <!-- //////////////////////// Section DETAILS COMMANDE ////////////////////// -->
            <!-- //////////////////////////////////////////////////////////////////////// -->

            <section id='sctDetailsCommande' class='border border-dark rounded mb-5'>
                  <div class='p-3 col-6 m-auto'>
                        <a id='retour_commande' class="p-2 btn btn-dark text-center text-light col-12">
                              <i class="fas fa-list"></i>
                              <span class="pl-2">Retourner à la liste de <b>Commande</b></span>
                        </a>
                  </div>
                  <div id='injectDetailsCommande' class='p-4'></div>
            </section>

            <!-- //////////////////////////////////////////////////////////////////////// -->
            <!-- //////////////////////// Section PANIER //////////////////////////////// -->
            <!-- //////////////////////////////////////////////////////////////////////// -->

            <section id='sctPanier' class='border border-dark rounded'>
                  <div id='insertPanier' class='text-center'>

                  </div>
            </section>
            <!-- //////////////////////////////////////////////////////////////////////// -->
            <!-- ///////////////////////// Section PROFIL /////////////////////////////// -->
            <!-- //////////////////////////////////////////////////////////////////////// -->

            <section id='sctProfil' class='border border-dark rounded'>
                  <div class='text-center'>
                        <div class='d-sm-flex p-4'>
                              <div class='border p-4 col-sm-6'>
                                    <p id='pseudoCompte' class='col-12 border-bottom pb-3 font-weight-bold'></p>
                                    <div class='mt-3 align-self-end'>
                                          <p id='reponseUpdateMail' class='text-center mb-3 font-weight-bold'></p>
                                          <p id='mailCompte' class='font-italic pb-4 row justify-content-center'></p>

                                          <p>
                                                <a id='majMail' role='button' class='text-dark' href=''>Mettre à jour mon mail</a>
                                          </p>
                                    </div>
                                    <p class='col-12 border-top mt-4 mb-0 pt-3'>
                                          <span id='reponseDelete' class='font-weight-bold text-danger col-12 mt-4 pt-3'></span>
                                          <p class='pb-3'>
                                                La suppression de votre compte sera définitive. <br>
                                                Aucunes des données de votre compte ne seront sauvegardées.
                                          </p>

                                          <a id='btnDeleteCompte' role='button' class='text-danger' href=''>
                                                <i class="fas fa-trash-alt pr-3"></i>
                                                <span>Supprimer mon compte</span>
                                          </a>

                                          <p id='txtPasswordDelete' class='mt-3'>
                                                <input id='txtCheckDelete' class='form-control mb-3' type="password" placeholder="Votre mot de passe actuel" autocomplete="false" readonly onfocus="this.removeAttribute('readonly');">
                                                <input id='btnDelete' class='btn btn-dark col-6' type="submit" value='Confirmer'>
                                          </p>
                                    </p>

                              </div>

                              <div class='p-4 m-auto col-sm-6'>
                                    <p id='reponseUpdate' class='text-center mb-3 font-weight-bold'></p>

                                    <p class='mx-auto align-self-start'>
                                          <a role='button' id='majPassword' class='btn btn-dark text-light'>Mettre à jour mon mot de passe</a>
                                    </p>
                                    <div id='UpdatePassword' class='border rounded p-4 col-10 m-auto'>
                                          <form>
                                                <input id='txtCheckPassword' class='form-control mb-3' type="password" placeholder="Votre mot de passe actuel" autocomplete="false" readonly onfocus="this.removeAttribute('readonly');">
                                                <input id='txtUpdatePassword' class='form-control mb-3' type="password" placeholder="Votre nouveau mot de passe" autocomplete="false" readonly onfocus="this.removeAttribute('readonly');">
                                                <input id='txtUpdatePassword2' class='form-control mb-3' type="password" placeholder="Confirmez votre nouveau mot de passe" autocomplete="false" readonly onfocus="this.removeAttribute('readonly');">
                                                <input id='btnUpdatePassword' class='btn btn-dark col-6' type="submit" value='Confirmer'>
                                          </form>
                                    </div>
                              </div>


                        </div>
                  </div>

            </section>

      </article>

</body>

</html>

<div class='border-bottom border-dark p-3 d-flex'>
      <div class='col-2 align-center my-auto'>
            <p> <img src='" + tbl_value[6] + "' width='100%'> </p>
      </div>div class='col-10'> <div class='d-flex justify-content-between border-bottom p-3'>
            <p class='col-4'> <span class='font-weight-bold'>" + tbl_value[1] + "</span> <span class='text-secondary'>" + tbl_value[5] + "g</span> </p>
            <p class='col-4 d-flex justify-content-start'> <label class='align-self-center'> Quantité: </label> <input class='ml-3 w-50 form-control text-center' type='number' step='1' value='" + tbl_value[7] + "' readonly onfocus='this.removeAttribute(' readonly');'> </p>
            <p class='col-4 d-flex justify-content-end'> <button data - cle='" + tbl_value[0] + "' class='ajouter_plat btn btn-dark' type='button'> <i class='fas fa-cart-plus mr-2'> </i> <span>Ajouter</span> </button> </p>
      </div>
      <div class='d-flex justify-content-start border-bottom p-3'>
            <p class='col-4'> <label>Prix : </label> <span class='font-weight-bold text-dark'> " + tbl_value[4] + "€ </span> </p>
      </div>/div >
</div>

<!-- <div class='border-bottom border-dark p-3 d-flex'>
      <div class='col-2 align-center my-auto'>
            <p>
                  <img src='" + tbl_value[6] + "' width='100%'>
            </p>
      </div>
      <div class='col-10'>
            <div class='d-flex justify-content-between border-bottom p-3'>
                  <p class='col-4'>
                        <span class='font-weight-bold'>" + tbl_value[1] + "</span> 
                        <span class='text-secondary'>" + tbl_value[5] + "g</span>
                  </p>

                  <p class='col-4 d-flex justify-content-start'>
                        <label class='align-self-center'>Quantité : </label>
                        <input class='ml-3 w-50 form-control text-center' type="number" step='1' value='" + tbl_value[7] + "' readonly onfocus='this.removeAttribute('readonly');'>
                  </p>

                  <p class='col-4 d-flex justify-content-end'>
                        <button data-cle='" + tbl_value[0] + "' class='ajouter_plat btn btn-dark' type='button'>
                              <i class="fas fa-cart-plus mr-2"></i>
                              <span>Ajouter</span>
                        </button>
                  </p>
            </div>
            <div class='d-flex justify-content-start border-bottom p-3'>
                  <p class='col-4'>
                        <label>Prix : </label>
                        <span class='font-weight-bold text-dark'>" + tbl_value[4] + "€</span>
                  </p>
            </div>
      </div>
</div> -->