$(function(){
	$('[data-role=evenementModif]').click(function() {
		var valEvenement = $(this).prop('name');
		if(valEvenement != ''){
			$.ajax({
			type: "POST",
			url: "modifEvenement.php",
			data: "idEvenement="+valEvenement,
			success: function(option){
				$('#modifEvenement').html(option);
					}
			  	});
			  	}
			});
})
