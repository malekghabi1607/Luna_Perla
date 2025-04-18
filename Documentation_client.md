# 📘 Documentation Client - Luna Perla

Bienvenue dans la documentation du site **Luna Perla**. Ce guide est destiné à vous (client) pour comprendre le fonctionnement global de votre site e-commerce, son contenu, et la gestion des utilisateurs, produits, et commandes.

---

## 🏠 Structure Générale du Site

Le site se divise en deux grandes parties :

- **Frontend** (public) : accessible aux visiteurs et aux clients.
- **Backend** (admin) : réservé aux administrateurs pour gérer les données du site.

---

## 👥 Gestion des Utilisateurs

### 1. Inscription
- Les utilisateurs peuvent s'inscrire via le formulaire à l'adresse `/register`.
- Un mot de passe sécurisé est requis (min. 8 caractères, une majuscule, un chiffre).

### 2. Connexion
- Via `/login`, les utilisateurs peuvent se connecter à leur espace personnel.

### 3. Déconnexion
- Un bouton `Se déconnecter` est disponible dans l’espace personnel.

---

## 🛒 Fonctionnalités Client

### 1. Panier
- Le panier fonctionne avec **cookies** pour les utilisateurs non connectés.
- Si l’utilisateur se connecte, le panier est automatiquement **migré en base de données**.

### 2. Passer une commande
- Le bouton `Passer la commande` marque tous les articles du panier comme achetés.
- Une confirmation de succès ou d’erreur est affichée.

---

## 🧑‍💼 Espace Administrateur

Accessible via `/admin/login` avec les identifiants administrateurs.

### 1. Dashboard
- Vue d’ensemble des utilisateurs, produits, et commandes.

### 2. Produits
- Ajouter, modifier, supprimer un produit via le dashboard.

### 3. Utilisateurs
- Ajouter, modifier, supprimer des comptes utilisateurs.

### 4. Contacts
- Consultation des messages envoyés depuis le formulaire de contact.

---

## 🔒 Sécurité

- Protection CSRF intégrée pour tous les formulaires sensibles (login, enregistrement, ajout produit…).
- Validation côté client + serveur.
- Mots de passe hashés avec `bcrypt`.

---

## 🔄 URL Rewriting

Toutes les pages utilisent des **URLs propres** :
- `example.com/register` au lieu de `register.php`
- `example.com/admin/dashboard` au lieu de `admin/control/dashboard.php`

---

## 📬 Formulaire de Contact

- Accessible via `/contact`
- Envoie des messages stockés dans la base de données.
- Redirection vers une page de confirmation `/confirmation-contact`.

---

## 🗂 Structure des Dossiers
```
Luna_Perla/
├── admin/
│   ├── control/
│   ├── templates/back/
│   └── .htaccess
├── class/
├── model/
├── templates/front/
├── utils/
└── .htaccess
```
---

## ✅ Derniers Points

- Le site est **responsive** (adapté au mobile).
- La navigation est intuitive.
- Des messages de retour utilisateur sont affichés pour chaque action.

---
