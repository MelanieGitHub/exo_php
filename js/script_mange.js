$(document).ready(function() {
    $('#sctSearch').slideDown('slow');
    $('#sctAffichage').slideDown('slow');

    // /////////////////////////////////////////////////////////////////////////
    // ///////////////// Retrieve COMPTE Utilisateur ///////////////////////////
    // /////////////////////////////////////////////////////////////////////////

    var user_name = $('#txtUserConnexion').html();
    console.log(user_name)

    //Connexion bdd avec ajax s'ouvre au demarrage ajax, se ferme à la fin ajax
    $.ajax({
        url: 'action/retrieve_user.php',
        type: 'GET',
        data: { name: user_name },
        success: function(data, statut) {
            console.log('Data :' + data);
            let cpt = 0;
            let tbl = [];

            for (let i = 0; i < data.length; i++) {

                if (data[i] == '"') {
                    tbl.push(i);
                }

                if (cpt == data.length - 1) {
                    let id = data.substring(tbl[2] + 1, tbl[3]);
                    let pseudo = data.substring(tbl[6] + 1, tbl[7]);
                    let mail = data.substring(tbl[10] + 1, tbl[11]);

                    $('#idCompte').attr('data-id-user', id);
                    $('#pseudoCompte').html(pseudo);
                    $('#mailCompte').html(mail);
                } else {
                    cpt++;
                }
            }
        },
        error: function(resultat, statut, erreur) {
            console.log('Erreur lors de la récupération des données du compte utilisateur.');
        }
    });

    // /////////////////////////////////////////////////////////////////////////
    // //////////////////////// Search BUTTON /////////////////////////////
    // /////////////////////////////////////////////////////////////////////////

    $('#cmdSearch_mot').on('click', function(event) {
        event.preventDefault();
        $('aside').hide(0);
        $('#asideMot').slideDown('slow');
    });

    $('#cmdSearch_prix').on('click', function(event) {
        event.preventDefault();
        $('aside').hide(0);
        $('#asidePrix').slideDown('slow');
    });

    $('#cmdSearch_origine').on('click', function(event) {
        event.preventDefault();
        $('aside').hide(0);
        $('#asideOrigine').slideDown('slow');
    });

    $('#cmdSearch_ingredient').on('click', function(event) {
        event.preventDefault();
        $('aside').hide(0);
        $('#asideIngredient').slideDown('slow');
    });

    /////////////////////////////////////////////////////////////////////////
    //////////////////////// PROFIL Utilisateur /////////////////////////////
    /////////////////////////////////////////////////////////////////////////

    $('#lk_Commande').on('click', function(event) {
        event.preventDefault();
        $('section').hide(0);
        $('#sctCommande').show('slow');
    });


    /////////////////////////////////////////////////////////////////////////
    //////////////////////// PROFIL Utilisateur /////////////////////////////
    /////////////////////////////////////////////////////////////////////////

    $('#lk_Profil').on('click', function(event) {
        event.preventDefault();
        $('section').hide(0);
        $('#sctProfil').show('slow');
    });

    ///////////////// Mot de passe /////////////////////////////

    $('#majPassword').on('click', function(event) {
        event.preventDefault();
        let visibility = $('#UpdatePassword').css('display');

        if (visibility == 'none') {
            $('#UpdatePassword').slideDown('slow');
        } else {
            $('#UpdatePassword').slideUp('slow');
        }
    });

});