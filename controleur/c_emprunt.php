<?php

$titre = "mes emprunts";

$emprunManager = new EmpruntManager;
$lesEmprunts=$emprunManager->getEmrpuntAbonne($_SESSION["id"]);



// appel du script de vue qui permet de gerer l'affichage des donnees
include "$racine/vue/header.php";
include "$racine/vue/v_emprunt.php";
include "$racine/vue/footer.php";
?>

