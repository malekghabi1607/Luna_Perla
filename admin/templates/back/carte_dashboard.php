<!-- Contenu de la page Dashboard (affichage des produits et des utilisateurs) -->

<div class="index_style">  
  <!-- Titre principal du dashboard -->
  <h1 class="title"><?php echo $titre; ?></h1>
  
  <!-- Section de gestion des produits -->
  <section class="user-management">
    <h2>Produits</h2>

    <!-- Tableau des produits -->
    <table id="productsTable" class="products-table">
      <thead>
        <tr>
          <th>Image</th>
          <th>Nom du Produit</th>
          <th>Prix</th>
          <th>Stock</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($products as $product): ?>
        <!-- Ligne pour chaque produit -->
        <tr data-product-id="<?php echo $product['id']; ?>">
          <td>
            <!-- Image du produit -->
            <img src="<?php echo $product['image']; ?>" alt="<?php echo htmlspecialchars($product['name']); ?>">
          </td>
          <td>
            <!-- Nom du produit -->
            <?php echo $product['name']; ?>
          </td>
          <td>
            <!-- Prix du produit -->
            <?php echo $product['price']; ?>
          </td>
          <td>
            <!-- Stock du produit -->
            <?php echo $product['stock']; ?>
          </td>
          <td>
            <!-- Lien pour voir le produit -->
            <a href="<?php echo $product['details_link']; ?>" class="btn-details">Voir le bijou</a>
            <!-- Bouton pour supprimer le produit -->
            <button class="btn-delete" onclick="deleteProduct(<?php echo $product['id']; ?>)">Supprimer</button>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>

    <!-- Bouton pour ajouter un produit -->
    <button class="btn-add-product" onclick="addProduct()">Ajouter un produit</button>
  </section>

  <!-- Section de gestion des utilisateurs -->
  <section class="user-management">
    <h2>Gestion des Utilisateurs</h2>
    <!-- Tableau des utilisateurs -->
    <table id="usersTable" class="users-table">
      <thead>
        <tr data-user-id="2">
          <th>ID</th>
          <th>Nom d'utilisateur</th>
          <th>Email</th>
          <th>Rôle</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($users as $user): ?>
        <!-- Ligne pour chaque utilisateur -->
        <tr data-user-id="<?php echo $user['id']; ?>">
          <td>
            <!-- Identifiant de l'utilisateur -->
            <?php echo $user['id']; ?>
          </td>
          <td>
            <!-- Nom d'utilisateur -->
            <?php echo $user['username']; ?>
          </td>
          <td>
            <!-- Email de l'utilisateur -->
            <?php echo $user['email']; ?>
          </td>
          <td>
            <!-- Rôle de l'utilisateur -->
            <?php echo $user['role']; ?>
          </td>
          <td>
            <!-- Bouton pour supprimer l'utilisateur -->
            <button class="btn-delete" onclick="deleteUser(<?php echo $user['id']; ?>)">Supprimer</button>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    <!-- Bouton pour ajouter un utilisateur -->
    <button class="btn-add" onclick="addUser()">Ajouter un utilisateur</button>
  </section>
</div>