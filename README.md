<p align="center">
  <img src="https://github.com/DayRob/AP-WEB-MEDIATEC/assets/78346006/b79908d9-7d9a-4216-af62-1323df1a8f12" alt="logo">
<p>
# Documentation utilisateur 
Pour l’application PHP Mediateq réalisé par Côme Villeroy de Galhau, Johan Poyet et Anthony Béal. 

## Contexte : 

Dans le cadre d'un projet de notre BTS, nous avons dû réaliser une application PHP sur le thème de la réservation de documents et de revues au sein d'une médiathèque. Le SI 
de Mediateq est ancien et les applications sont devenues difficilement maintenables : Mediateq souhaite donc les réécrire. Vous travaillez dans l’ESN chargée de cette refonte
des applications. Mediateq souhaite permettre à ses abonnés et aux visiteurs de consulter le catalogue de la médiathèque (livres, DVD, revues). Ce site devra également
permettre aux abonnés de gérer leur dossier, de consulter leurs réservations en cours, d’effectuer des réservations. Le site s’appuiera pour ceci sur la même base de données
que l’application de gestion du catalogue développée en C#. Un développement d’un site MVC POO en PHP été initié et on vous fournit une archive de son code actuel permettant
d’effectuer des recherches simples, d'afficher les nouveautés et la FAQ de la médiathèque. 

## Guide d'installation :

## Aide au paramétrage : 

## Fiche fonctionnalités : 

### Se connecter à son compte

Pour vous connecter à votre compte abonné, cliquez sur "Dossier abonné". Vous serez redirigé vers le formulaire de connexion suivant :

<p align="center">
  <img src="https://github.com/DayRob/AP-WEB-MEDIATEC/assets/78346006/c738bacc-06a7-4a69-b9ca-63f0aceda1f5" alt="Formulaire de connexion" width="400">
</p>

Dans ce formulaire, saisissez votre adresse e-mail et votre mot de passe. Si les informations que vous avez fournies sont correctes, vous serez redirigé vers la page suivante :

<p align="center">
  <img src="https://github.com/DayRob/AP-WEB-MEDIATEC/assets/78346006/17c80ac8-0bad-4556-b14f-ac5e70833cf7" alt="Page du dossier abonné" width="600">
</p>

Sur cette page, vous pouvez consulter vos informations personnelles et les modifier. Pour cela, cliquez sur :

- :key: "Modifier mot de passe" pour changer votre mot de passe :

<p align="center">
  <img src="https://github.com/DayRob/AP-WEB-MEDIATEC/assets/78346006/3ec8bd41-6095-4a3c-9a15-061649f0d1ed" alt="Modifier mot de passe" width="400">
</p>

- :pencil2: "Modifier mes renseignements personnels" pour mettre à jour vos informations :

<p align="center">
  <img src="https://github.com/DayRob/AP-WEB-MEDIATEC/assets/78346006/404979d9-6f24-4e10-a935-a481312a4156" alt="Modifier mes renseignements personnels" width="400">
</p>

Pour vous déconnecter, cliquez sur votre prénom en haut à droite et sélectionnez "Déconnexion" : :door:

<p align="center">
  <img src="https://github.com/DayRob/AP-WEB-MEDIATEC/assets/78346006/2b3c8ece-b604-459a-a808-548b383a8d3d" alt="Déconnexion" width="200">
</p>


Pour lancer la fonctionnalité de Gestion de la réservation des documents, il suffit de se rendre sur la page des recherches simple, il est possible aussi d’effectuée une recherche par mots ou lettre. Pour que cette fonctionnalité marche il faut se connecter en tant qu’utilisateur. 

 ![image](https://github.com/DayRob/AP-WEB-MEDIATEC/assets/51418295/e4ff656e-4019-4de0-b43f-b79b29b848ea)

Une fois sur cette page il faudra lancer la recherche en appuyant sur le bouton « lancer la recherche » pour avoir ce résultat.

 ![image](https://github.com/DayRob/AP-WEB-MEDIATEC/assets/51418295/d9659495-35ee-4fe1-9a2a-9f890955878d)


Vous pouvez maintenant accéder au informations des livres des dvd et des revus avec les disponibilités, leurs informations et aussi la possibilité de réserver un exemplaire en fonction de son état. Lorsque vous appuyer sur le bouton « afficher les détails » vous verrez cette modal apparaitre. 

![image](https://github.com/DayRob/AP-WEB-MEDIATEC/assets/51418295/a1626bdb-833a-40d9-ac68-8d7d1d814656)

 
Elle vous permet de réserver un exemplaire disponible d’un document en fonction de son état. Une fois la réservation prise en compte, il est possible de voir le nombre de réservation pour votre compte depuis l’espace utilisateur.


## Aide-mémoire :