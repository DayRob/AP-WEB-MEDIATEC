<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="revue_<?= $uneRevue->getId() ?>" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Voici : <?= $uneRevue->getTitre() ?>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="img-square-wrapper">
                    <img class="" src="" alt="<?= $uneRevue->getTitre() ?>">
                </div>
                <div class="card-body">
                    <?php
                        if ($uneRevue->getEmpruntable()) {
                            $txt = "Cette revue est empruntable";
                        } else {
                            $txt = "Cette revue n'est pas empruntable";
                        }
                        ?>
                    <p class="card-text">description de la revue...</p>
                    <p class="card-text">
                        <? $txt ?>
                    </p>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal">Réserver</button>
            </div>
        </div>
    </div>
</div>