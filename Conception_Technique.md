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
![IMG_736557BEBC02-1](https://github.com/user-attachments/assets/383bd490-a21f-46e5-a0c7-bf2697c299e2)

### 📌 Diagrammes d'héritage
![IMG_1067](https://github.com/user-attachments/assets/8b8c46e3-ed3b-4731-a1d4-63475f6a2919)



---

## 🎨 Maquettes et Captures d’écran

### 🔹 Wireframes et Maquette
- 🔗 [📄 Télécharger la maquette simplifiée](https://github.com/malekghabi1607/Luna_Perla/raw/main/docs/wireframe_simplifie.pdf)  
- 🔗 [📄 Télécharger la maquette finale](https://github.com/malekghabi1607/Luna_Perla/raw/main/docs/wireframe_final.pdf)

### 🔹 Captures d’écran de l’application

## 🔧 Technologies spécifiques côté serveur

- **Langage** : PHP
- **Base de données** : PostgreSQL
- **Serveur Web** : Apache
- **Frameworks** : Aucun, développement from scratch
- **Sécurité** : Filtrage des entrées, protection CSRF, gestion des sessions

---

### 🔄 Flux de données

Dans notre projet **Luna Perla**, le flux de données suit une architecture classique **client-serveur**, où les informations circulent entre le **Front-End** (interface utilisateur), le **Back-End PHP** (traitement) et la **base de données PostgreSQL**.

#### 📥 Exemple d’un parcours utilisateur :
1. **Le client** (utilisateur) accède au site via son navigateur web.
2. Il consulte les bijoux disponibles → **le front envoie une requête HTTP**.
3. Le **Back-End PHP** récupère les données via des requêtes SQL vers la base PostgreSQL.
4. Les **données des produits** (nom, prix, image, description…) sont renvoyées au Front-End et affichées.
5. Lors d’un achat ou d’une inscription, le client envoie un formulaire → **PHP traite les données**, vérifie leur validité, puis **les enregistre en base**.

---
