<div class="container">
    <div class="main-body">
        <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                            <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="photo" class="rounded-circle" width="150">
                            <div class="mt-3">
                                <!-- permet d'affichier le nom et le prenom de user connecter -->
                                <h4><?php echo "$prenom $nom";   ?></h4>
                                <p class="text-secondary mb-1">numéro :<?php echo " $id";   ?></p>
                                <p class="text-muted font-size-sm">Expire le : <?php echo " $dateExpriation"; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mt-3">
                    <ul class="list-group list-group-flush">
                        <img src="images/icon/inconWaring.png" width="24" height="24" class="rounded mx-auto d-block">
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <a class="mb-0" href="./?action=faq">comment signaler perte de ma carte </a>
                            <a class="mb-0" href="./?action=faq"> comment renouveler mon abonnement </a>
                        </li>
                    </ul>
                </div>

                <div class="card mt-3">
                    <ul class="list-group list-group-flush">
                        <img src="images/icon/person-fill.svg" width="24" height="24" class="rounded mx-auto d-block">
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <a class="mb-0" href="#ModalModifMdp" data-toggle="modal" data-target="#ModalModifMdp">
                                Modifier mot de passe
                            </a>
                            <a class="mb-0" href="#ModalModifInfo" data-toggle="modal" data-target="#ModalModifInfo">
                                Modifier mes renseignements personnels
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Nom Prenom :</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <?php echo "$nom $prenom"; ?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Address :</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <?php echo "$adresse"; ?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Date de Naissance:</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <?php echo "$dateNaissance"; ?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Adresse Email :</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <?php echo "$adresseEmail"; ?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Numero de téléphone :</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <?php echo "$numeroTelephone" ?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">type D'abonnement:</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <?php echo "$libelleTypeAbonnement" ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row gutters-sm">
                    <div class="col-sm-6 mb-3">
                        <div class="card h-100">
                            <div class="card-body">
                                <h6 class="d-flex align-items-center mb-3">Emprunts en cours : <?php echo "$nombreEmrunts"?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 mb-3">
                        <div class="card h-100">
                            <div class="card-body">
                                <h6 class="d-flex align-items-center mb-3">Reservation : </h6>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
