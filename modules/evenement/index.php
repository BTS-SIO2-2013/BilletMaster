<?php
	$title = "Evenements"; //titre de la page
	require_once '../../class/Evenement.class.php';
	require_once '../../class/Salle.class.php';
    include $_SERVER['DOCUMENT_ROOT'].'/BilletMaster/header.php';
?>
		

		<div id="bg">
			<div id="hautPage">
	            <div id="titre">
	                <h1>Liste des Evenements</h1>
	            </div>
            </div>
			<div id="corps">
                <div id="hautCorps">
                </div>
				<div id="milieuCorps">
					<div id="modifEvenement"></div>
					<form action="cuEvenement.php" method="post" id="formCU">
						<div id="idEvenement">
							<input type="text" name="idEvenement" value="" id="idEvenement" hidden="true"/>
						</div>
						<div id="dateDebutVente">
							<h6>DateDebutVente</h6>
							<input type="text" name="dateDebutVente" value="" id="dateDebutVenteInput" class="dateTime" />
						</div>		
						<div class="message-erreur"></div>
						<div id="dateFinVente">
							<h6>dateFinVente</h6>
							<input type="text" name="dateFinVente" value="" id="dateFinVenteInput" class="dateTime" />
						</div>
						<div class="message-erreur"></div>
						<div id="dateDebutEvenment">
							<h6>dateDebutEvenement</h6>
							<input type="text" name="dateDebutEvenement" value="" id="dateDebutEvenementInput" class="dateTime" />
						</div>
						<div class="message-erreur"></div>
						<div id="dateFinEvenement">
							<h6>dateFinEvenement</h6>
							<input type="dateFinEvenement" name="dateFinEvenement" value="" id="dateFinEvenementInput" class="dateTime" />
						</div>
						<div class="message-erreur"></div>
						<div id="libelle">
							<h6>Libelle de l'evenement</h6>
							<input type="text" name="libelle" value="" id="libelleInput" />
						</div>
						<div class="message-erreur"></div>
						<div id="salle">
							<h6>Salle</h6>
							<?php
								$listeSalles = Salle::getListeSalles();
								$combo = Salle::affichageComboBox($listeSalles);
								print($combo);
							?>
						</div>
						<div class="message-erreur"></div>
						<div id="btnCreer">
							<input type="submit" value="Enregistrer" id="btnCU" />
						</div>
					</form>
					<form action="includes/dEvenement.php" method="POST">
					<?php
						$listeDesEvenements = Evenement::getListeEvenements();
						$tab = Evenement::affichageEvenements($listeDesEvenements);
						print($tab);
					?>
					<input type="submit" value="Supprimer" id="btnS" />
					</form>
					<div id="basCorps">
						<div id="btnRetour">
	                        <a href="../../index.php">Retour</a>
	                    </div>
	                </div>
				</div>
			</div>
		</div>

		<script type="text/javascript">
			$(function(){
				
				$('.dateTime').datetimepicker({ 
					format:'d/m/Y H:i',
					lang:'fr'
				});

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

			});
		</script>
<?php include $_SERVER['DOCUMENT_ROOT'].'/BilletMaster/footer.php'; ?>
