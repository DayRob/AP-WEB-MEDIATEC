# BACKEND SCHEMA — Mediateq

> Base MySQL / MariaDB `mediateq-web`, script d'import `sql/mediateq-web-final.sql`. Base partagée avec l'application de gestion C#.

## 1. Modèle

```
typeabonnement 1──n abonne 1──n emprunt n──1 document
                       └──1──n reservation
public 1──n document 1──1 livre
                    ├──1 dvd
                    ├──n exemplaire n──1 rayon
                    │              └──n──1 etat
                    ├──n commande
                    └──n est_décrit_par_2 n──1 descripteur 1──n revue 1──n parution n──1 etat
historique (recherches enregistrées)
categorie, collection (référentiels)
```

## 2. Tables

### Abonnés
| Table | Colonnes | Clés |
|---|---|---|
| `abonne` | id, nom, prenom, adresse, dateNaissance, adresseEmail, numeroTel, mdp (haché), dateAbonnement, idTypeAbonnement | PK id ; FK → typeabonnement |
| `typeabonnement` | idType, libelle | PK idType |

### Documents
| Table | Colonnes | Clés |
|---|---|---|
| `document` | id, titre, image (URL), commandeEnCours, idPublic | PK id ; FK → public |
| `livre` | idDocument, ISBN, auteur, collection | PK/FK → document |
| `dvd` | idDocument, synopsis, réalisateur, duree | PK/FK → document |
| `revue` | id, titre, empruntable, periodicite, delai_miseadispo, dateFinAbonnement, idDescripteur | PK id ; FK → descripteur |
| `parution` | idRevue, numero, dateParution, photo, idEtat | PK (idRevue, numero) ; FK → revue, etat |
| `exemplaire` | idDocument, numero, dateAchat, idRayon, idEtat | PK (idDocument, numero) ; FK → document, rayon, etat |
| `est_décrit_par_2` | idDocument, idDescripteur | PK composite ; FK → document, descripteur |
| `commande` | id, nbExemplaire, dateCommande, montant, idDocument | PK id ; FK → document |

### Activité
| Table | Colonnes | Clés |
|---|---|---|
| `reservation` | id (auto), id_abonne, id_document, id_exemplaire | PK id |
| `emprunt` | idEmprun, idAbonne, idDocument, dateDebut, dateFin, prolongeable | |
| `historique` | id (auto), libelle, date, nbResultat, requete | PK id |

### Référentiels
| Table | Valeurs |
|---|---|
| `public` | Jeunesse, Adultes, Tous publics, Ados |
| `categorie` | Jeunesse, Adultes, Tous publics, Ados |
| `etat` | neuf, usagé, détérioré, inutilisable |
| `rayon` | Rayon-1… |
| `descripteur` | Presse économique, culturelle, sportive, loisir, actualités… |
| `collection` | policier, chair de poule… |

## 3. Couche d'accès

Une classe *Manager* par table (`abonneManager`, `documentManager`, `livreManager`, `dvdManager`, `revueManager`, `exemplaireManager`, `reservationManager`, `empruntManager`, `historiqueManager`…), toutes héritant de `Manager` (connexion PDO partagée, requêtes préparées).

## 4. Points d'amélioration du schéma

- `reservation` et `emprunt` : ajouter les clés étrangères vers `abonne`, `document` et `exemplaire`, et aligner les types (`id_document` est un `int` alors que `document.id` est un `varchar(10)`).
- Nom de colonne `idEmprun` (coquille) et caractères accentués dans les identifiants (`réalisateur`, `est_décrit_par_2`) : à éviter.
