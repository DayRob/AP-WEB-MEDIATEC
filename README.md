<p align="center">
  <img src="https://github.com/DayRob/AP-WEB-MEDIATEC/assets/78346006/b79908d9-7d9a-4216-af62-1323df1a8f12" alt="Logo Mediateq" width="220">
</p>

<h1 align="center">Mediateq — Portail web de médiathèque</h1>

<p align="center">
  Site PHP MVC orienté objet permettant de consulter le catalogue d'une médiathèque et de gérer ses réservations.<br>
  <em>Projet réalisé dans le cadre du BTS SIO (option SLAM).</em>
</p>

<p align="center">
  <img src="https://img.shields.io/badge/PHP-8-777BB4?logo=php&logoColor=white" alt="PHP">
  <img src="https://img.shields.io/badge/MySQL-MariaDB-4479A1?logo=mysql&logoColor=white" alt="MySQL">
  <img src="https://img.shields.io/badge/Bootstrap-4.3-7952B3?logo=bootstrap&logoColor=white" alt="Bootstrap">
  <img src="https://img.shields.io/badge/jQuery-3.3-0769AD?logo=jquery&logoColor=white" alt="jQuery">
  <img src="https://img.shields.io/badge/Architecture-MVC-informational" alt="MVC">
</p>

---

## Contexte

Le système d'information de la médiathèque **Mediateq** est ancien et ses applications sont devenues difficiles à maintenir. Dans le rôle d'une ESN chargée de leur refonte, l'équipe a développé le portail web destiné aux abonnés et aux visiteurs.

Le site s'appuie sur la même base de données que l'application de gestion du catalogue développée en C#. À partir d'une base de code MVC existante (recherche simple, nouveautés, FAQ), nous avons conçu et ajouté la gestion des comptes abonnés et des réservations.

## Fonctionnalités

| Fonctionnalité | Description |
|---|---|
| 🔎 **Recherche simple et avancée** | Recherche dans le catalogue de livres, DVD et revues, avec historique des recherches |
| 🆕 **Nouveautés** | Mise en avant des derniers documents ajoutés |
| 🔐 **Authentification** | Connexion / déconnexion des abonnés par e-mail et mot de passe |
| 👤 **Dossier abonné** | Consultation et modification des informations personnelles et du mot de passe |
| 📚 **Réservations** | Réservation d'un exemplaire disponible selon son état, suivi des réservations en cours |
| 📖 **Emprunts** | Consultation des emprunts de l'abonné |
| ❓ **FAQ** | Questions fréquentes de la médiathèque |

## Architecture

Application PHP en **MVC orienté objet**, sans framework :

```
AP-WEB-MEDIATEC/
├── index.php            # Point d'entrée : route ?action=... vers le bon contrôleur
├── controleur/          # Contrôleurs (connexion, recherche, réservation, dossier abonné…)
├── modele/              # Classes métier + Managers d'accès aux données (PDO)
├── vue/                 # Vues, modales et alertes
├── css/  JavaScript/    # Styles et scripts du site
├── bib/                 # Bibliothèques tierces (Bootstrap 4.3, jQuery 3.3)
├── images/              # Couvertures des livres et revues
└── sql/
    ├── mediateq-web-final.sql   # Base de données finale (à importer)
    └── archives/                # Versions intermédiaires du schéma
```

Chaque entité (`abonne`, `document`, `livre`, `dvd`, `revue`, `exemplaire`, `reservation`, `emprunt`…) possède une classe métier et un *Manager* qui hérite de `Manager` (connexion PDO partagée en singleton).

## Installation

### Prérequis

- PHP 8 et un serveur web (XAMPP, WAMP, MAMP ou Apache/Nginx)
- MySQL ou MariaDB

### Étapes

1. Cloner le dépôt dans le dossier servi par le serveur web (par exemple `htdocs/` avec XAMPP) :
   ```bash
   git clone https://github.com/DayRob/AP-WEB-MEDIATEC.git
   ```
2. Créer une base de données nommée `mediateq-web`, puis y importer `sql/mediateq-web-final.sql` (phpMyAdmin ou ligne de commande) :
   ```bash
   mysql -u root -e "CREATE DATABASE \`mediateq-web\` CHARACTER SET utf8mb4;"
   mysql -u root mediateq-web < sql/mediateq-web-final.sql
   ```
3. Si besoin, adapter les paramètres de connexion dans `modele/Manager.php` (`$serveur`, `$bd`, `$login`, `$mdp`). Par défaut : `localhost`, `mediateq-web`, `root`, mot de passe vide.
4. Ouvrir http://localhost/AP-WEB-MEDIATEC/ dans un navigateur.

## Guide utilisateur

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


### Rechercher et réserver un document

Rendez-vous sur la page **Recherche simple** : vous pouvez rechercher par mot ou par lettre. La réservation nécessite d'être connecté avec un compte abonné. 

![image](https://github.com/DayRob/AP-WEB-MEDIATEC/assets/51418295/e4ff656e-4019-4de0-b43f-b79b29b848ea)

Cliquez sur **« Lancer la recherche »** pour afficher les résultats :

![image](https://github.com/DayRob/AP-WEB-MEDIATEC/assets/51418295/d9659495-35ee-4fe1-9a2a-9f890955878d)


Vous accédez alors aux informations des livres, DVD et revues, à leur disponibilité, et pouvez réserver un exemplaire selon son état. Le bouton **« Afficher les détails »** ouvre la fenêtre suivante : 

![image](https://github.com/DayRob/AP-WEB-MEDIATEC/assets/51418295/a1626bdb-833a-40d9-ac68-8d7d1d814656)

 
Elle permet de réserver un exemplaire disponible. Une fois la réservation enregistrée, elle apparaît dans votre espace abonné.

## Équipe

Projet réalisé par :

- **Côme Villeroy de Galhau** — [@DayRob](https://github.com/DayRob)
- **Johan Poyet**
- **Anthony Béal**
