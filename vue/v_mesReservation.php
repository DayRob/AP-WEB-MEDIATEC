<h2>Mes Reservation:</h2>
<hr>
<div class="container-fluid">
    <?php
    foreach ($lesReservation as $uneReservation) {
    ?>

        <div class="row">
            <div class="col-12 mt-3">
                <div class="card">
                    <div class="card-horizontal">
                        <div class="img-square-wrapper">
                            <img class="img-fluid" src="<?= $uneReservation->getDocument()->getImage() ?>" alt="<?= $uneReservation->getDocument()->getTitre() ?>">
                        </div>

                        <div class="card-body">
                            <h4 class="card-title"><?= $uneReservation->getDocument()->getTitre() ?></h4>
                            <hr>
                            <div class="row">
                                <div class="col">
                                    <div class="card-text">
                                        <span class="date mr-3"><?= $uneReservation->getDocumentReservation()->getLeNumero() ?></span>
                                    </div>
                                    <div class="card-text">
                                        
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