<?php

    $titre = "Mon Dossier";

    $donner = new authentificationManager();
    $unAbonne = $donner->infoAbonne();

    //info user identifier 

    $id = $unAbonne->getId();
    $nom = $unAbonne->getNom();
    $prenom = $unAbonne->getPrenom();
    $adresse = $unAbonne->getAdresse();
    $dateNaissance = $unAbonne->getDateNaissance();
    $adresseEmail = $unAbonne->getAdresseMail();
    $numeroTelephone = $unAbonne->getNumeroTel();
    $motDePasse = $unAbonne->getMdp();
    $dateExpriation = $unAbonne->getDateExpriation();

    $typeAbonnement = $unAbonne->getTypeAbonnemt();
    $libelleTypeAbonnement = $typeAbonnement->getLibelle();

    
    include "$racine/vue/header.php";
    include "$racine/vue/v_dossierAbonne.php";
    include "$racine/vue/footer.php";
    
?>