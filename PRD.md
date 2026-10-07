# PRD — Mediateq, portail web de médiathèque

> Product Requirements Document : le *quoi* et le *pourquoi*. Projet réalisé en BTS SIO (option SLAM) par Côme Villeroy de Galhau, Johan Poyet et Anthony Béal.

## 1. Contexte

Le système d'information de la médiathèque **Mediateq** est ancien et ses applications sont difficiles à maintenir. Dans le rôle d'une ESN chargée de la refonte, l'équipe développe le **portail web** destiné aux abonnés et aux visiteurs. Il s'appuie sur la même base de données que l'application de gestion du catalogue, développée en C#. Une base de code MVC existait déjà (recherche simple, nouveautés, FAQ).

## 2. Problème

- Les visiteurs ne peuvent pas consulter le catalogue en ligne de façon efficace.
- Les abonnés n'ont aucun espace pour gérer leur dossier, suivre leurs emprunts ou réserver un document.

## 3. Utilisateurs

| Persona | Besoins |
|---|---|
| **Visiteur** (non connecté) | Rechercher dans le catalogue, voir les nouveautés, lire la FAQ |
| **Abonné** (connecté) | Tout ce qui précède + gérer ses informations, réserver un exemplaire, suivre ses réservations et emprunts, retrouver ses recherches |

## 4. Objectifs

| Objectif | Mesure |
|---|---|
| Catalogue consultable par tous | Recherche simple et avancée sur livres, DVD et revues |
| Autonomie des abonnés | Modification des informations et du mot de passe sans passer par l'accueil |
| Réservation en ligne | Réservation d'un exemplaire disponible selon son état |
| Cohérence du SI | Une seule base partagée avec l'application C# |

## 5. Fonctionnalités

1. **Recherche simple** par mot ou lettre, sur livres, DVD et revues.
2. **Recherche avancée** multicritère.
3. **Historique des recherches** (abonné).
4. **Nouveautés** et **FAQ**.
5. **Connexion / déconnexion** par e-mail et mot de passe.
6. **Dossier abonné** : consultation et modification des informations personnelles et du mot de passe.
7. **Détail d'un document** en fenêtre modale : informations, disponibilité des exemplaires et leur état.
8. **Réservation** d'un exemplaire disponible, suivi des réservations.
9. **Emprunts** en cours de l'abonné.

## 6. Hors périmètre

- Gestion du catalogue, des commandes et des abonnements (application C#).
- Paiement en ligne.
- Inscription en ligne d'un nouvel abonné.

## 7. Exigences non fonctionnelles

- Architecture **MVC orientée objet** en PHP, sans framework.
- Interface responsive (Bootstrap 4).
- Accès aux données exclusivement via des requêtes préparées (PDO).
