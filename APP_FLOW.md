# APP FLOW — Mediateq

## 1. Navigation

Menu principal : **Recherche simple · Recherche avancée · Nouveautés · FAQ · Dossier abonné** (ou prénom de l'abonné une fois connecté, avec menu Déconnexion).

## 2. Visiteur

```
Accueil (= recherche simple)
  ├─ saisie d'un mot ou d'une lettre ──► « Lancer la recherche »
  │     └─ résultats séparés : Livres · DVD · Revues
  │           └─ « Afficher les détails » ──► modale : informations + exemplaires + état
  ├─ Recherche avancée ──► critères multiples ──► résultats
  ├─ Nouveautés
  ├─ FAQ
  └─ Dossier abonné ──► formulaire de connexion
```

## 3. Connexion

```
Formulaire (e-mail + mot de passe)
  ├─ correct ──► session ouverte ──► page Dossier abonné
  └─ incorrect ──► alerte d'erreur, retour au formulaire
```

## 4. Abonné connecté

```
Dossier abonné
  ├─ consulter ses informations et le nombre de réservations
  ├─ « Modifier mot de passe » ──► modale ──► alerte de succès / d'erreur
  └─ « Modifier mes renseignements personnels » ──► modale ──► alerte

Recherche ──► détail d'un document (modale)
  └─ exemplaire disponible ──► « Réserver » ──► confirmation ──► réservation enregistrée
                                                  └─► visible dans « Mes réservations »

Emprunts ──► liste des emprunts en cours (dates, prolongeable)
Historique ──► recherches passées (libellé, date, nombre de résultats) ──► relancer
Prénom (en haut à droite) ──► Déconnexion ──► retour visiteur
```

## 5. Règles

- Une action inconnue ou non autorisée renvoie vers l'accueil (recherche simple).
- La réservation exige d'être connecté.
- Seul un exemplaire disponible peut être réservé.
