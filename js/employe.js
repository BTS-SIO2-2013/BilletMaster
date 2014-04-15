$(function(){
	$("#btnCU").click(function() {
		valid = true;
		var nom = $('#nomInput').val();
		if (nom == "") {
			$('#nomInput').css("border-color","#FF0000");
			$('#nom').next(".message-erreur").fadeIn().text("Veuillez entrer un nom");
			valid = false;
		}
		var prenom = $('#prenomInput').val();
		if (prenom == "") {
			$('#prenomInput').css("border-color","#FF0000");
			$('#prenom').next(".message-erreur").fadeIn().text("Veuillez entrer un prenom");
			valid = false;
		}
		var login = $('#loginInput').val();
		if (login == "") {
			$('#loginInput').css("border-color","#FF0000");
			$('#login').next(".message-erreur").fadeIn().text("Veuillez entrer un login");
			valid = false;
		}
		var tel = $('#telInput').val();
		if (tel == "") {
			$('#telInput').css("border-color","#FF0000");
			$('#telephone').next(".message-erreur").fadeIn().text("Veuillez entrer un numero de telephone");
			valid = false;
		}
		var mail = $('#mailInput').val();
		if ((!(mail.indexOf("@")>=0))||(!(mail.indexOf(".")>=0))) {
			$('#mailInput').css("border-color","#FF0000");
			$('#mail').next(".message-erreur").fadeIn().text("Veuillez entrer une adresse mail valide");
			valid = false;
		}
		var mdp = $('#mdpInput').val();
		if (mdp == "" || mdp.length() < 7) {
			$('#mdpInput').css("border-color","#FF0000");
			$('#mdp').next(".message-erreur").fadeIn().text("Veuillez entrer un mot de passe de 8 caractères au minimum");
			valid = false;
		}
	return valid;
	});
});
