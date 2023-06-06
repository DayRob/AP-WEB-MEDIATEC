<h2>mes Emprunts:</h2>
<hr>
<div class="container-fluid">
    <?php
    foreach ($lesEmprunts as $unEnprunts) {
    ?>

        <div class="row">
            <div class="col-12 mt-3">
                <div class="card">
                    <div class="card-horizontal">
                        <div class="img-square-wrapper">
                            <img class="" src="<?= $unEnprunts->getDocument()->getImage() ?>" alt="<?= $unEnprunts->getDocument()->getTitre() ?>">
                        </div>

                        <div class="card-body">
                            <h4 class="card-title"><?= $unEnprunts->getDocument()->getTitre() ?></h4>
                            <hr>
                            <div class="row">
                                <div class="col">
                                    <div class="card-text">
                                        <span class="date mr-3">2023-05-08</span>
                                        <span class="arrow">→</span>
                                        <span class="date ml-3">2023-06-29</span>
                                    </div>
                                    <div class="card-text">
                                        <span class="indication mr-3">Date de l'emprunt</span>
                                        <span class="indication ml-1">Date de retour</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <?php if ($unEnprunts->getProlongeable()) { ?>
                            <span class="indication">Ce document est prolongeable</span>
                        <?php } else { ?>
                            <span class="indication d-flex align-items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red" class="bi bi-exclamation-circle-fill" viewBox="0 0 16 16">
                                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                                </svg>
                                <span class="ml-2">Ce document n'est pas prolongeable</span>
                            </span>


                        <?php } ?>
                    </div>

                </div>
            </div>
        </div>


    <?php
    }
    ?>

</div>