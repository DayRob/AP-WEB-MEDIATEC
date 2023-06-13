<?php

$titre = "Recherche Avancée - Catalogue - Mediateq";

$vues = array();
$lesDocs = array();
$lesDocsDebut = array();
$lesDocsFin = array();
$lesDocsFin2 = array();
$lesHistoriques = array();
$lesDocsFin3 = array();
$lesLivres = array();
$lesDvd = array(); // tableau des vues à appeler



if (isset($_POST['recherche'])) {


    $textTitre = htmlentities($_POST['textTitre']);
    $textAuteur = htmlentities($_POST['textAuteur']);
    $textSujet = htmlentities($_POST['textSujet']);
    $textCollection = htmlentities($_POST['textCollection']);


    $titreSearchType = htmlentities($_POST['titreSearchType']);
    $auteurSearchType = htmlentities($_POST['auteurSearchType']);
    $sujetSearchType = htmlentities($_POST['sujetSearchType']);
    $collectionSearchType = htmlentities($_POST['collectionSearchType']);
    $auteurCombinaison = htmlentities($_POST['auteurCombinaison']);
    $sujetCombinaison = htmlentities($_POST['sujetCombinaison']);
    $collectionCombinaison = htmlentities($_POST['collectionCombinaison']);

    // $DocumentManager = new DocumentManager();
    // $lesDocs = $DocumentManager->getList();
    $livreManager = new livreManager();
    $lesLivres = $livreManager->getList();
    $dvdManager = new DvdManager();
    $lesDvd = $dvdManager->getList();
    $requete = "";



    if ($titreSearchType == "tout") {
        $requeteTitre = "";
        $DocumentManager = new DocumentManager();
        $lesDocsTitre = $DocumentManager->getlist();
    } else {
        $requeteTitre = "";
        $DocumentManager = new DocumentManager();
        $lesDocsTitre = $DocumentManager->getDocumentByTitre($textTitre, $requeteTitre);
    }

    if ($auteurSearchType == "tout") {
        $DocumentManager = new DocumentManager();
        $lesDocsAuteur = $DocumentManager->getlist();
    } else {
        $requeteAuteur = "";
        $DocumentManager = new DocumentManager();
        $lesDocsAuteur = $DocumentManager->getDocumentByAuteur($textAuteur, $requeteAuteur);
    }

    if ($sujetSearchType == "tout") {
        $DocumentManager = new DocumentManager();
        $lesDocsSujet = $DocumentManager->getlist();
    } else {
        $DocumentManager = new DocumentManager();
        $lesDocsSujet = $DocumentManager->getDocumentByPublic($textSujet, $requeteSujet);
    }

    if ($collectionSearchType == "tout") {
        $DocumentManager = new DocumentManager();
        $lesDocsCollection = $DocumentManager->getlist();
    } else {
        $DocumentManager = new DocumentManager();
        $lesDocsCollection = $DocumentManager->getDocumentByCollection($textCollection, $requeteCollection);
    }

    if ($textTitre != NULL && $textAuteur == NULL && $textCollection == NULL && $textSujet == NULL) {
        $requete = $requeteTitre;
    }

    switch ($auteurCombinaison) {

        case "et":
            if ($textAuteur == NULL) {
                $lesDocsDebut = array_intersect_key($lesDocsTitre, $lesDocsAuteur);
                // $requete = $requeteTitre;
                break;
            } else if ($textTitre == NULL && $textCollection == NULL && $textSujet == NULL && $textAuteur != NULL) {
                $lesDocsDebut = array_intersect_key($lesDocsTitre, $lesDocsAuteur);
                $requete = $requeteAuteur;
                break;
            } else {
                $lesDocsDebut = array_intersect_key($lesDocsTitre, $lesDocsAuteur);
                $requete = $requeteTitre . " INTERSECT " . $requeteAuteur;
            }


        case "ou":
            if ($textAuteur == NULL) {
                $lesDocsDebut = array_merge($lesDocsTitre, $lesDocsAuteur);
                break;
            } else if ($textTitre == NULL && $textCollection == NULL && $textSujet == NULL && $textAuteur != NULL) {
                $lesDocsDebut = array_merge($lesDocsTitre, $lesDocsAuteur);
                $requete = $requeteAuteur;
                break;
            } else {
                $lesDocsDebut = array_merge($lesDocsTitre, $lesDocsAuteur);
                $requete = $requeteTitre . " UNION " . $requeteAuteur;
            }

        case "sauf":
            if ($textAuteur == NULL) {
                $lesDocsDebut = array_diff_key($lesDocsTitre, $lesDocsAuteur);
            } else if ($textTitre == NULL && $textCollection == NULL && $textSujet == NULL && $textAuteur != NULL) {
                $lesDocsDebut = array_diff_key($lesDocsTitre, $lesDocsAuteur);
                $requete = $requeteAuteur;
            } else {
                $lesDocsDebut = array_diff_key($lesDocsTitre, $lesDocsAuteur);
                $requete = $requeteTitre . " MINUS " . $requeteAuteur;
            }
    }



    switch ($sujetCombinaison) {
        case "et":
            if ($textSujet == NULL) {
                $lesDocsFin = array_intersect_key($lesDocsDebut, $lesDocsSujet);
                break;
            } else if ($textAuteur == NULL && $textTitre == NULL && $textCollection == NULL && $textSujet != NULL) {
                $lesDocsFin = array_intersect_key($lesDocsDebut, $lesDocsSujet);
                $requete = $requeteSujet;
                break;
            } else {
                $lesDocsFin = array_intersect_key($lesDocsDebut, $lesDocsSujet);
                $requete = $requete . "INTERSECT" . $requeteSujet;
            }

        case "ou":
            if ($textSujet == NULL) {
                $lesDocsFin = array_merge($lesDocsDebut, $lesDocsSujet);
                break;
            } else if ($textAuteur == NULL && $textTitre == NULL && $textCollection == NULL && $textSujet != NULL) {
                $lesDocsFin = array_merge($lesDocsDebut, $lesDocsSujet);
                $requete = $requeteSujet;
                break;
            } else {
                $lesDocsFin = array_merge($lesDocsDebut, $lesDocsSujet);
                $requete = $requete . "UNION" . $requeteSujet;
            }

        case "sauf":
            if ($textSujet == NULL) {
                $lesDocsFin = array_diff_key($lesDocsDebut, $lesDocsSujet);
            } else if ($textAuteur == NULL && $textTitre == NULL && $textCollection == NULL && $textSujet != NULL) {
                $lesDocsFin = array_diff_key($lesDocsDebut, $lesDocsSujet);
                $requete = $requeteSujet;
            } else {
                $lesDocsFin = array_diff_key($lesDocsDebut, $lesDocsSujet);
                $requete = $requete . "MINUS" . $requeteSujet;
            }
    }

    switch ($collectionCombinaison) {
        case "et":
            if ($textCollection == NULL && $textSujet == NULL) {
                $lesDocsFin2 = array_intersect_key($lesDocsFin, $lesDocsCollection);
                break;
            } else if ($textAuteur == NULL && $textSujet == NULL && $textTitre == NULL && $textCollection != NULL) {
                $lesDocsFin2 = array_intersect_key($lesDocsFin, $lesDocsCollection);
                $requete = $requeteCollection;
                break;
            } else {
                $lesDocsFin2 = array_intersect_key($lesDocsFin, $lesDocsCollection);
                $requete = $requete . "INTERSECT" . $requeteCollection;
            }

        case "ou":
            if ($textCollection == NULL) {
                $lesDocsFin2 = array_merge($lesDocsFin, $lesDocsCollection);
                break;
            } else if ($textAuteur == NULL && $textSujet == NULL && $textTitre == NULL && $textCollection != NULL) {
                $lesDocsFin2 = array_merge($lesDocsFin, $lesDocsCollection);
                $requete = $requeteCollection;
                break;
            } else {
                $lesDocsFin2 = array_merge($lesDocsFin, $lesDocsCollection);
                $requete = $requete . "UNION" . $requeteCollection;
            }


        case "sauf":
            if ($textCollection == NULL) {
                $lesDocsFin2 = array_diff_key($lesDocsFin, $lesDocsCollection);
            } else if ($textAuteur == NULL && $textSujet == NULL && $textTitre == NULL && $textCollection != NULL) {
                $lesDocsFin2 = array_diff_key($lesDocsFin, $lesDocsCollection);
                $requete = $requeteCollection;
            } else {
                $lesDocsFin2 = array_diff_key($lesDocsFin, $lesDocsCollection);
                $requete = $requete . "MINUS" . $requeteCollection;
            }
    }


    $total = 1;
    $libelle = $textTitre . "; " . $textAuteur . "; " . $textCollection . "; " . $textSujet . "; ";

    $historiqueManager = new historiqueManager();
    $historiqueManager = $historiqueManager->creerHistorique($libelle, $total, $requete);
    $historiqueManager2 = new historiqueManager();
    $lesHistoriques = $historiqueManager2->getList();

    array_push($vues, "$racine/vue/v_resultatRechercheAvancee.php");
} else {
    array_push($vues, "$racine/vue/v_rechercheAvancee.php");
}









// appel du script de vue qui permet de gerer l'affichage des donnees
include "$racine/vue/header.php";
foreach ($vues as $vue) {
    include $vue;
}
include "$racine/vue/footer.php";
