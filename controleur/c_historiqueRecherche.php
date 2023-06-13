<?php

$titre = "Historique de recherche";


$historiqueManager = new historiqueManager();
$lesHistoriques = $historiqueManager->getList();

if (isset($_POST['rechercheHistorique'])) {
}

if(isset($_POST['suprimmerRecherche']))
{
    
}

// appel du script de vue qui permet de gerer l'affichage des donnees
include "$racine/vue/header.php";
include "$racine/vue/v_historiqueRecherche.php";
include "$racine/vue/footer.php";
