# ✨ Cahier des Charges - Luna Perla ✨

## **1. 🌟 Présentation du Projet**

- **Nom du projet** : LUNA_PERLA  
- **Client** : Projet étudiant fictif  
- **Description** : Luna Perla est une boutique en ligne de bijoux personnalisés permettant aux utilisateurs de découvrir, personnaliser et acheter des bijoux de qualité.

### **Objectifs**

- Offrir une plateforme ergonomique et intuitive.  
- Permettre la gestion complète des commandes et des utilisateurs.  
- Assurer une gestion sécurisée des transactions et des données.  
- Optimiser l’expérience utilisateur pour une navigation fluide.  

- **Cible** : Femmes à la recherche de bijoux personnalisés et élégants  
- **Concurrence** : Autres sites de bijoux en ligne (ex. Pandora, Swarovski…)  

### **Objectifs Fonctionnels et Non-Fonctionnels**

#### ✅ **Objectifs Fonctionnels**

- Permettre la consultation et l'achat de bijoux en ligne.  
- Offrir un système de personnalisation des bijoux.  
- Gérer les commandes et l'espace client.  
- Permettre la gestion de l'inventaire et des stocks.  

#### ♻️ **Objectifs Non-Fonctionnels**

- Interface ergonomique et responsive (adaptée mobile/tablette).  
- Optimisation de la performance pour un chargement rapide.  
- Possibilité d'évolution (ajout de nouvelles fonctionnalités futures).  

---

## **2. 🌟 Fonctionnalités du Site**

### **A. Partie Front Office (Utilisateur)**

#### **1. Page d’Accueil (`index.php` / `main.php`)**

L’accueil de **Luna Perla** offre une interface intuitive et élégante, mettant en avant les bijoux de la marque dès l’arrivée sur le site.

- **En-tête et navigation** :
  - Logo **"Luna Perla"** en haut à gauche.
  - Menu de navigation avec : **Accueil, Collection, Soldes, Best Sellers, Notre Histoire, Contact**.
  - Icône **utilisateur** pour accéder au compte.
  - Icône **panier** pour visualiser les achats.

- **Bannière de bienvenue** :
  - Grande image principale avec une ambassadrice portant les bijoux.
  - Texte d’accueil **"BIENVENUE Chez Luna Perla"** avec un cœur décoratif.

- **Catégories de produits** :
  - **Collections** : Bijoux classés par gamme.
  - **Soldes** : Produits en promotion (*Facultatif, selon disponibilité*).
  - **Best Sellers** : Bijoux les plus populaires (*Facultatif, selon disponibilité*).

- **Produits mis en avant** :
  - Trois bijoux phares affichés sous la bannière sur **fond rose poudré**.
  - Présentation sous forme de cartes avec **nom, prix et bouton "Voir"** pour plus de détails.

- **Bouton flottant de contact** :
  - Icône située en bas à droite de l’écran.
  - Permet un accès rapide à la page **Contact** pour toute demande d’information ou assistance.

- **Pied de page** :
  - Liens vers : **Catalogue, Notre Histoire, Contact, Compte utilisateur**.
  - Mentions légales et droits réservés.

**Interactions :**

- Un clic sur **Accueil** redirige vers `index.php`.
- Un clic sur **Collection** redirige vers `collection.php`.
- Un clic sur **Notre Histoire** redirige vers `notre-histoire.php`.
- Un clic sur **Soldes** redirige vers `soldes.php`.
- Un clic sur **Best Sellers** redirige vers `best-sellers.php`.
- Un clic sur l'**icône du compte utilisateur** redirige vers `compte.php`.
- Un clic sur l'**icône du pnier** redirige vers `panier.php`.
- Un clic sur un bijou mène à `bijou.php`.
- Un clic sur "En savoir plus" dans "Notre Histoire" renvoie vers `notre-histoire.php`.
- Un clic sur le **bouton flottant de contact** redirige vers `contact.php`.

---

#### **2. Page Collection (`collection.php`)**

- **Présentation des bijoux par catégories** : bagues, colliers, bracelets, boucles d’oreilles.
- **Filtrage avancé** par prix, matériau et popularité.
- **Affichage sous forme de cartes** avec : image, nom, prix et bouton "Voir".

**Interactions :**

- Sélection d’un filtre actualise la liste des bijoux.
- Cliquer sur **"Voir le bijou"** redirige vers `bijou.php`.
- Un clic sur le **bouton flottant de contact** redirige vers `contact.php`.

---

#### **3. Page Produit (`bijou.php`)**

- **Détails complets du bijou** :
  - Nom, prix et stock disponible.
  - Galerie d’images en haute résolution.
  - **Personnalisation** : couleur, quantité.
  - **Bouton "Ajouter au panier"**.
  - **Description détaillée** du bijou et occasions recommandées.
  - **Suggestions de bijoux similaires**.(*Facultatif*)
  - **Avis clients** avec notes et commentaires.(*Facultatif*)

**Interactions :**

- Modifier la **quantité** avant l’ajout au panier.
- Affichage des **avis clients** et possibilité de laisser un commentaire.
- Un clic sur le **bouton flottant de contact** redirige vers `contact.php`.

---

#### **4. Page Soldes (`soldes.php`)** (*Facultatif*)

- Liste des bijoux en promotion avec **prix barré** et réduction affichée.
- **Filtrage par taux de réduction** (-10%, -20%, etc.).
- **Affichage similaire à la collection**.

**Interactions :**

- Sélection d’un filtre actualise la liste des promotions.
- Un clic sur **"Voir le bijou"** redirige vers `bijou.php`.
- Un clic sur le **bouton flottant de contact** redirige vers `contact.php`.

---

#### **5. Page Best Sellers (`bestsellers.php`)** (*Facultatif*)

- Affichage des bijoux les plus populaires.
- **Avis clients mis en avant**.
- **Affichage similaire à la collection**.

**Interactions :**

- Un clic sur **"Voir le bijou"** redirige vers `bijou.php`.
- Un clic sur le **bouton flottant de contact** redirige vers `contact.php`.

---

#### **6. Panier (`panier.php`)**

- Liste des **articles sélectionnés** avec :
  - Nom, image, prix et quantité.
  - Options pour modifier ou supprimer un article.
- **Résumé de la commande** avec total calculé.
- **Bouton "Passer la commande"** (*Facultatif* si le paiement est mis en place).

**Interactions :**

- Modifier la **quantité** met à jour le total.
- Supprimer un article le retire immédiatement du panier.
- Un clic sur le **bouton flottant de contact** redirige vers `contact.php`.

---

#### **7. Formulaire de Contact (`contact.php`)**

- **Champs requis** : nom, email, message.
- **Validation automatique** avant soumission.
- **Confirmation d’envoi** affichée après soumission.

**Interactions :**

- Cliquer sur **"Envoyer"** envoie le message et affiche une confirmation.

---

#### **8. Connexion & Inscription (`login.php`)** (*Facultatif*)

- **Formulaire de connexion sécurisé** : email + mot de passe.
- **Formulaire d’inscription** (*Facultatif*).

**Interactions :**

- Un clic sur le **bouton flottant de contact** redirige vers `contact.php`.

---

#### **9. Espace Utilisateur (`compte.php`)**

- Consultation des **informations personnelles**.
- Historique des **commandes passées**.
- **Ajout d’une liste de souhaits**.

**Interactions :**

- Un clic sur le **bouton flottant de contact** redirige vers `contact.php`.

---

#### **10. Page "Notre Histoire" (`notre-histoire.php`)**

- Présentation de l’**origine de la marque** et de ses engagements.
- Images illustrant l’atelier et la fabrication des bijoux.
- Bouton **"En savoir plus"** pour explorer davantage.

**Interactions :**

- Un clic sur le **bouton flottant de contact** redirige vers `contact.php`.

---

---

### **B. Partie Back Office (Administrateur)**

L’accès à l’administration du site est restreint aux administrateurs.  
**La première page qui s’affiche est la page de connexion**, obligeant l’utilisateur à s’authentifier avant d’accéder au contenu du back-office.  
Si l’utilisateur n’est pas un administrateur, il ne pourra pas poursuivre.

Le back-office du site comprend **quatre pages principales** :

1. **La page de connexion** (*Login Page*) : permet l’authentification des administrateurs.
2. **Le tableau de bord** (*Dashboard*) : regroupe toutes les fonctionnalités de gestion (produits, utilisateurs, etc.).
3. **Une page de présentation** : représentant l’univers de la boutique et ses bijoux.
4. **Une page FAQ** : regroupant les questions et réponses concernant l’utilisation du site et des fonctionnalités administratives.

Toutes les fonctionnalités ci-dessous sont accessibles depuis **la page du Dashboard**, qui constitue le centre de gestion des utilisateurs, des produits et d’autres éléments administratifs.

---

#### **1. Gestion des Utilisateurs**

- **Liste des utilisateurs** avec nom, email, rôle (client/admin).
- Boutons pour **ajouter, modifier, supprimer** un utilisateur.

**Interactions :**

- Ajouter un utilisateur avec nom, email et rôle.
- Supprimer un utilisateur affiche une confirmation avant action.
- Modifier un utilisateur ouvre un formulaire d’édition. *(Facultatif)*

---

#### **2. Gestion des Produits**

- Ajouter de **nouveaux bijoux** avec photo, description, prix et stock.
- Supprimer un bijou du catalogue.
- Modifier les informations d’un bijou. *(Facultatif)*

**Interactions :**

- Cliquer sur "Ajouter un bijou" ouvre un formulaire de création.
- Modifier un bijou permet de mettre à jour ses caractéristiques.
- Supprimer un bijou le retire de la base de données.

---

#### **3. Gestion des Commandes** *(Facultatif)*

- Voir les **commandes en cours et passées**.
- Modifier le **statut d’une commande** (En cours, Expédiée, Livrée).
- Filtrer les commandes par date ou statut.

**Interactions :**

- Modifier une commande change son état en base de données.

---

#### **4. Gestion des Messages Clients** *(Facultatif)*

- Affichage des **demandes envoyées via le formulaire de contact**.
- Possibilité de **répondre directement aux clients**.

**Interactions :**

- Ouvrir un message affiche son contenu détaillé.
- Répondre envoie un email directement au client.

---

## **3. 🌟 Design et Ergonomie**

### **Charte Graphique**

- **Palette de couleurs** : Beige rosé, blanc, doré, avec des accents doux pour une touche élégante.  
- **Typographie** : Élégante et raffinée pour une lecture agréable.  
- **Icônes** : Épurées et minimalistes, en cohérence avec l’univers du luxe.  

### **Maquettes et Wireframes**

- **Réalisation des maquettes et wireframes** sur **Figma**.  
- **Mockups interactifs** pour prévisualiser le rendu final.  

### **Responsive Design**

- Le site s'adapte automatiquement aux écrans mobile, tablette et desktop.  
- Utilisation de **CSS Grid** pour assurer une mise en page fluide.  

---

## **4. 🌟 Contraintes et Délais**

### **⌚️ Planning du projet**

- **Phase 1 :** Définition du cahier des charges.  
- **Phase 2 :** Création des Wireframes.  
- **Phase 3 :** Développement et Tests.  
- **Phase 4 :** Déploiement et évaluation.  

### **⚖️ Contraintes techniques**

- Interface **responsive**.  
- Code **propre et commenté**.  
- Évolutivité pour intégrer de nouvelles fonctionnalités (système de fidélité, etc.).  

---

## **5. 🌟 Notes supplémentaires**

- Les sections concernant les **technologies utilisées, la sécurité et l’architecture** seront documentées dans un fichier **README.md** et un document de **Conception Technique**.
