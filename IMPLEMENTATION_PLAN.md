# IMPLEMENTATION PLAN — Mediateq

## Historique du projet

| # | Étape | Contenu | Statut |
|---|---|---|---|
| 0 | Existant fourni | Socle MVC, recherche simple, nouveautés, FAQ | ✅ Reçu |
| 1 | Base de données | Évolution du schéma (versions `mediateq`, `v2`, `v3` → `mediateq-web-final`) | ✅ Fait |
| 2 | Authentification | Connexion, déconnexion, session, actions selon l'état de connexion | ✅ Fait |
| 3 | Dossier abonné | Consultation, modification des informations et du mot de passe (modales) | ✅ Fait |
| 4 | Détail & réservation | Modale de détail, disponibilité par état, réservation d'un exemplaire | ✅ Fait |
| 5 | Recherche avancée & historique | Recherche multicritère, historique des recherches | ✅ Fait |
| 6 | Emprunts | Liste des emprunts de l'abonné | ✅ Fait |
| 7 | Documentation | Guide utilisateur, guide d'installation, README | ✅ Fait |

## Améliorations proposées

| Priorité | Évolution |
|---|---|
| 🔴 Haute | Remplacer `PASSWORD()` par `password_hash()` / `password_verify()` |
| 🔴 Haute | Sortir les identifiants de base de `Manager.php` (fichier de configuration non versionné) |
| 🟠 Moyenne | Jetons CSRF sur les formulaires de modification et de réservation |
| 🟠 Moyenne | Clés étrangères et types cohérents sur `reservation` et `emprunt` |
| 🟢 Basse | Annulation d'une réservation par l'abonné |
| 🟢 Basse | Prolongation d'un emprunt quand `prolongeable = 1` |
| 🟢 Basse | Tests (PHPUnit) sur les Managers |

## Installation

Voir le README : base `mediateq-web`, import de `sql/mediateq-web-final.sql`, réglage de `modele/Manager.php`, ouverture de `http://localhost/AP-WEB-MEDIATEC/`.
