<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Mange</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="fichiers/ico_ff.ico" />

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Yanone+Kaffeesatz:300&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Yanone+Kaffeesatz:700&display=swap">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"> </script>
    <script src="https://kit.fontawesome.com/1cf86c30d1.js"></script>

    <script src='js/script_forum.js'></script>

    <link rel="stylesheet" href="css/style_forum.css?<?php echo filemtime('css/style_forum.css'); ?>">
</head>

<body class="bg-light">

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


</body>

</html>