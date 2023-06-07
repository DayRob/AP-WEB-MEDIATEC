<?php

$titre = "Recherche Avancée - Catalogue - Mediateq";

$vues = array();
$lesDocs = array();
$lesDocsDebut = array();
$lesDocsFin = array();
$lesDocsFin2 = array();
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


    if ($titreSearchType == "tout") {
        $DocumentManager = new DocumentManager();
        $lesDocsTitre = $DocumentManager->getlist();
    } else {
        $DocumentManager = new DocumentManager();
        $lesDocsTitre = $DocumentManager->getDocumentByTitre($textTitre);
    }

    if ($auteurSearchType == "tout") {
        $DocumentManager = new DocumentManager();
        $lesDocsAuteur = $DocumentManager->getlist();
    } else {
        $DocumentManager = new DocumentManager();
        $lesDocsAuteur = $DocumentManager->getDocumentByAuteur($textAuteur);
    }

    if ($sujetSearchType == "tout") {
        $DocumentManager = new DocumentManager();
        $lesDocsSujet = $DocumentManager->getlist();
    } else {
        $DocumentManager = new DocumentManager();
        $lesDocsSujet = $DocumentManager->getDocumentByPublic($textSujet);
    }

    if ($collectionSearchType == "tout") {
        $DocumentManager = new DocumentManager();
        $lesDocsCollection = $DocumentManager->getlist();
    } else {
        $DocumentManager = new DocumentManager();
        $lesDocsCollection = $DocumentManager->getDocumentByCollection($textCollection);
    }

    // if ($textTitre == NULL) {
    //     $DocumentManager = new DocumentManager();
    //     $lesDocTitre = $DocumentManager->getlist();
    // } else {
    //     $DocumentManager = new DocumentManager();
    //     $lesDocTitre = $DocumentManager->getDocumentByTitre($textTitre);
    // }

    // if ($textAuteur == NULL) {
    //     $DocumentManager = new DocumentManager();
    //     $lesDocAuteur = $DocumentManager->getlist();
    // } else {
    //     $DocumentManager = new DocumentManager();
    //     $lesDocAuteur = $DocumentManager->getDocumentByAuteur($textAuteur);
    // }

    // if ($textSujet == NULL) {
    //     $DocumentManager = new DocumentManager();
    //     $lesDocSujet = $DocumentManager->getlist();
    // } else {
    //     $DocumentManager = new DocumentManager();
    //     $lesDocSujet = $DocumentManager->getDocumentByPublic($textSujet);
    // }

    // if ($textCollection == NULL) {
    //     $DocumentManager = new DocumentManager();
    //     $lesDocsCollection = $DocumentManager->getlist();
    // } else {
    //     $DocumentManager = new DocumentManager();
    //     $lesDocsCollection = $DocumentManager->getDocumentByCollection($textCollection);
    // }


    switch ($auteurCombinaison) {
        case "et":
            $lesDocsDebut = array_intersect_key($lesDocsTitre, $lesDocsAuteur);
            break;

        case "ou":
            $lesDocsDebut = array_merge($lesDocsTitre, $lesDocsAuteur);
            break;

        case "sauf":
            $lesDocsDebut = array_diff_key($lesDocsTitre, $lesDocsAuteur);
    }


    switch ($sujetCombinaison) {
        case "et":
            $lesDocsFin = array_intersect_key($lesDocsDebut, $lesDocsSujet);
            break;

        case "ou":
            $lesDocsFin = array_merge($lesDocsDebut, $lesDocsSujet);
            break;

        case "sauf":
            $lesDocsFin = array_diff_key($lesDocsDebut, $lesDocsSujet);
    }

    switch ($collectionCombinaison) {
        case "et":
            $lesDocsFin2 = array_intersect_key($lesDocsFin, $lesDocsCollection);
            break;

        case "ou":
            $lesDocsFin2 = array_merge($lesDocsFin, $lesDocsCollection);
            break;

        case "sauf":
            $lesDocsFin2 = array_diff_key($lesDocsFin, $lesDocsCollection);
    }

    $total = var_dump(count($lesDocsFin2));


    $historiqueManager = new historiqueManager();
    $historiqueManager = $historiqueManager->creerHistorique($textTitre, $total, $requete);

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
