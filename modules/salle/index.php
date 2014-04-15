<?php
    require_once '../../class/Salle.class.php';
    //  Pas d'accès direct
    $title = "Liste des salles"; //titre de la page
    include $_SERVER['DOCUMENT_ROOT'].'/BilletMaster/header.php';
 ?>
<div id="corps">
          <div id="hautCorps"></div>
    <div id="milieuCorps">
        <form action="cuSalle.php" method="post" id="formCU">
            <div id="idSalle">
                <input type="text" name="idSalle" value="" id="idInput" hidden="true"/>
            </div>
            <div id="libelle">
                <h6>libelle</h6>
                <input type="text" name="libelle" value="" id="libelleInput" />
            </div>      
            <div class="message-erreur"></div>
            <div id="btnCreer">
                <input type="submit" value="Enregistrer" id="btnCU" />
            </div>
        </form>
        <form action="dSalle.php" method="post" id="formD">
            <?php
                $listeSalles = Salle::getListeSalles();
                $tab = Salle::affichageSalle($listeSalles);
                print($tab);
            ?>
            <div id="btnSupprimer">
                <input type="submit" value="Supprimer" id="btnD" />
            </div>
        </form>
        <div id="basCorps">
            <div id="btnRetour">
                      <a href="../../index.php">Retour</a>
                  </div>
              </div>
    </div>
</div>
<?php include $_SERVER['DOCUMENT_ROOT'].'/BilletMaster/footer.php'; ?>