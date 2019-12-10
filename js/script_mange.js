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
        let panier = [];
        // console.log(sessionStorage.length)

        for (let i = 0; i < sessionStorage.length; i++) {
            panier.push(sessionStorage.getItem(sessionStorage.key(i)));
        }

        console.log('PANIER : ');
        console.log(panier);

        // let tbl_manip = [];
        // for (let i = 0; i <item.length; i++) {
        //     if (item[i] == ',') {
        //         tbl_manip.push(i);
        //     }
        // }
        $('#insertPanier').empty();

        let tbl_manip = [];
        let cpt = 0;
        for (let elem of panier) {

            console.log('\n\nElement :');
            console.log(elem);

            let string = JSON.stringify(elem);
            var tbl_value = string.split(',');
            console.log('Image');
            console.log(tbl_value[6]);
            $('#insertPanier').append("<div class='border-bottom border-dark p-3 d-flex'><div class='col-2 align-center my-auto'> <p>   <img src='" + tbl_value[6] + "' width='100%'> </p></div><div class='col-10'> <div class='d-flex justify-content-between border-bottom p-3'>   <p class='col-4'> <span class='font-weight-bold'>" + tbl_value[1] + "</span>  <span class='text-secondary'>" + tbl_value[5] + "g</span>   </p> <p class = 'col-4 d-flex justify-content-start' > <label class = 'align-self-center' > Quantité: </label> <input class='ml-3 w-50 form-control text-center' type='number' step='1' value='" + tbl_value[7] + "' readonly onfocus='this.removeAttribute('readonly');'> </p ><p class = 'col-4 d-flex justify-content-end' > <button data - cle = '" + tbl_value[0] + "'class = 'ajouter_plat btn btn-dark'type = 'button' > <i class = 'fas fa-cart-plus mr-2' > </i> <span>Ajouter</span > </button> </p ></div>     <div class='d-flex justify-content-start border-bottom p-3'>           <p class='col-4'>                 <label>Prix : </label > <span class = 'font-weight-bold text-dark' > " + tbl_value[4] + "€ </span>           </p > </div>/div > </div>")



            // for (let i = 0; i <elem.length; i++) {
            //     if (elem[i] == ',') {
            //         tbl_manip.push(i);
            //     }
            // }

            // for (let i = 0; i <tbl_manip.length; i++) {
            //     let data = elem.substr(tbl_manip[cpt], i);
            //     console.log(data)
            //     cpt++
            // }

            // // let data = elem.substr(tbl_manip[cpt], i);
            // // console.log(data)
            // // cpt++

            // console.log('\n\nTableau : ');
            // console.log(tbl_manip)
        }

        // let tbl_object = [];


        // for (let i = 0; i <tbl_manip.length; i += 7) {
        //     tbl_object.push(tbl_manip.slice(i, i + 7));
        //     console.log(tbl_object)
        // }

        // // console.log('Tableau : ');
        // // console.log(tbl_manip)

        // for (let i = 0; i <tbl_manip.length; i++) {
        //     tbl_manip[i];

        // }
    });

    // let pg = $('<p></p>');
    // pg.html(champs + '<br>')
    // $('#insertPanier').append(pg);

    /////////////////////////////////////////////////////////////////////////
    //////////////////////// AJOUTER au PANIER //////////////////////////////
    /////////////////////////////////////////////////////////////////////////

    $('.ajouter_plat ').on('click', function(event) {
        event.preventDefault();

        let id_plat = $(this).attr('data-cle');
        let quantite = $('input[data-cle=' + id_plat + ']').val();

        $.ajax({
            url: 'action/retrieve_plat.php',
            type: 'GET',
            data: {
                id: id_plat
            },
            success: function(data, statut) {
                let details_tbl = $.parseJSON(data);

                details_tbl.push(quantite);

                if (sessionStorage.getItem("plat" + id_plat)) {
                    let item = sessionStorage.getItem("plat" + id_plat);
                    let tbl_manip = [];
                    for (let i = 0; i < item.length; i++) {
                        if (item[i] == ',') {
                            tbl_manip.push(i);
                        }
                    }
                    let quantite_before = item.substring(tbl_manip[6] + 1, item.length);
                    let new_quantite = parseInt(quantite) + parseInt(quantite_before);
                    details_tbl.pop();
                    details_tbl.push(new_quantite);
                    sessionStorage.setItem("plat" + id_plat, details_tbl);
                } else {
                    sessionStorage.setItem("plat" + id_plat, details_tbl);
                }
            },
            error: function(resultat, statut, erreur) {
                console.log('Erreur lors de l\'ajout au panier.');
            }
        });
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