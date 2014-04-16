$(document).ready(function(){
    //affiche la liste des tickets
    var evenement = $('[name=listeTicket]').data("group") ;
    if(evenement != ''){
        $.ajax({
            type: "POST",
            url: "/BilletMaster/modules/ticket/listeTicket.php",
            dataType: "html",
            data: "idEvenement="+evenement,
            success: function(_html){
                $('#listeTicket').html(_html);
            }
        });
    }
});