<!-- Modal -->
<form action="./?action=reservation" method="POST">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Voici :
            <?= $unLivre->getTitre() ?>
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <img class="" src="<?= $unLivre->getImage() ?>" alt="<?= $unLivre->getTitre() ?>" style="width: 90px;"><br>
        <hr>
        <strong>Auteur : </strong>
        <?= $unLivre->getAuteur() ?><br>
        <strong>ISBN : </strong>
        <?= $unLivre->getISBN() ?><br>
        <strong>Collection : </strong>
        <?= $unLivre->getCollection() ?><br>
        <strong>Public : </strong>
        <?= $unLivre->getTypePublic()->getLibelle() ?>
        <hr>    
        <input type="hidden" id="idDocument" name="idDocument" value="<?= $unLivre->getId() ?>" />
        <div class="form-group row">
            <div class="col-sm-3">Exemplaires :</div>
            <div class="col-sm-10">
                <?php
                foreach ($unLivre->getLesExemplaires() as $unExemplaire) {
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
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        <button type="submit" class="btn btn-primary" name="reservation" data-toggle="modal">
            Réserver
        </button>
    </div>
</form>