$(document).ready(function() {
    $('#sctSearch').slideDown('slow');
    $('#sctAffichage').slideDown('slow');

    // /////////////////////////////////////////////////////////////////////////
    // ///////////////// Retrieve COMPTE Utilisateur ///////////////////////////
    // /////////////////////////////////////////////////////////////////////////

    //Connexion bdd avec ajax s'ouvre au demarrage ajax, se ferme à la fin ajax
    $.ajax({
        url: 'action/retrieve_user.php',
        type: 'GET',
        success: function(data, statut) {
            //Use JSON 
            let message = 'user'

            Unserialize_Object(data, message);
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
                console.log(data);
                console.log(statut);
                // let message = 'commande';
                // Unserialize_Object(data, message);
                let cpt = 0;
                let tbl = [];

                for (let i = 0; i < data.length; i++) {

                    if (data[i] == ';') {
                        tbl.push(i);
                    }

                    if (cpt == data.length - 1) {
                        // Retrieve_Object(data, tbl, message);
                        let nom = data.substring(tbl[0] + 1, tbl[1]);
                        let comm = data.substring(tbl[2] + 1, tbl[3]);
                        let quantite = data.substring(tbl[4] + 1, tbl[5]);
                        let prix = data.substring(tbl[6] + 1, tbl[7]);
                        let total = data.substring(tbl[8] + 1, tbl[9]);

                        console.log('Nom : ' + nom)
                        console.log('commande : ' + comm) //1
                        console.log('quantite : ' + quantite) //1
                        console.log('prix : ' + prix) //15.99
                        console.log('total : ' + total) //15.99

                        let nom2 = data.substring(tbl[10] + 1, tbl[11]);
                        let comm2 = data.substring(tbl[12] + 1, tbl[13]);
                        let quantite2 = data.substring(tbl[14] + 1, tbl[15]);
                        let prix2 = data.substring(tbl[16] + 1, tbl[17]);
                        let total2 = data.substring(tbl[18] + 1, tbl[19]);

                        console.log('Nom : ' + nom2)
                        console.log('commande : ' + comm2) //1
                        console.log('quantite : ' + quantite2) //1
                        console.log('prix : ' + prix2) //15.99
                        console.log('total : ' + total2) //15.99
                    } else {
                        cpt++;
                    }
                }


            },
            error: function(resultat, statut, erreur) {
                console.log('Erreur lors de la mise à jour des données du compte utilisateur.');
            }
        });
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

    $('#btnUpdatePassword').on('click', function(event) {
        event.preventDefault();

        let user_password = $('#txtUpdatePassword').val();
        let user_password2 = $('#txtUpdatePassword2').val();
        let user_check_password = $('#txtCheckPassword').val();
        let user_id = $('#pseudoCompte').attr('data-id-user');
        let element = 'Password';

        //Connexion bdd avec ajax s'ouvre au demarrage ajax, se ferme à la fin ajax

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

    ///////////////// Mail /////////////////////////////

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

            //Connexion bdd avec ajax s'ouvre au demarrage ajax, se ferme à la fin ajax

            $.ajax({
                url: 'action/update_password.php',
                type: 'POST',
                data: {
                    element: element,
                    id: user_id,
                    mail: user_mail
                },
                success: function(data, statut) {
                    console.log(data);

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
                //Connexion bdd avec ajax s'ouvre au demarrage ajax, se ferme à la fin ajax

            $.ajax({
                url: 'action/delete_compte.php',
                type: 'POST',
                data: {
                    id: user_id,
                    check: user_check
                },
                success: function(data, statut) {
                    console.log(data + ' - ' + statut);

                    if (data == 'invalide') {
                        $('#reponseDelete').html('Mot de passe incorrect.');
                    } else {
                        alert('Suppression réussi !')
                        $(location).attr('href', 'index.php');
                    }
                },
                error: function(resultat, statut, erreur) {
                    console.log('Erreur lors de la mise à jour des données du compte utilisateur.');
                }
            });
        });
    });

});


function Unserialize_Object(data, message) {
    let cpt = 0;
    let tbl = [];

    for (let i = 0; i < data.length; i++) {

        if (data[i] == '"') {
            tbl.push(i);
        }

        if (cpt == data.length - 1) {
            console.log(message)
            Retrieve_Object(data, tbl, message);
        } else {
            cpt++;
        }
    }
}

function Retrieve_Object(data, tbl, message) {

    switch (message) {
        case 'user':
            let id = data.substring(tbl[2] + 1, tbl[3]);
            let pseudo = data.substring(tbl[6] + 1, tbl[7]);
            let mail = data.substring(tbl[10] + 1, tbl[11]);

            $('#pseudoCompte').attr('data-id-user', id);
            $('#pseudoCompte').html(pseudo);
            $('#mailCompte').html(mail);
            break;

        case 'commande':
            console.log('\n>>>>>>>>>>>> message : COMMANDE <<<<<<<<<<<<<<\n\n');
            console.log(data)
            console.log(tbl)
            let nom = data.substring(tbl[2] + 1, tbl[3]);
            let comm = data.substring(tbl[6] + 1, tbl[7]);
            let quantite = data.substring(tbl[10] + 1, tbl[11]);
            let prix = data.substring(tbl[14] + 1, tbl[15]);
            let total = data.substring(tbl[16] + 1, tbl[17]);

            console.log(nom)
            console.log(comm) //1
            console.log(quantite) //1
            console.log(prix) //15.99
            console.log(total) //15.99
            break;

        default:
            console.log('Erreur on function Retrieve_Object()')
            break;
    }

}

// a: 10: { i: 0;s: 19: "Blanquette de dinde";i: 1;i: 1;i: 2;i: 1;i: 3;d: 15.99;i: 4;d: 15.99;i: 5;s: 14: "Dorade au four";i: 6;i: 1;i: 7;i: 2;i: 8;d: 19.4;i: 9;d: 38.8; }