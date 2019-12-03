$(document).ready(function() {

    $('#sctSujets').show('slow');

    /////////////////////////////////////////////////////////////////////////
    ///////////////// Retrieve COMPTE Utilisateur ///////////////////////////
    /////////////////////////////////////////////////////////////////////////

    var user_name = $('#txtUserConnexion').html();

    $.ajax({
        url: 'action/retrieve_user.php',
        type: 'GET',
        data: { name: user_name },
        success: function(data, statut) {
            let cpt = 0;
            let tbl = [];

            for (let i = 0; i < data.length; i++) {

                if (data[i] == '"') {
                    tbl.push(i);
                }

                if (cpt == data.length - 1) {
                    let pseudo = data.substring(tbl[2] + 1, tbl[3]);
                    let mail = data.substring(tbl[6] + 1, tbl[7]);
                    let avatar = data.substring(tbl[14] + 1, tbl[15]);

                    $('#pseudoCompte').html(pseudo);
                    $('#mailCompte').html(mail);
                    $('#avatarCompte').attr('src', avatar);
                } else {
                    cpt++;
                }
            }
        },
        error: function(resultat, statut, erreur) {
            console.log('Erreur lors de la récupération des données du compte utilisateur.');
        }
    });

    /////////////////////////////////////////////////////////////////////////
    //////////////////////// A Propos DU FORUM /////////////////////////////
    /////////////////////////////////////////////////////////////////////////

    $('#lk_About_Forum').on('click', function(event) {
        event.preventDefault();

        $('section').hide(0);
        $('#sctAboutForum').show('slow');
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