<?php

$titre = "deconnexion";

$connexion =  new authentificationManager();

$connexion->logout();


include "$racine/controleur/c_connexion.php";

