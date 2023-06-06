<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
  <div class="container">
    <a class="navbar-brand" href="./" title="Accueil">
      <img src="css/mini-logo.png" alt="bandeau de la Mediateq" height="30px" />
    </a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">

        <li class="nav-item dropdown active">
          <a class="nav-link dropdown-toggle" href="./?action=rechercheSimple" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Recherche catalogue
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="./?action=rechercheSimple">Recherche simple</a>
            <a class="dropdown-item" href="./?action=rechercheAvancee">Recherche avancée</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./?action=nouveautes">Nouveautés</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./?action=faq">FAQ</a>
        </li>
        <li class="nav-item dropdown">


          <?php
          $connexion = new authentificationManager();

          if (!$connexion->isLoggedOn()) { ?>
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Dossier d'abonné
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="./?action=connexion">Mon dossier</a>

            <?php } else { ?>
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php $unAbonne = $connexion->infoAbonne();
                $prenom = $unAbonne->getPrenom();
                echo ("$prenom"); ?>
              </a>

              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="./?action=dossierAbonne">Mon dossier</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Mes prêts en cours</a>
                <a class="dropdown-item" href="./?action=reservation">Mes réservations</a>
                <a class="dropdown-item" href="./?action=emprunt">Mes prêts en cours</a>
                <a class="dropdown-item" href="#">Mes réservations</a>
                <a class="dropdown-item" href="#">Mes frais</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Historique des prêts</a>
                <a class="dropdown-item" href="#">Historique de recherche</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="./?action=deconnexion">Deconnexion</a>
              <?php } ?>


              </div>
        </li>


        <!-- si connecté acces compte perso avec sous-menu mon dossier v_menu_abonne.php au lieu de dossier abonne et s'inscrire en ligne -->
      </ul>
    </div>
  </div>
</nav>