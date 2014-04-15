$(document).ready(function(){
    //affiche la liste des tickets
    var evenement = $('[data-role=evenement]').val() ;
    alert(evenement);
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
});