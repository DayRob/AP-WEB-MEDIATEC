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

/**
 * changer le mdp
 */
if (isset($_POST["modifierMdp"])) {
    $nouveauMdp = $_POST["nouveauMdp"];
    $verif = $_POST["verifMdp"];
    if ($donner->verifNouveauMdp($nouveauMdp,$verif)==true) {
        
        echo '<div class="alert alert-success" role="alert">
        mots de passe modifier !
      </div>';
        
        $donner->ModifierMdp($id, $nouveauMdp);
        $donner->login($adresseEmail,$nouveauMdp);
        
        
       
        
    }
    else
    {
        echo'<div class="alert alert-warning" role="alert">
        le mots de passe ne correspond pas !
      </div>';
    }

}


include "$racine/vue/header.php";
include "$racine/vue/v_dossierAbonne.php";
include "$racine/vue/Modal/edit_mdp_modal.php";
include "$racine/vue/Modal/edit_info_modal.php";
include "$racine/vue/footer.php";
