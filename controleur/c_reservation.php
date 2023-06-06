<?php 
/* définition des varibales globales pour les tests unitaires */
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="../.."; // chemin d'appel local
}

$reservationManager = new reservationManager();

$titre = "Réservation";

if(isset($_POST["reservation"])){
    $idAbonne = $_SESSION["id"];
    var_dump("coucou");
    $idDocument = $_POST["idDocument"];
    $idExemplaire = $_POST["idExemplaire"];
    
    $reservationManager->setRerservation($idAbonne, $idDocument, $idExemplaire);
}
// appel du script de vue qui permet de gerer l'affichage des donnees
include "$racine/vue/header.php";

include "$racine/vue/v_confirmReservation.php";
include "$racine/vue/v_mesReservation.php";

include "$racine/vue/footer.php";
?>
