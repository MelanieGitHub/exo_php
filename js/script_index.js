$(document).ready(function() {
    // if (/erreur=3/.test(window.location.href))
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

    $("#inscription").click(function(event) {
        event.preventDefault();

        $('#div_lien_connexion').hide(0);
        $('#div_lien_inscription').show(0);

        $('section').hide(0);
        $('#sctInscription').slideDown();

        $('#txtInscriptionPseudo').focus();
    });

    $("#connexion").click(function(event) {
        event.preventDefault();

        $('#div_lien_inscription').hide(0);
        $('#div_lien_connexion').show(0);

        $('section').hide(0);
        $('#sctConnexion').slideDown();

        $('#txtConnexionPseudo').focus();
    });
});