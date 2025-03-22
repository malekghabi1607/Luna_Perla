// Événement DOMContentLoaded (actuellement vide, à compléter si nécessaire)
document.addEventListener("DOMContentLoaded", function () {
  // Code à exécuter lorsque le DOM est complètement chargé
});

/*
* Fonction viewProduct
* Redirige l'utilisateur vers la page de détail du produit en utilisant l'ID du produit.
*/
function viewProduct(productId) {
  window.location.href = racinePath + "control/bijou.php?id=" + productId;
}

/*
* Fonction deleteUser
* Supprime la ligne du tableau correspondant à l'utilisateur dont l'ID est fourni, après confirmation.
*/
function deleteUser(userId) {
  if (confirm("Êtes-vous sûr de vouloir supprimer cet utilisateur ?")) {
      // Recherche de la ligne ayant l'attribut data-user-id correspondant
      var row = document.querySelector("tr[data-user-id='" + userId + "']");
      if (row) {
          // Suppression de la ligne du DOM
          row.remove();
      }
      alert("User deleted successfully!");
  }
}

/*
* Fonction addUser
* Ajoute un nouvel utilisateur au tableau des utilisateurs après avoir recueilli les informations via des invites.
*/
function addUser() {
  // Demande du nom d'utilisateur
  var username = prompt("Entrez le nom d'utilisateur :");
  if (!username) return; // Arrête la fonction si aucune valeur n'est saisie

  // Demande de l'adresse e-mail
  var email = prompt("Entrez l'email :");
  if (!email) return;

  // Demande du rôle (avec valeur par défaut "Utilisateur")
  var role = prompt("Entrez le rôle (Admin/Utilisateur) :", "Utilisateur");
  if (!role) return;

  // Récupération du tbody du tableau des utilisateurs
  var tableBody = document.querySelector("#usersTable tbody");

  // Génération d'un nouvel ID (pour la démonstration, nombre de lignes + 1)
  var newId = tableBody.rows.length + 1;

  // Création d'une nouvelle ligne avec l'attribut data-user-id
  var newRow = document.createElement("tr");
  newRow.setAttribute("data-user-id", newId);

  // Création et affectation des cellules
  var idCell = document.createElement("td");
  idCell.textContent = newId;

  var usernameCell = document.createElement("td");
  usernameCell.textContent = username;

  var emailCell = document.createElement("td");
  emailCell.textContent = email;

  var roleCell = document.createElement("td");
  roleCell.textContent = role;

  var actionsCell = document.createElement("td");

  // Création du bouton de suppression de l'utilisateur
  var deleteBtn = document.createElement("button");
  deleteBtn.className = "btn-delete";
  deleteBtn.textContent = "Supprimer";
  deleteBtn.setAttribute("onclick", "deleteUser(" + newId + ")");

  // Ajout du bouton de suppression dans la cellule d'actions
  actionsCell.appendChild(deleteBtn);

  // Ajout des cellules à la nouvelle ligne
  newRow.appendChild(idCell);
  newRow.appendChild(usernameCell);
  newRow.appendChild(emailCell);
  newRow.appendChild(roleCell);
  newRow.appendChild(actionsCell);

  // Ajout de la nouvelle ligne au tableau des utilisateurs
  tableBody.appendChild(newRow);

  // Optionnel : envoyer une requête AJAX pour mettre à jour le backend avec le nouvel utilisateur.
}

/*
* Fonction addProduct
* Ajoute un nouveau produit au tableau des produits après avoir recueilli les informations via des invites.
*/
function addProduct() {
  // Demande du nom du produit
  var name = prompt("Entrez le nom du produit :");
  if (!name) return;

  // Demande du prix du produit
  var price = prompt("Entrez le prix du produit :");
  if (!price) return;

  // Demande du stock du produit
  var stock = prompt("Entrez le stock du produit :");
  if (!stock) return;

  // Demande du chemin de l'image (avec une valeur par défaut)
  var image = prompt("Entrez le chemin de l'image du produit :", "templates/back/images/collier-joana-1.jpg");
  if (!image) return;

  // Récupération du tbody du tableau des produits
  var tableBody = document.querySelector("#productsTable tbody");

  // Génération d'un nouvel ID (pour la démonstration, nombre de lignes + 1)
  var newId = tableBody.rows.length + 1;

  // Création d'une nouvelle ligne avec l'attribut data-product-id
  var newRow = document.createElement("tr");
  newRow.setAttribute("data-product-id", newId);

  // Création de la cellule pour l'image
  var tdImage = document.createElement("td");
  var imgElem = document.createElement("img");
  imgElem.src = image;
  imgElem.alt = name;
  tdImage.appendChild(imgElem);

  // Création de la cellule pour le nom du produit
  var tdName = document.createElement("td");
  tdName.textContent = name;

  // Création de la cellule pour le prix du produit
  var tdPrice = document.createElement("td");
  tdPrice.textContent = price;

  // Création de la cellule pour le stock du produit
  var tdStock = document.createElement("td");
  tdStock.textContent = stock;

  // Création de la cellule d'actions (lien détails et bouton de suppression)
  var tdAction = document.createElement("td");

  // Création du lien vers les détails du produit
  var detailsLinkElem = document.createElement("a");
  detailsLinkElem.href = "templates/back/bijou.php";
  detailsLinkElem.className = "btn-details";
  detailsLinkElem.textContent = "Voir le bijou";
  tdAction.appendChild(detailsLinkElem);

  // Ajout d'un espace entre le lien et le bouton
  tdAction.appendChild(document.createTextNode(" "));

  // Création du bouton de suppression du produit
  var deleteBtn = document.createElement("button");
  deleteBtn.className = "btn-delete";
  deleteBtn.textContent = "Supprimer";
  deleteBtn.onclick = function() {
      deleteProduct(newId);
  };
  tdAction.appendChild(deleteBtn);

  // Ajout des cellules à la nouvelle ligne
  newRow.appendChild(tdImage);
  newRow.appendChild(tdName);
  newRow.appendChild(tdPrice);
  newRow.appendChild(tdStock);
  newRow.appendChild(tdAction);

  // Ajout de la nouvelle ligne au tableau des produits
  tableBody.appendChild(newRow);
}

/*
* Fonction deleteProduct
* Supprime la ligne du tableau correspondant au produit dont l'ID est fourni, après confirmation.
*/
function deleteProduct(productId) {
  if (confirm("Êtes-vous sûr de vouloir supprimer ce produit ?")) {
      // Recherche de la ligne du tableau avec l'attribut data-product-id correspondant
      var row = document.querySelector("tr[data-product-id='" + productId + "']");
      if (row) {
          row.remove();
      }
      alert("Produit deleted successfully!");
  }
}