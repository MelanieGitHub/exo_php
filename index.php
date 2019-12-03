<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Mange ton Php</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/icon_resto.ico" />

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Luckiest+Guy&display=swap">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"> </script>
    <script src="https://kit.fontawesome.com/1cf86c30d1.js"></script>

    <link rel="stylesheet" href="css/style_login.css">

    <script src="js/script_index.js"></script>
</head>


<body>
    <div class="container mt-5">
        <div class='text-center mb-5'>
            <img width='6%' src="images/logo_resto.png" alt="">
            <span class="px-5 font-site logo text-center align-middle">Mange ton Php</span>
            <img width='6%' src="images/logo_resto.png" alt="">
        </div>

        <div id='div_lien_connexion' class='text-center mt-5 mb-4'>
            <h4 class='p-3 text-center border-bottom w-25 m-auto'>Connexion</h4>
            <p>
                <a id='inscription' name='refresh_inscription' class='p-3 d-block text-light' href=''>S'inscrire ?</a>
            </p>
        </div>

        <div id='div_lien_inscription' class='text-center mt-5 mb-4'>
            <h4 class='p-3 text-center border-bottom w-25 m-auto'>Inscription</h4>
            <p>
                <a id='connexion' name='refresh_connexion' class='p-3 d-block text-light' href=''>Se connecter ?</a>
            </p>
        </div>

        <section id='sctConnexion'>
            <!-- zone de connexion -->
            <form action="action/check_connexion.php" method="post" class='col-6 m-auto p-5 bg-light rounded'>
                <div id='refreshSucces'>
                    <?php

                    if (isset($_GET['inscription'])) {
                        $success = $_GET['inscription'];
                        if ($success == 1) {
                            echo "<p class='text-success font-weight-bold text-center mb-4 pt-0 mt-0'>Inscription réussi !</p>";
                        }
                    }

                    ?>
                </div>


                <div class="form-group row">
                    <label id="lblConnexionPseudo" for="txtConnexionPseudo" class="col-sm-4 col-form-label">Pseudo :</label>
                    <div class="col-sm-8">
                        <input id="txtConnexionPseudo" class='form-control mb-3' name='username' type="text" autocomplete="false" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label id="lblConnexionMdp" for="txtConnexionMdp" class="col-sm-4 col-form-label">Mot de passe :</label>
                    <div class="col-sm-8">
                        <input id="txtConnexionMdp" class='form-control mb-3' name='password' type="password" autocomplete="false" readonly onfocus="this.removeAttribute('readonly');" required>
                    </div>
                </div>

                <div class="form-group mb-0">
                    <input id='submit' type="submit" class="mt-3 btn btn-info col-12" name='connexion' value="Accéder au compte">
                </div>
                <div id='refreshErrorC'>

                    <?php

                    if (isset($_GET['erreur'])) {
                        $err = $_GET['erreur'];
                        if ($err == 1 || $err == 2) {
                            echo "<p class='text-danger font-weight-bold text-center mt-3 pb-0 mb-0'>Utilisateur ou mot de passe incorrect</p>";
                        }
                    }

                    ?>
                </div>

            </form>

        </section>



        <section id='sctInscription'>
            <!-- zone d'inscription -->
            <form action="action/check_connexion.php" method="post" class='col-6 m-auto p-5 bg-light rounded'>
                <div class="form-group row">
                    <label id="lblInscriptionPseudo" for="txtInscriptionPseudo" class="col-sm-4 col-form-label">Pseudo :</label>
                    <div class="col-sm-8">
                        <input id="txtInscriptionPseudo" class="form-control" type="text" name="username_i" autocomplete="false" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label id="lblInscriptionMail" for="txtInscriptionMail" class="col-sm-4 col-form-label">E-Mail :</label>
                    <div class="col-sm-8">
                        <input id="txtInscriptionMail" class="form-control" type="mail" name="mail_i" autocomplete="false" readonly onfocus="this.removeAttribute('readonly');" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label id="lblInscriptionMdp" for="txtInscriptionMdp" class="col-sm-4 col-form-label">Mot de passe :</label>
                    <div class="col-sm-8">
                        <input id="txtInscriptionMdp" class="form-control" type="password" name="password_i" autocomplete="false" readonly onfocus="this.removeAttribute('readonly');" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label id="lblInscriptionMdp2" for="txtInscriptionMdp2" class="col-sm-4 col-form-label">Confirmer mot de passe :</label>
                    <div class="col-sm-8">
                        <input id="txtInscriptionMdp2" class="form-control" type="password" name="password2_i" autocomplete="false" readonly onfocus="this.removeAttribute('readonly');" required>
                    </div>
                </div>

                <div class="form-group mb-0">
                    <input id='submit_i' type="submit" class="mt-3 btn btn-info col-12" name='inscription' value="Confirmer l'inscription">
                </div>
                
                <div id='refreshErrorI'>

                    <?php
                    if (isset($_GET['erreur'])) {
                        $err = $_GET['erreur'];
                        if ($err == 3) {
                            echo "<p class='text-danger font-weight-bold text-center mt-3 pb-0 mb-0'>Format du Mail invalide</p>";
                        }

                        if ($err == 4) {
                            echo "<p class='text-danger font-weight-bold text-center mt-3 pb-0 mb-0'>Format du Pseudo invalide</p>";
                        }

                        if ($err == 5) {
                            echo "<p class='text-danger font-weight-bold text-center mt-3 pb-0 mb-0'>Format du mot de passe invalide</p>";
                        }

                        if ($err == 6) {
                            echo "<p class='text-danger font-weight-bold text-center mt-3 pb-0 mb-0'>Mots de passe différent</p>";
                        }
                    }
                    ?>
                </div>

            </form>

        </section>
    </div>

</body>

</html>