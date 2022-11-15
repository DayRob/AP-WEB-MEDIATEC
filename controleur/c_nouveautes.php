<?php

$titre = "Nouveautés - Catalogue - Mediateq";

$vues = array(); // tableau des vues à appeler
array_push($vues, "$racine/vue/v_nouveautes.php");

$livreManager = new livreManager(); // Création d'un objet manager de documents
$livres = $livreManager->getNouveautes(300); // chargement des nouveaux documents
$dvdManager = new dvdManager(); // Création d'un objet manager de documents
$disques = $dvdManager->getNouveautes(300); // chargement des nouveaux documents
$revueManager = new revueManager(); // Création d'un objet manager de revues
$revues =$revueManager->getNouveautes(300); // chargement des nouvelles revues
array_push($vues, "$racine/vue/v_resultatRechercheSimpleLivre.php");
array_push($vues, "$racine/vue/v_resultatRechercheSimpleDvd.php");
array_push($vues, "$racine/vue/v_resultatRechercheSimpleRevue.php");


// appel du script de vue qui permet de gerer l'affichage des donnees
include "$racine/vue/header.php";
foreach($vues as $vue){
    include $vue;
}
include "$racine/vue/footer.php";
?>

