<?php
    require_once '../../class/Salle.class.php';
    //  Pas d'accès direct
    $title = "Liste des salles"; //titre de la page
    include $_SERVER['DOCUMENT_ROOT'].'/BilletMaster/header.php';
 ?>
 <form action="dSalle.php" method="post" id="formD">
            <?php
                $listeSalles = Salle::getListeSalles();
                $tab = Salle::affichageSalle($listeSalles);
                print($tab);
            ?>
            
            <div id="btnNewSalle">
                <input type="submit" value="Nouvelle salle" id="btnN" class="btn btn-primary" data-role="newSalle" data-toggle="modal" data-target="[data-role=newSalleModal]" value="Nouvelle salle" />
            </div><br>
            <div id="btnSupprimer">
                <input type="submit" value="Supprimer" id="btnD" class="btn btn-danger" />
            </div><br>
        </form>
<div id="corps">
          <div id="hautCorps"></div>
    <div id="milieuCorps">
        
        
        <div id="basCorps">
            <div id="btnRetour">
                      <a href="../../index.php">Retour</a>
                  </div>
              </div>
    </div>
</div>

<?php
    include $_SERVER['DOCUMENT_ROOT'].'/BilletMaster/modules/salle/modalNewSalle.php'; 
    include $_SERVER['DOCUMENT_ROOT'].'/BilletMaster/footer.php'; 
?>