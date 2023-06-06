<?php
foreach ($disques as $unDvd) {
    include("$racine/vue/Modal/info_dvd_modal.php");
    
}
?>
<h2>Disques DVD : </h2>
<div class="container-fluid">
    <?php
    foreach ($disques as $unDvd) {
        ?>

        <div class="row">
            <div class="col-12 mt-3">
                <div class="card">
                    <div class="card-horizontal">
                        <div class="img-square-wrapper">
                            <img class="" src="<?= $unDvd->getImage() ?>" alt="<?= $unDvd->getTitre() ?>">
                        </div>
                        <div class="card-body">
                            <h3 class="card-title">
                                <?= $unDvd->getTitre() ?>
                            </h3>
                            <p class="card-text">
                            <strong>Synopsis : </strong><?= $unDvd->getSynopsis() ?><br>
                            </p>
                            <p class="card-text">
                            <strong>Réalisateur : </strong><?= $unDvd->getRealisateur() ?><br>
                            </p>
                            <p class="card-text">
                            <strong>Durée : </strong><?= $unDvd->getDuree() ?> min<br>
                            </p>
                            
                        </div>
                    </div>
                    <div class="card-footer">
                        <?php
                        $txtExemplaires = "Aucun exemplaires disponible ";
                        $txtRayons = "";
                        $nbExemplaires = count($unDvd->getLesExemplaires());
                        if ($nbExemplaires > 0) {
                            $txtRayons = "Rayon";
                            $txtExemplaires = $nbExemplaires . " exemplaire ";
                            $finTxt = " disponible - ";
                            if ($nbExemplaires > 1) {
                                $finTxt = "s : ";
                            }
                            $txtRayons .= $finTxt;
                            $txtExemplaires .= $finTxt;

                            foreach ($unDvd->getLesExemplaires() as $unExemplaire) {
                                $txtRayons .= $unExemplaire->getLeRayon() . ", ";
                            }
                            $txtRayons = substr($txtRayons, 0, -2);
                        } ?>
                        <small class="text-muted">
                            <?= $txtExemplaires . " " . $txtRayons ?>
                            
                        </small>
                        <!-- Button trigger modal -->
                        <button type="button" href="#infoDVD_<?= $unDvd->getId() ?>" class="btn btn-primary"
                        data-toggle="modal">
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