$(document).ready(function() {

    let array_error = ["erreur=3", "erreur=4", "erreur=5", "erreur=6"];

    for (let elem of array_error) {
        if (window.location.href.indexOf(elem) > -1) {
            $('#div_lien_connexion').hide(0);
            $('#div_lien_inscription').show(0);

            $('section').hide(0);
            $('#sctInscription').slideDown();

            $('#txtInscriptionPseudo').focus();
        }
    }

    $('#txtConnexionPseudo').focus();

    // link S'inscrire ? 
    $("#inscription").click(function(event) {
        event.preventDefault();

        $('#txtConnexionPseudo').val('');
        $('#txtConnexionMdp').val('');

        $('#refreshErrorI').empty();

        $('#div_lien_connexion').hide(0);
        $('#div_lien_inscription').show(0);

        $('section').hide(0);

        $('#sctInscription').slideDown();

        $('#txtInscriptionPseudo').focus();
    });

    // link Se connecter ? 
    $("#connexion").click(function(event) {
        event.preventDefault();

        $('#txtInscriptionPseudo').val('');
        $('#txtInscriptionMail').val('');
        $('#txtInscriptionMdp').val('');
        $('#txtInscriptionMdp2').val('');

        $('#refreshErrorC').empty();
        $('#refreshSucces').empty();

        $('#div_lien_inscription').hide(0);
        $('#div_lien_connexion').show(0);

        $('section').hide(0);
        $('#sctConnexion').slideDown();

        $('#txtConnexionPseudo').focus();
    });
});