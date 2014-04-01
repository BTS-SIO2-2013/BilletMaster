<html>
<head>

</head>
<body>

<form action="includes/cuEmploye.php" method="post" id="formCU">
		
		<p>	
			<label for="pass">Password</label><input type="password" name="pass" id="pass" onkeyup="passwordStrength(this.value)"/>
			 
		</p>
		<p>
			<label for="passwordStrength">Force</label>
			<div id="passwordDescription">Mot de passe non renseigné</div>
			<div id="passwordStrength" class="strength0"></div>
		</p>
		<p>	
		<input type="submit" name="submit" id="submit" value="Register">
		</p>
</form>	
<style>


#passwordStrength
{
	height:10px;
	display:block;
	float:left;
}

.strength0
{
	width:250px;
	background:#cccccc;
}

.strength1
{
	width:50px;
	background:#ff0000;
}

.strength2
{
	width:100px;	
	background:#ff5f5f;
}

.strength3
{
	width:150px;
	background:#56e500;
}

.strength4
{
	background:#4dcd00;
	width:200px;
}

.strength5
{
	background:#399800;
	width:250px;
}


</style>
</style>

<script>
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

	//if password bigger than 6 give 1 point
	if (password.length > 7) score++;

	//if password has both lower and uppercase characters give 1 point	
	if ( ( password.match(/[a-z]/) ) && ( password.match(/[A-Z]/) ) ) score++;

	//if password has at least one number give 1 point
	if (password.match(/\d+/)) score++;

	//if password has at least one special caracther give 1 point
	if ( password.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/) )	score++;

	//if password bigger than 12 give another 1 point
	if (password.length > 12) score++;

	 document.getElementById("passwordDescription").innerHTML = desc[score];
	 document.getElementById("passwordStrength").className = "strength" + score;
}
</script>
</body>
</html>
