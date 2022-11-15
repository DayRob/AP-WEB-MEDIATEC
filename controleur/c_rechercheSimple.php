<?php

$titre = "Recherche - Catalogue - Mediateq";

$vues = array(); // tableau des vues à appeler

if(isset($_POST['recherche'])){
    $texte = htmlentities($_POST['searchText']);
    $typeDoc = htmlentities($_POST['searchType']);
    array_push($vues, "$racine/vue/v_resultatRechercheSimple.php");
    switch ($typeDoc) {
        case "livre":
            $recherche = "Recherche des livres contenant \"". $texte ."\"";
            $livreManager = new livreManager(); // Création d'un objet manager de documents
            $livres = $livreManager->getLivreCritereSimple($texte); // chargement de l'ensemble du catalogue
            array_push($vues, "$racine/vue/v_resultatRechercheSimpleLivre.php");
            break;
        case "dvd":
            $recherche = "Recherche des ". $typeDoc . " contenant \"". $texte ."\"";
            $dvdManager = new dvdManager(); // Création d'un objet manager de documents
            $disques = $dvdManager->getDvdCritereSimple($texte); // chargement de l'ensemble du catalogue
            array_push($vues, "$racine/vue/v_resultatRechercheSimpleDvd.php");
            break;
        case "revue":
            $recherche = "Recherche des ". $typeDoc . " contenant \"". $texte ."\"";
            $revueManager = new revueManager(); // Création d'un objet manager de revues
            $revues = $revueManager->getRevueCritereSimple($texte); // chargement de l'ensemble du catalogue
            array_push($vues, "$racine/vue/v_resultatRechercheSimpleRevue.php");
            break;
        default:
            $recherche = "Recherche des livres, dvd et revues contenant \"". $texte ."\"";
            $livreManager = new livreManager(); // Création d'un objet manager de documents
            $livres = $livreManager->getLivreCritereSimple($texte); // chargement de l'ensemble du catalogue
            array_push($vues, "$racine/vue/v_resultatRechercheSimpleLivre.php");
            $dvdManager = new dvdManager(); // Création d'un objet manager de documents
            $disques = $dvdManager->getDvdCritereSimple($texte); // chargement de l'ensemble du catalogue
            array_push($vues, "$racine/vue/v_resultatRechercheSimpleDvd.php");
            $revueManager = new revueManager(); // Création d'un objet manager de revues
            $revues = $revueManager->getRevueCritereSimple($texte, $typeDoc); // chargement de l'ensemble du catalogue
            array_push($vues, "$racine/vue/v_resultatRechercheSimpleRevue.php");
    }
} else {
    array_push($vues, "$racine/vue/v_rechercheSimple.php");
}


// appel du script de vue qui permet de gerer l'affichage des donnees
include "$racine/vue/header.php";
foreach($vues as $vue){
    include $vue;
}
include "$racine/vue/footer.php";
?>

