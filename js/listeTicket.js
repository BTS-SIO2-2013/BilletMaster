$(document).ready(function(){

    //affiche le formulaire nouveau ticket au clique du bouton nouveau
    $('#ticketNew').click(function(event){
        $("#ajoutTicket").slideDown();
        $('#modifTicket').slideUp();
        $('#ticketNew').slideUp();
    });

    /*//génère le qrcode pour le ticket selectionné
    $('[data-role=QRCodeGenerator]').click(function(){
        var idTicket = $(this).attr('name');
        $.ajax({
            type: "POST",
            url: "QRCodeTicket.php",
            data: "idTicket="+idTicket
        });
    });*/

    //affiche le formulaire nouveau ticket au clique du bouton nouveau
    $('[data-role=ticketModif]').click(function(event){
        $("#ajoutTicket").slideUp();
        $('#modifTicket').slideDown();
        $('#ticketNew').slideDown();
    });

    //bouton modifie ticket
    $('[data-role=ticketModif]').click(function() {
        var valTicket = $(this).prop('name'); //récupère le name de du ticket selectionner
        if(valTicket != ''){ //verifie si le name est vide
            $.ajax({ //appel de l'ajax
                type: "POST", //envoie des infos en POST
                url: "modifTicket.php", //envoi des infos a la page modifTicket.php
                data: "idTicket="+valTicket, //transmet le paramatre idTicket récupérer par le nom
                success: function(option){ // je récupère la réponse du fichier PHP
                    $('#modifTicket').html(option); //affiche le formulaire de modification de la div modif_Ticket
                }
            });
        }
    });

    //bouton del ticket
    $('[data-role=ticketDel]').click(function() {
        var valTicket = $(this).prop('name'); //récupère le name de du ticket selectionner
        if(valTicket != ''){ //verifie si le name est vide
            $.ajax({ //appel de l'ajax
                type: "POST", //envoie des infos en POST
                url: "delUnTicket.php", //envoi des infos a la page modifTicket.php
                data: "idTicket="+valTicket, //transmet le paramatre idTicket récupérer par le nom
                success: function(option){ // je récupère la réponse du fichier PHP
                    location.reload();
                }
            });
        }
    });

    //bouton supprimer les tickets des checkbox

    $('#infoListeTicket').submit(function(event) {
        var idTicket = $('#idTicket').val(); // je récupère les valeurs des id des checkboxs

            $.ajax({ // appel Ajax
                type: "POST", //envoie des infos en POST
                url: "delLesTickets.php", //envoi des infos a la page modifTicket.php
                data: $(this).serialize(), //transmet toutes les ids des checkboxs sélectionnés 
                success: function(option) { // je récupère la réponse du fichier PHP
                    location.reload();
                }
            });
            event.preventDefault();
            return false; // j'empêche le navigateur de soumettre lui-même le formulaire
        
        /*else{
            if($('#messageErreur').is(":visible")){
                $('#messageErreur').html("Sélectionné au moins un ticket!");
            }
            else{
                $('#messageErreur').toggle();
                $('#messageErreur').html("Sélectionné au moins un ticket!");
            }
            return false; // j'empêche le navigateur de soumettre lui-même le formulaire
        }*/

    });

});