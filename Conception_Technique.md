# 📂 Conception Technique - Luna Perla

## 🏗️ Architecture et Organisation

### 🔹 Explication du fonctionnement du projet

Luna Perla est une plateforme e-commerce permettant aux utilisateurs d’acheter des bijoux personnalisés. Elle est divisée en **deux principales sections** :

- **Front Office** : Accessible aux utilisateurs pour consulter et commander des bijoux.
- **Back Office** : Espace réservé aux administrateurs pour gérer les produits, commandes et utilisateurs.

Le projet suit une architecture **MVC (Modèle-Vue-Contrôleur)** pour séparer la logique métier, l'affichage et la gestion des données.

### 🔹 Organisation du projet

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
  - `wireframe_luna_perla.pdf` : Wireframe du projet.

---

## 📊 Diagrammes UML

### 📌 Modèle relationnel de la base de données

*(Ajoutez ici une capture d’écran du modèle de la base de données)*

![IMG_736557BEBC02-1](https://github.com/user-attachments/assets/383bd490-a21f-46e5-a0c7-bf2697c299e2)
![IMG_1067](https://github.com/user-attachments/assets/8b8c46e3-ed3b-4731-a1d4-63475f6a2919)

### 📌 Diagrammes d'héritage

---

## 🎨 Maquettes et Captures d’écran

### 🔹 Wireframes et Maquette

🔗 [📄 Voir la maquette simplifiée du site](./Downloads/Wireframe%20Of%20Luna%20Perla%20Partie%203.pdf)
🔗 [📄 Voir la maquette finale du site](./wireframe%20of%20luna%20perla.pdf)

### 🔹 Captures d’écran de l’application

## 🔧 Technologies spécifiques côté serveur

- **Langage** : PHP
- **Base de données** : PostgreSQL
- **Serveur Web** : Apache
- **Frameworks** : Aucun, développement from scratch
- **Sécurité** : Filtrage des entrées, protection CSRF, gestion des sessions

---

## 🔄 Flux de données

*(Ajoutez ici une explication sur la circulation des données entre les composants du projet, illustrée par un schéma si possible)*

---

Ce document rassemble toutes les informations techniques du projet **Luna Perla**, nécessaires pour comprendre son architecture et son implémentation. 🚀
