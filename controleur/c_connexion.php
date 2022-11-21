<?php

$titre = "connexion";

$connexion =  new authentificationManager();

// recuperation des donnees GET, POST, et SESSION
if (isset($_POST["mail"]) && isset($_POST["mdp"])){
    $mail=$_POST["mail"];
    $mdp=$_POST["mdp"];
    $connexion->login($mail, $mdp);
    
}

if ($connexion->isLoggedOn()){ 
    echo"connecter";
}
else{ // l'utilisateur n'est pas connecté, on affiche le formulaire de connexion
    // appel du script de vue 
    include "$racine/vue/header.php";
    include "$racine/vue/v_connexion.php";
    include "$racine/vue/footer.php";

   
}



// appel des fonctions permettant de recuperer les donnees utiles a l'affichage 


// traitement si necessaire des donnees recuperees


// if (isLoggedOn()){ // si l'utilisateur est connecté on redirige vers le controleur monProfil
//     include "$racine/controleur/présentation.php";
// }
// else{ // l'utilisateur n'est pas connecté, on affiche le formulaire de connexion
//     // appel du script de vue 
//     $titre = "connexion";
//     include "$racine/vue/bandeau.php";
//     include "$racine/vue/menu.php";
    
//     include "$racine/vue/vueAuthentification.php";
//     include "$racine/vue/pied_page.php";
// }
