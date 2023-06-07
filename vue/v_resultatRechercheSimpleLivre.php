<div class="modal fade bd-example-modal-lg" id="modalVide" class="modal" tabindex="-10">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div id="modalContent" class="modal-content">
        </div>
    </div>
</div>


<div class="modal fade bd-example-modal-lg" id="modalVide2" class="modal" tabindex="-10">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div id="modalContent2" class="modal-content">
        </div>
    </div>
</div>

<h2>Livres : </h2>
<div class="container-fluid">
    <?php
    foreach ($livres as $unLivre) {
        ?>
        <div class="row">
            <div class="col-12 mt-3">
                <div class="card">
                    <div class="card-horizontal">
                        <div class="img-square-wrapper">
                            <img class="" src="<?= $unLivre->getImage() ?>" alt="<?= $unLivre->getTitre() ?>">
                        </div>
                        <div class="card-body">
                            <h3 class="card-title">
                                <?= $unLivre->getTitre() ?>
                            </h3>
                            <p class="card-text">
                                <strong>ISBN : </strong>
                                <?= $unLivre->getISBN() ?><br>
                            </p>
                            <p class="card-text">
                                <strong>Auteur : </strong>
                                <?= $unLivre->getAuteur() ?><br>
                            </p>
                            <p class="card-text">
                                <strong>Collection : </strong>
                                <?= $unLivre->getCollection() ?><br>
                            </p>
                        </div>
                    </div>
                    <div class="card-footer">
                        <?php
                        $txtExemplaires = "Aucun exemplaires disponible ";
                        $txtRayons = "";
                        $nbExemplaires = count($unLivre->getLesExemplaires());
                        if ($nbExemplaires > 0) {
                            $txtRayons = "Rayon";
                            $txtExemplaires = $nbExemplaires . " exemplaire";
                            $finTxt = " disponible - ";
                            if ($nbExemplaires > 1) {
                                $finTxt = "s disponible - ";
                            }
                            $txtRayons .= $finTxt;
                            $txtExemplaires .= $finTxt;

                            foreach ($unLivre->getLesExemplaires() as $unExemplaire) {
                                $txtRayons .= $unExemplaire->getLeRayon() . ", ";
                            }
                            $txtRayons = substr($txtRayons, 0, -2);
                        } ?>
                        <small class="text-muted">
                            <?= $txtExemplaires . " " . $txtRayons ?>

                        </small>
                        <!-- Button trigger modal -->
                        <button type="button" href="#modalVide" class="btn btn-primary" data-toggle="modal"
                            onclick="chargeModaleDetailsLivre('<?= $unLivre->getId() ?>', '#modalContent')">
                            Afficher les détails
                        </button>
                    </div>
                </div>
            </div>
        </div>


        <?php
    }
    ?>
</div>