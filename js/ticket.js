$(document).ready(function(){
    $('.dateTime').datetimepicker({
        lang:'fr',
        format:'d/m/Y H:i:s'
    });

    //masque les formulaires au choix d'un évenement
    $('#listeEvenement').change(function(event){
        $('#ajoutTicket').slideUp();
        $('#modifTicket').slideUp();
    });

    $('#listeEvenement').change(function() { //récupère la liste en fonction de la liste déroulante
        var valEvenement = $(this).val(); //récupération de value de l'option
        
        if(valEvenement != ''){
            $.post("/BilletMaster/modules/ticket/infosTickets.php", "idEvenement="+valEvenement, function(option){
                    $('#listeTickets').html(option);
            }).fail(function(){
                $('#listeTickets').html('Erreur lors de l\'affichage');
            });
        }
    });

    //affiche le formulaire nouveau ticket au clique du bouton nouveau
        $('#ticketNew').click(function(event){
            $("#ajoutTicket").slideDown();
            $('#modifTicket').slideUp();
            $('#ticketNew').slideUp();
        });

        //affiche la liste des tickets
        var evenement = '<?php echo $evenement; ?>' ;
        if(evenement != ''){
            $.ajax({
              type: "POST",
              url: "listeTicket.php",
              dataType: "html",
              data: "idEvenement="+evenement,
              success: function(_html){
                 $('#listeTicket').html(_html);
              }
            });
        }


        //bouton lajouter ticket
        $('#newTicket').submit(function(event) {
              // je récupère les valeurs
            var evenementId = $('#evenementId').val();
            var numero = $('#numero').val();
            var libelle = $('#libelle').val();
            var etat = $('#etat').val();
            var dateValidation = $('#dateValidation').val();
            var idUtilisateur = $('#idUtilisateur').val();

                // je vérifie une première fois pour ne pas lancer la requête HTTP
            // si je sais que mon PHP renverra une erreur
            if(numero === '' || libelle === '' || etat === '') {
                if($('#messageErreur').is(":visible")){
                    $('#messageErreur').html("Veuillez remplir tous les champs obligatoires !");
                }
                else{
                    $('#messageErreur').toggle();
                    $('#messageErreur').html("Veuillez remplir tous les champs obligatoires !");
                }
            } else {
                // appel Ajax
                $.ajax({
                    url: "newTicket.php", // le nom du fichier indiqué dans le formulaire
                    type: "POST", // la méthode indiquée dans le formulaire (get ou post)
                    data: $(this).serialize(), // je sérialise les données (voir plus loin), ici les $_POST
                    success: function() { // je récupère la réponse du fichier PHP
                        location.reload();
                    }

                });
            }
            event.preventDefault();
            return false; // j'empêche le navigateur de soumettre lui-même le formulaire
          });

});