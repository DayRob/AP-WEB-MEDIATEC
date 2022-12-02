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
                        <h4 class="card-title">
                            <?= $unLivre->getTitre() ?>
                        </h4>
                        <p class="card-text">
                            <?= $unLivre->getISBN() ?>
                        </p>
                        <p class="card-text">
                            <?= $unLivre->getAuteur() ?>
                        </p>
                        <p class="card-text">
                            <?= $unLivre->getCollection() ?>
                        </p>
                    </div>
                </div>
                <div class="card-footer">
                    <?php
    $txtExemplaires = "Aucun exemplaires";
    $txtRayons = "";
    $nbExemplaires = count($unLivre->getLesExemplaires());
    if ($nbExemplaires > 0) {
        $txtRayons = "Rayon";
        $txtExemplaires = $nbExemplaires . " exemplaire";
        $finTxt = " : ";
        if ($nbExemplaires > 1) {
            $finTxt = "s : ";
        }
        $txtRayons .= $finTxt;
        $txtExemplaires .= $finTxt;

        foreach ($unLivre->getLesExemplaires() as $unExemplaire) {
            $txtRayons .= $unExemplaire->getLeRayon() . ", ";
        }
        $txtRayons = substr($txtRayons, 0, -2);
    } ?>

                    <small class="text-muted">
                        <?= $txtExemplaires . " - " . $txtRayons ?>
                    </small>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                       Réserver votre livre
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Voici : <?= $unLivre->getTitre() ?></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <img class="" src="<?= $unLivre->getImage() ?>" alt="<?= $unLivre->getTitre() ?>" style="width: 90px;"><br>
                                    <hr>
                                    <strong>Auteur :</strong> : <?= $unLivre->getAuteur() ?><br>
                                    <strong>ISBN :</strong> <?= $unLivre->getISBN() ?><br>
                                    <strong>Collection :</strong> <?= $unLivre->getCollection() ?><br>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                    <button type="button" class="btn btn-primary">Réserver</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
}
    ?>
</div>