<?php 
/* définition des varibales globales pour les tests unitaires */
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="../.."; // chemin d'appel local
}

chargerModeles($racine);

$choixModale = $_GET['modale'];
if ($choixModale = "detailsLivre"){
    $idM = $_GET["idLivre"];

    $livreManager = new LivreManager();
    $unLivre = $livreManager->getLivreById($idM);


    include "$racine/vue/Modal/info_livre_modal.php";


}
// if ($choixModale = "detailsReservationLivre"){
//     $idL = $_GET["idLivre"];
//     $idE = $_GET["idExemplaire"];
//     $livreManager = new LivreManager();
//     $unLivre = $livreManager->getLivreById($idL);
//     $unExemplaire = $unLivre->getUnExemplaire($idE);


//     include "$racine/vue/Modal/reserver_livre_modal.php";
// }
