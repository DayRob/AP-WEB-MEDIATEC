<!-- Modal -->
<form action="./?action=reservation" method="POST">
<div class="modal fade bd-example-modal-lg " id="infoDVD_<?= $unDvd->getId() ?>" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal_reserver" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Voici :
                    <?= $unDvd->getTitre() ?>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img class="" src="<?= $unDvd->getImage() ?>" alt="<?= $unDvd->getTitre() ?>" style="width: 90px;"><br>
                <hr>
                <strong>Réalisateur : </strong>
                <?= $unDvd->getRealisateur() ?><br>
                <strong>Synopsis : </strong>
                <?= $unDvd->getSynopsis() ?><br>
                <strong>Durée : </strong>
                <?= $unDvd->getDuree() ?><br>
                <strong>Public : </strong>
                <?= $unDvd->getTypePublic()->getLibelle() ?>
                <input type="hidden" id="idDocument" name="idDocument" value="<?= $unLivre->getId() ?>" />
                <div class="form-group row">
                    <div class="col-sm-3">Exemplaires :</div>
                    <div class="col-sm-10">
                        <?php
                        foreach ($unDvd->getLesExemplaires() as $unExemplaire) {
                            ?>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="idExemplaire" id="idExemplaire"
                                    value="<?= $unExemplaire->getLeNumero() ?>">
                                <label class="form-check-label" for="exampleRadios2">
                                    <?= $unExemplaire->getLeNumero() . ' - ' . $unExemplaire->getEtat()->getTitre() ?>
                                </label>
                            </div>
                            <?php
                        }
                        ?>

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                <button type="button" class="btn btn-primary" id="reserverdvd" test="<?= $unDvd->getId() ?>"
                    data-toggle="modal" data-target="#add_dvd<?= $unDvd->getId() ?>" data-whatever="">Reserver</button>
            </div>
        </div>
    </div>
</div>