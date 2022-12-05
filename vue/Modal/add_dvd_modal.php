<?php
foreach ($disques as $unDvd) {
?>
<!-- Modal-->
<div class="modal fade bd-example-modal-lg" id="add_dvd<?= $unDvd->getId() ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Vous allez réserver <?= $unDvd->getTitre() ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="./?action=setDvd" method="POST">
          <div class="form-group">
          <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Votre exemaplaire</label>
          <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
          <option selected>Choisiez votre exemplaire...</option>
          <option value="1">00001</option>
          </select>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Date de la commande :</label>
            <input type="date" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Montant :</label>
            <input type="text" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
          <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Votre document</label>
          <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
          <option selected>Choisiez votre Document...</option>
          <option value="1"><?= $unDvd->getId() ?> - <?= $unDvd->getTitre() ?> </option>
          </select>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        <button type="button" class="btn btn-primary">Réserver maintenant</button>
      </div>
    </div>
  </div>
</div>
<?php
}
?>