<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="info_<?= $unDvd->getId() ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Voici : <?= $unDvd->getTitre() ?>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img class="" src="<?= $unDvd->getImage() ?>" alt="<?= $unDvd->getTitre() ?>"
                    style="width: 90px;"><br>
                <hr>
                <strong>Synopsis : </strong> <?= $unDvd->getSynopsis() ?><br>
                <strong>Réalisateur : </strong> <?= $unDvd->getRealisateur() ?><br>
                <strong>Durées : </strong> <?= $unDvd->getDuree() ?> Heure(s)<br>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                <button type="button" class="btn btn-primary">Réserver</button>
            </div>
        </div>
    </div>
</div>