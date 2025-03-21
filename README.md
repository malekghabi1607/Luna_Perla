# 📖 README - Luna Perla

## 📌 Description du projet

LUNA_PERLA est un site e-commerce de bijoux permettant aux utilisateurs d’acheter des bijoux personnalisés. Il propose une **expérience utilisateur fluide** avec une interface intuitive et un **Back Office** permettant aux administrateurs de gérer les produits, les commandes et les utilisateurs.

---

## 🚀 Fonctionnalités principales

### **🛍️ Front Office (Utilisateur)**

- Page d’accueil avec mise en avant des nouveautés et des meilleures ventes.
- Catalogue des bijoux avec filtres (colliers, bagues, bracelets, etc.).
- Page détaillée des bijoux avec description, photos et options d’achat.
- Panier d’achat avec gestion des quantités.
- Système de commande sécurisé avec paiement.
- Page de connexion et espace utilisateur (historique des commandes, profil).
- Formulaire de contact.

### **🔒 Back Office (Administrateur)**

- **Page de Connexion (Login)** : Authentification des administrateurs.
- **Tableau de Bord (Dashboard)** : Gestion des produits, utilisateurs et commandes.
- **Gestion des FAQ** : Liste des questions fréquentes sur l’utilisation du site.

---

## 📁 Organisation du projet

Le projet **Luna Perla** est structuré en plusieurs parties :

- **Admin (Back Office)** :
  - Gestion des produits, commandes, FAQ et utilisateurs.
  - Interface réservée aux administrateurs.

- **Control (Front Office & Back Office)** :
  - Fichiers permettant la gestion des actions utilisateur et administrateur.

- **Model (Base de données)** :
  - Contient les modèles et les accès à la base de données PostgreSQL.

- **Templates (Front et Back Office)** :
  - Contient les interfaces utilisateurs et administrateurs.
  - Fichiers CSS, JavaScript et images nécessaires à l’affichage.

- **Fichiers principaux** :
  - `index.php` : Page d’accueil principale.
  - `.gitignore` : Exclut les fichiers inutiles du dépôt Git.
  - `README.md` : Documentation du projet.
  - `Cahier_des_charges.md` : Cahier des charges de ce projet.
  - `Conception_Technique.md` : Conception technique du projet.
  - `wireframe_luna_perla.pdf` : Wireframe du projet.

---

## 🛠 Technologies utilisées

- **Langages** : PHP, HTML, CSS, JavaScript
- **Base de données** : PostgreSQL
- **Serveur** : Apache
- **Frameworks** : Aucun (développement from scratch)
- **Sécurité** : Protection des données, gestion des accès.

---

## 📦 Installation et configuration

### 🌍 Déploiement (si applicable)

Si le projet est hébergé sur un serveur distant, ajoutez les instructions de déploiement ici.

### 🖥️ Prérequis

- Un serveur Apache avec PHP installé.
- PostgreSQL pour la gestion de la base de données.

### 📥 Installation

1. **Cloner le dépôt** :

```bash
git clone https://github.com/tonrepo/LUNA_PERLA.git
```

2. **Configurer la base de données** :

- Importer le fichier `database/database.sql` dans PostgreSQL.
- Modifier `config/config.php` avec les accès à la base de données.

3. **Lancer le serveur** :

- Démarrer Apache et PostgreSQL.
- Accéder au site via <http://localhost/LUNA_PERLA/>

---

## 📚 Utilisation

🔹 **Accès utilisateur** :

- Les utilisateurs peuvent parcourir la boutique et passer commande.
- Une connexion est nécessaire pour commander.

🔹 **Accès administrateur** :

- Connexion au Back Office via <http://localhost/LUNA_PERLA/admin/>.
- Gestion des bijoux, commandes et utilisateurs.

---

## 📞 Support

En cas de problème, contacter moi directement via <malekghabi129@gmail.com> ou  via le canal de discussion GitHub
---

## 📜 Licence

Projet sous licence MIT. Libre d’utilisation et de modification.
