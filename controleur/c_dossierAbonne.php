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
  if ($donner->verifNouveauMdp($nouveauMdp, $verif) == true) {

    echo '<div class="alert alert-success" role="alert">
        mots de passe modifier !
      </div>';

    $donner->ModifierMdp($id, $nouveauMdp);
    $donner->login($adresseEmail, $nouveauMdp);
  } else {
    echo '<div class="alert alert-warning" role="alert">
        le mots de passe ne correspond pas !
      </div>';
  }
}


if (isset($_POST["modifierInfo"])) {
  $nouveauNom = $_POST["nom"];
  $nouveauPrenom=$_POST["prenom"];
  $nouveauAdresse=$_POST["adresse"];
  $nouveauDateNaissance = date($_POST["DateNaissance"]);
  $nouveauAdresseMail = $_POST["adresseMail"];
  $nouveauNumeroTelephone= $_POST["numeroTel"];

  $donner->ModifierIfo($id,$nouveauNom,$nouveauPrenom,$nouveauAdresse,$nouveauDateNaissance,$nouveauAdresseMail,$nouveauNumeroTelephone);
  $donner->login($nouveauAdresseMail,$motDePasse);

  header('location: index.php?action=dossierAbonne');
}


include "$racine/vue/header.php";
include "$racine/vue/v_dossierAbonne.php";
include "$racine/vue/Modal/edit_mdp_modal.php";
include "$racine/vue/Modal/edit_info_modal.php";
include "$racine/vue/footer.php";
