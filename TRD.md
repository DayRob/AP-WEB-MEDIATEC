# TRD — Mediateq

## 1. Stack

| Élément | Choix |
|---|---|
| Langage serveur | PHP (testé en PHP 8) |
| Base de données | MySQL / MariaDB, base `mediateq-web` |
| Accès aux données | PDO, requêtes préparées, connexion unique (singleton) |
| Front | HTML, Bootstrap 4.3.1, jQuery 3.3.1, JavaScript (`JavaScript/fonction.js`, `main.js`) |
| Serveur | Apache (XAMPP / WAMP / MAMP) |

## 2. Architecture MVC

```
index.php ──► ?action=… ──► controleurPrincipal($action) ──► controleur/c_*.php
                                                         │
                         modele/*Manager.php (PDO) ◄─────┤
                         modele/<Entité>.php             │
                                                         ▼
                                                vue/v_*.php (+ Modal/, alert/)
```

- **Routage** : `controleurPrincipal()` associe chaque action à un contrôleur. La table des actions dépend de l'état de connexion : un visiteur n'a pas accès à `dossierAbonne`, `emprunt`, `historiqueRecherche`, `deconnexion`.
- **Modèle** : une classe métier par entité (`Abonne`, `Document`, `Livre`, `Dvd`, `Revue`, `Exemplaire`, `Reservation`, `Emprunt`…) et un *Manager* par entité, héritant de `Manager`.
- **Vues** : gabarits PHP (`header`, `menu`, `footer`), vues de résultats, modales d'édition et d'information, alertes de succès / erreur.

## 3. Actions

| Action | Contrôleur | Accès |
|---|---|---|
| `accueil`, `defaut`, `rechercheSimple` | `c_rechercheSimple.php` | Tous |
| `rechercheAvancee` | `c_rechercheAvancee.php` | Tous |
| `nouveautes` | `c_nouveautes.php` | Tous |
| `faq` | `c_faq.php` | Tous |
| `modale` | `controleurModale.php` | Tous |
| `reservation` | `c_reservation.php` | Tous (réservation effective si connecté) |
| `connexion` | `c_connexion.php` | Visiteur |
| `dossierAbonne`, `ModifierMdp`, `ModifierInfo` | `c_dossierAbonne.php` | Abonné |
| `emprunt` | `c_emprunt.php` | Abonné |
| `historiqueRecherche` | `c_historiqueRecherche.php` | Abonné |
| `deconnexion` | `c_deconnexion.php` | Abonné |

## 4. Authentification

- Session PHP (`$_SESSION`), vérification à chaque requête par `authentificationManager::isLoggedOn()`.
- Mot de passe stocké haché via la fonction MySQL `PASSWORD()`.

## 5. Configuration

Paramètres de connexion dans `modele/Manager.php` : serveur `localhost`, base `mediateq-web`, utilisateur `root`, mot de passe vide (environnement de développement).

## 6. Dette technique identifiée

| Point | Recommandation |
|---|---|
| `PASSWORD()` n'existe plus en MySQL 8 et n'est pas conçu pour les mots de passe applicatifs | Migrer vers `password_hash()` / `password_verify()` |
| Identifiants de base en dur | Fichier de configuration hors dépôt ou variables d'environnement |
| Pas de jeton CSRF sur les formulaires | Ajouter un jeton de session |
| Types incohérents (`reservation.id_document` en `int`, `document.id` en `varchar`) | Aligner les types et ajouter les clés étrangères manquantes |
