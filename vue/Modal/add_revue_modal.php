<?php
foreach ($revues as $uneRevue) {
?>
<div class="modal fade" id="add_Revue<?= $uneRevue->getId() ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Vous allez reserver la revue : <?= $uneRevue->getTitre() ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
        <div class="form-group">
          <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Votre numéro</label>
          <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
          <option selected>Choisiez votre numéro...</option>
          <option value="1">00001</option>
          </select>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Date de fin d'abonnement :</label>
            <input type="date" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Périodicité :</label>
            <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
            <option selected>Votre Périodicité...</option>
            <option value="1"><?= $uneRevue->getDelai() ?> </option>
            </select>
          </div>
          <div class="form-group">
          <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Votre revue</label>
          <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
          <option selected>Choisiez votre Document...</option>
          <option value="1"><?= $uneRevue->getId() ?> - <?= $uneRevue->getTitre() ?> </option>
          </select>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        <button type="submit" class="btn btn-primary" name="livreAdd">Enregister !</button>
      </div>
    </div>
  </div>
</div>
<?php 
}
?>