<h2>Documents : </h2>
<div class="container-fluid">
    <?php
    foreach ($lesDocsFin2 as $unDoc) {
    ?>

        <div class="row">
            <div class="col-12 mt-3">
                <div class="card">
                    <div class="card-horizontal">
                        <div class="img-square-wrapper">
                            <img class="" src="<?= $unDoc->getImage() ?>" alt="<?= $unDoc->getTitre() ?>">
                        </div>
                        <div class="card-body">
                            <h4 class="card-title"><?= $unDoc->getTitre() ?></h4>

                            <p class="card-text">Type Public : <?= $unDoc->getTypePublic()->getLibelle() ?></p>

                            <?php

                            foreach ($lesLivres as $unLivre) {

                                if ($unLivre->getId() == $unDoc->getId()) {
                                    echo '<p class="card-text">Auteur : ' . $unLivre->getAuteur() . '</p>';
                                }
                            }

                            foreach ($lesDvd as $unDvd) {

                                if ($unDvd->getId() == $unDoc->getId()) {
                                    echo '<p class="card-text">Réalisateur : ' . $unDvd->getRealisateur() . '</p>';
                                }
                            }

                            ?>




                        </div>
                    </div>

                </div>
            </div>
        </div>


    <?php
    }
    ?>

</div>