$(document).ready(function() {
    $('#sctSearch').slideDown('slow');
    $('#sctAffichage').slideDown('slow');

    // /////////////////////////////////////////////////////////////////////////
    // ///////////////// Retrieve COMPTE Utilisateur ///////////////////////////
    // /////////////////////////////////////////////////////////////////////////

    $.ajax({
        url: 'action/retrieve_user.php',
        type: 'GET',
        success: function(data, statut) {
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

                    $('#pseudoCompte').attr('data-id-user', id);
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
    // //////////////////////// ZONE DE RECHERCHE //////////////////////////////
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

    $('#cmdSearch_type').on('click', function(event) {
        event.preventDefault();
        $('aside').hide(0);
        $('#asideType').slideDown('slow');
    });

    $('#cmdSearch_ingredient').on('click', function(event) {
        event.preventDefault();
        $('aside').hide(0);
        $('#asideIngredient').slideDown('slow');
    });

    /////////////////////////////////////////////////////////////////////////
    //////////////////////// Gestion des COMMANDES //////////////////////////
    /////////////////////////////////////////////////////////////////////////

    $('#lk_Commande').on('click', function(event) {
        event.preventDefault();

        $('section').hide(0);
        $('#sctCommande').show('slow');
    });

    $('#retour_commande').on('click', function(event) {
        event.preventDefault();

        $('section').hide(0);
        $('#sctCommande').show('slow');
    });

    /////////////////////////////////////////////////////////////////////////
    //////////////////////// DETAILS des COMMANDES //////////////////////////
    /////////////////////////////////////////////////////////////////////////

    $('.details-commande').on('click', function(event) {
        event.preventDefault();

        let val = $(this).attr('data-cle');

        $('section').hide(0);
        $('#sctDetailsCommande').slideDown('slow');

        $.ajax({
            url: 'action/details_commande.php',
            type: 'GET',
            data: {
                id: val
            },
            success: function(data, statut) {
                let details_tbl = $.parseJSON(data);

                let tbl_object = [];
                $('#injectDetailsCommande').empty();

                for (let i = 0; i < details_tbl.length; i += 7) {
                    tbl_object.push(details_tbl.slice(i, i + 7));

                    $('#injectDetailsCommande').append(" <div class='border-bottom border-dark p-3 '><p><span class='text-danger font-weight-bold'> Supprimer le doublon du numero et du total de la commande</span></p><p><span>Plat : </span><span class='text-primary'>" + details_tbl[i] + "</span></p><p><span>Quantité : </span><span class='text-primary'> " + details_tbl[i + 2] + "</span></p><p><span>Prix : </span><span class='text-primary'> " + details_tbl[i + 3] + "€</span></p><p><span>Total : </span><span class='text-primary'>" + details_tbl[i + 4] + "</span></p><p><span class='text-danger font-italic'>Commande n° : </span><span class='text-primary'>" + details_tbl[i + 1] + "</span></p><p><span class='text-danger font-italic'>Total de la commande : </span><span class='text-primary'>" + details_tbl[i + 5] + "</span></p><p><span>Date de commande : </span><span class='text-primary'>" + details_tbl[i + 6] + "</span></p></div>")
                }
            },
            error: function(resultat, statut, erreur) {
                console.log('Erreur lors de la mise à jour des données du compte utilisateur.');
            }
        });
    });

    /////////////////////////////////////////////////////////////////////////
    //////////////////////// Gestion du PANIER //////////////////////////////
    /////////////////////////////////////////////////////////////////////////

    $('#lk_Panier').on('click', function(event) {
        event.preventDefault();
        $('section').hide(0);
        $('#sctPanier').show('slow');
    });

    /////////////////////////////////////////////////////////////////////////
    //////////////////////// AJOUTER au PANIER //////////////////////////////
    /////////////////////////////////////////////////////////////////////////

    $('.ajouter_plat ').on('click', function(event) {
        event.preventDefault();
        $('section').hide(0);
        $('#sctPanier').show('slow');
    });

    /////////////////////////////////////////////////////////////////////////
    //////////////////////// Gestion de L'UTILISATEUR ///////////////////////
    /////////////////////////////////////////////////////////////////////////

    $('#lk_Profil').on('click', function(event) {
        event.preventDefault();
        $('section').hide(0);
        $('#sctProfil').show('slow');
    });

    /////////////////////////////////////////////////////////////////////////
    /////////////////// MODIFIER PASSWORD de l'utilisateur //////////////////
    /////////////////////////////////////////////////////////////////////////

    $('#majPassword').on('click', function(event) {
        event.preventDefault();
        let visibility = $('#UpdatePassword').css('display');

        if (visibility == 'none') {
            $('#UpdatePassword').slideDown('slow');
        } else {
            $('#UpdatePassword').slideUp('slow');
        }
    });

    $('#btnUpdatePassword').on('click', function(event) {
        event.preventDefault();

        let user_password = $('#txtUpdatePassword').val();
        let user_password2 = $('#txtUpdatePassword2').val();
        let user_check_password = $('#txtCheckPassword').val();
        let user_id = $('#pseudoCompte').attr('data-id-user');
        let element = 'Password';

        $.ajax({
            url: 'action/update_password.php',
            type: 'POST',
            data: {
                element: element,
                id: user_id,
                password: user_password,
                password2: user_password2,
                check: user_check_password
            },
            success: function(data, statut) {
                if (data == 'invalide') {
                    $('#reponseUpdate').removeClass('text-success').addClass('text-danger').html('Mot de passe invalide.');
                } else if (data == 'different') {
                    $('#reponseUpdate').removeClass('text-success').addClass('text-danger').html('Mot de passe différent.');
                } else if (data == 'faux') {
                    $('#reponseUpdate').removeClass('text-success').addClass('text-danger').html('Ancien mot de passe faux.');
                } else {
                    $('#UpdatePassword').slideUp('slow');
                    $('#reponseUpdate').removeClass('text-danger').addClass('text-success').html('Mise à jour réussie');
                }
            },
            error: function(resultat, statut, erreur) {
                console.log('Erreur lors de la mise à jour des données du compte utilisateur.');
            }
        });
    });

    /////////////////////////////////////////////////////////////////////////
    /////////////////// MODIFIER MAIL de l'utilisateur //////////////////////
    /////////////////////////////////////////////////////////////////////////

    $('#majMail').on('click', function(event) {
        event.preventDefault();

        let mail = $('#mailCompte').html();

        $('#mailCompte').empty();

        let input = $('<input>');
        input.addClass('form-control mb-3').attr('type', 'text').attr('id', 'txtUpdateMail').val(mail);

        let button = $('<input>');
        button.addClass('btn btn-dark').attr('id', 'btnUpdateMail').attr('type', 'submit').val('Confirmer');

        $('#mailCompte').append(input);
        $('#mailCompte').append(button);
        input.focus();

        $('#btnUpdateMail').on('click', function(event) {
            event.preventDefault();

            let user_mail = $('#txtUpdateMail').val();
            let user_id = $('#pseudoCompte').attr('data-id-user');
            let element = 'Mail';

            $.ajax({
                url: 'action/update_password.php',
                type: 'POST',
                data: {
                    element: element,
                    id: user_id,
                    mail: user_mail
                },
                success: function(data, statut) {
                    if (data == 'invalide') {
                        $('#reponseUpdateMail').removeClass('text-success').addClass('text-danger').html('Mail invalide.');
                    } else {
                        $('#reponseUpdateMail').removeClass('text-danger').addClass('text-success').html('Mise à jour réussie');
                        $('#mailCompte').empty();
                        $('#mailCompte').html(user_mail);
                    }
                },
                error: function(resultat, statut, erreur) {
                    console.log('Erreur lors de la mise à jour des données du compte utilisateur.');
                }
            });
        });

    });

    $('#btnDeleteCompte').on('click', function(event) {
        event.preventDefault();

        $('#txtPasswordDelete').slideDown('slow');

        $('#btnDelete').on('click', function(event) {
            event.preventDefault();

            let user_id = $('#pseudoCompte').attr('data-id-user');
            let user_check = $('#txtCheckDelete').val()

            $.ajax({
                url: 'action/delete_compte.php',
                type: 'POST',
                data: {
                    id: user_id,
                    check: user_check
                },
                success: function(data, statut) {
                    if (data == 'invalide') {
                        $('#reponseDelete').html('Mot de passe incorrect.');
                    } else {
                        alert('Suppression réussi !')
                        $(location).attr('href', 'index.php');
                    }
                },
                error: function(resultat, statut, erreur) {
                    console.log('Erreur lors de la suppression des données du compte utilisateur.');
                }
            });
        });
    });

});