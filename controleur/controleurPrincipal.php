<?php
function controleurPrincipal($action)
{
    $connexion = new authentificationManager();
    $lesActions = array();
    if ($connexion->isLoggedOn()) {
        $lesActions["dossierAbonne"] = "c_dossierAbonne.php";
        $lesActions["ModifierMdp"] = $lesActions["dossierAbonne"];
        $lesActions["ModifierInfo"] = $lesActions["dossierAbonne"];
        $lesActions["deconnexion"] = "c_deconnexion.php";
        $lesActions["rechercheSimple"] = "c_rechercheSimple.php";
        $lesActions["rechercheAvancee"] = "c_rechercheAvancee.php";
        $lesActions["nouveautes"] = "c_nouveautes.php";
        $lesActions["faq"] = "c_faq.php";
        $lesActions["accueil"] = $lesActions["rechercheSimple"];
        $lesActions["reservation"] = "c_reservation.php";
        $lesActions["modale"] = "controleurModale.php";
        $lesActions["defaut"] = $lesActions["accueil"];
    } else {
        $lesActions["rechercheSimple"] = "c_rechercheSimple.php";
        $lesActions["rechercheAvancee"] = "c_rechercheAvancee.php";
        $lesActions["nouveautes"] = "c_nouveautes.php";
        $lesActions["faq"] = "c_faq.php";
        $lesActions["modale"] = "controleurModale.php";
        $lesActions["reservation"] = "c_reservation.php";

        $lesActions["accueil"] = $lesActions["rechercheSimple"];
        $lesActions["defaut"] = $lesActions["accueil"];

        $lesActions["connexion"] = "c_connexion.php";
    }
    if (array_key_exists($action, $lesActions)) {
        return $lesActions[$action];
    } else {
        return $lesActions["defaut"];
    }
}
function chargerModeles($racine)
{
    require_once("$racine/modele/Manager.php");
    require_once("$racine/modele/Document.php");
    require_once("$racine/modele/documentManager.php");
    require_once("$racine/modele/Livre.php");
    require_once("$racine/modele/Dvd.php");
    require_once("$racine/modele/Exemplaire.php");
    require_once("$racine/modele/ExemplaireManager.php");
    require_once("$racine/modele/Parution.php");
    require_once("$racine/modele/LivreManager.php");
    require_once("$racine/modele/DvdManager.php");
    require_once("$racine/modele/Etat.php");
    require_once("$racine/modele/EtatManager.php");
    require_once("$racine/modele/Rayon.php");
    require_once("$racine/modele/RayonManager.php");
    require_once("$racine/modele/Revue.php");
    require_once("$racine/modele/RevueManager.php");
    require_once("$racine/modele/TypePublic.php");
    require_once("$racine/modele/TypePublicManager.php");
    require_once("$racine/modele/abonne.php");
    require_once("$racine/modele/abonneManager.php");
    require_once("$racine/modele/TypeAbonement.php");
    require_once("$racine/modele/typeAbonementManager.php");
    require_once("$racine/modele/authentificationManager.php");
    require_once("$racine/modele/reservation.php");
    require_once("$racine/modele/reservationManager.php");
}