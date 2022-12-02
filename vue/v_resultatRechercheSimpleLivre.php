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
                    <button type="button" class="btn btn-info btn-lg" data-toggle="modal"
                        data-target="#myModal" style="justify-content: end;">Réserver</button>

                    <!-- Modal -->
                    <div id="myModal" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Réserver votre revue</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <p>Some text in the modal.</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
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