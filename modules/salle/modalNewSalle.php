<div class="modal fade" data-role="newSalleModal" tabindex="-1" role="dialog" aria-labelledby="newSalleLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h4 class="modal-title" id="newSalleLabel">Nouvelle salle</h4>
            </div>
            <div class="modal-body" data-role="">
                <form action="cuSalle.php" method="post" id="formCU">
                    <div id="idSalle">
                        <input type="text" name="idSalle" value="" id="idInput" hidden="true"/>
                    </div>
                    <div id="libelle">
                        <h6>libelle</h6>
                        <input type="text" name="libelle" value="" id="libelleInput" />
                    </div>      
                    <div class="message-erreur"></div>
                        <div id="btnCreer" class = "modal-footer">
                            <input type="submit" value="Enregistrer" id="btnCU"  onclick="$('[data-role=newSalleModal]').modal('hide');refresh()" class ="btn btn-primary" />
                            <input type="button" value="Fermer" id="btnFermer" data-dismiss="modal"class ="btn btn-danger"/>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
