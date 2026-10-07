# DESIGN BRIEF — Mediateq

## 1. Personnalité

**Accueillant et institutionnel** : l'image d'une médiathèque de quartier, claire et rassurante, au service de tous les publics.

## 2. Principes

1. **La recherche au centre** : la page d'accueil est la recherche simple.
2. **Couvertures visibles** : les visuels des livres et revues aident à reconnaître un document.
3. **Détails sans changer de page** : informations et réservation dans une fenêtre modale.
4. **Retour explicite** : chaque action affiche une alerte de succès ou d'erreur.

## 3. Identité visuelle

| Élément | Valeur |
|---|---|
| Logo | `css/logo.png` (source `logo.pdn`), favicon `logo.ico`, mini-logo |
| Bandeau | `css/bandeau.png` sur fond `bandeau-bg.png` |
| Fond de page | `#f9f9f9` avec texture `page-bg-1.jpg` |
| Texte | `#333` (principal), `#666666` (secondaire), `#babbbc` (discret) |
| Cartes et blocs | Blanc, accent `cornsilk` pour la mise en avant |
| Framework | Bootstrap 4.3.1 (grille, boutons, modales, alertes) |
| Icônes | Icône utilisateur (`person-fill.svg`), icône d'avertissement |

## 4. Composants

- **Bandeau + menu** (`v_bandeau.php`, `v_menu.php`).
- **Formulaire de recherche** simple et avancée.
- **Liste de résultats** par type de document, avec vignette.
- **Modales** : détail livre / DVD, modification du mot de passe, modification des informations.
- **Alertes** Bootstrap de succès et d'erreur.

## 5. Responsive et accessibilité

- Grille Bootstrap : utilisable sur mobile et ordinateur.
- Champs de formulaire libellés, textes alternatifs sur les couvertures.
