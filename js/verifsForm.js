function passwordStrength(password)
	{
		var desc = new Array();
		desc[0] = "Trop faible";
		desc[1] = "Faible";
		desc[2] = "Moyen";
		desc[3] = "Bon";
		desc[4] = "Fort";
		desc[5] = "Excellent";

		var score   = 0;

		// Doit contenir au moins 8 caractères
		// TO DO - Interdir Espaces //
		if (password.length > 7) {
			score++;

			// Contient association minuscule ET majuscule = 1 point
			if ((password.match(/[a-z]/)) && (password.match(/[A-Z]/))) score++;

			// Au moins 1 nombre = 1 point
			if (password.match(/\d+/)) score++;

			// Au moins 1 caractère spécial
			if (password.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/)) score++;

			// Au moins 13 caractères
			if (password.length > 12) score++;
		}

		document.getElementById("passwordDescription").innerHTML = desc[score];
		document.getElementById("passwordStrength").className = "strength" + score;
	}


$(function(){

	// $( "input[name='telephone']" ).blur(function() {
	// 	var mdp = $('#telInput').val();
	// 	if (mdp.match(/^0[1-9][0-9]{8}$/)) {
	// 		$('#telInput').css("border-color","#FF0000");
	// 		$('#telephone').next(".message-erreur").fadeIn().text("Téléphone non valide");
	// 		valid = false;
	// 	}
	// 	else {
	// 		$(this).css("border-color","#000000");
	//     	$(this).parent().next('.message-erreur').fadeOut();
	//     	valid = true;
	// 	}
	// });





	$("#btnCU").click(function() {
		valid = true;
		var nom = $('#nomInput').val();
		if (nom == "") {
			$("#nom").next(".message-erreur").fadeOut();
			$('#nom').css("border-color","#FF0000");
			$("#nom").next(".message-erreur").fadeIn().text("Merci d'entrer le nom");
			valid = false;
		}
		else {
			$("#nom").next(".message-erreur").fadeOut();
			$('#nom').css("border-color","#228B22");
		}
		var prenom = $('#prenomInput').val();
		if (prenom == "") {
			$("#prenom").next(".message-erreur").fadeOut();
			$('#prenom').css("border-color","#FF0000");
			$("#prenom").next(".message-erreur").fadeIn().text("Merci d'entrer le prenom");
			valid = false;
		}
		else {
			$("#prenom").next(".message-erreur").fadeOut();
			$('#prenom').css("border-color","#228B22");
		}
		var login = $('#loginInput').val();
		if (login == "") {
			$("#login").next(".message-erreur").fadeOut();
			$('#login').css("border-color","#FF0000");
			$("#login").next(".message-erreur").fadeIn().text("Merci d'entrer le login");
			valid = false;
		}
		else {
			$("#login").next(".message-erreur").fadeOut();
			$('#login').css("border-color","#228B22");
		}
		var mdp = $('#mdpInput').val();
		if (mdp == "") {
			$("#mdp").next(".message-erreur").fadeOut();
			$('#mdp').css("border-color","#FF0000");
			$("#mdp").next(".message-erreur").fadeIn().text("Merci d'entrer le mot de passe");
			valid = false;
		}
		else {
			$("#mdp").next(".message-erreur").fadeOut();
			$('#mdp').css("border-color","#228B22");
		}
		var mail = $('#mailInput').val();
		if (mail == "") {
			$("#mail").next(".message-erreur").fadeOut();
			$('#mail').css("border-color","#FF0000");
			$("#mail").next(".message-erreur").fadeIn().text("Merci d'entrer le mail");
			valid = false;
		} else if (!$("#mailInput").val().match(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i)) {
			$("#mail").next(".message-erreur").fadeOut();
			$('#mail').css("border-color","#FF0000");
			$("#mail").next(".message-erreur").fadeIn().text("Mail incorrect");
			valid = false;
		}
		else {
			$("#mail").next(".message-erreur").fadeOut();
			$('#mail').css("border-color","#228B22");
		}
		var telephone = $('#telInput').val();
		if (telephone == "") {
			$("#telephone").next(".message-erreur").fadeOut();
			$('#telephone').css("border-color","#FF0000");
			$("#telephone").next(".message-erreur").fadeIn().text("Merci d'entrer le telephone");
			valid = false;
		}
		else {
			$("#telephone").next(".message-erreur").fadeOut();
			$('#telephone').css("border-color","#228B22");
		}
		return valid;
	});

});