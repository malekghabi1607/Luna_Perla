<div class="index_style">  
  <h1 class="title"><?php echo $titre; ?></h1>
  
  <!-- Section de gestion des produits -->
  <section class="user-management">
    <h2>Produits</h2>
    <?php if (isset($_GET['success']) && $_GET['success'] == 3): ?>
    <div style="background-color: #d4edda; color: #155724; padding: 15px; border-radius: 5px; margin-bottom: 20px; text-align: center;">
        ✅ Produit ajouté avec succès !
    </div>
<?php endif; ?>
<?php if (isset($_GET['success']) && $_GET['success'] == 4): ?>
    <div style="background-color: #d4edda; color: #155724; padding: 15px; border-radius: 5px; margin-bottom: 20px; text-align: center;">
        ✅ Produit supprimé avec succès !
    </div>
<?php endif; ?>
<?php if (isset($_GET['success']) && $_GET['success'] == 5): ?>
    <div style="background-color: #d4edda; color: #155724; padding: 15px; border-radius: 5px; margin-bottom: 20px; text-align: center;">
        ✅ Produit modifié avec succès !
    </div>
<?php endif; ?>
    <table id="productsTable" class="products-table">
      <thead>
        <tr>
          <th>Nom du Produit</th>
          <th>Prix</th>
          <th>Stock</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($products as $product): ?>
        <tr data-product-id="<?php echo $product->id; ?>">

          <td><?php echo htmlspecialchars($product->specific_name); ?></td>
          <td><?php echo number_format($product->prix, 2, ',', ' ') . '€'; ?></td>
          <td><?php echo $product->stock; ?></td>
          <td>
          <a href="<?= $base_url ?>/admin/modifier_produit-<?= $product->id ?>" class="btn-edit">Modifier</a>

          <a href="<?= $base_url ?>/admin/delete_produit-<?= $product->id ?>" 
            class="btn-delete"
            onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce produit ?');">
            Supprimer
          </a>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    <a href="<?= $base_url ?>/admin/ajout_produit" class="btn-add">Ajouter un produit</a>
  </section>

  <!-- Section de gestion des utilisateurs -->
  <section class="user-management">
    <h2>Gestion des Utilisateurs</h2>
    <?php if (isset($_GET['success']) && $_GET['success'] == 1): ?>
    <div style="background-color: #d4edda; color: #155724; padding: 15px; border-radius: 5px; margin-bottom: 20px; text-align: center;">
        ✅ Utilisateur ajouté avec succès !
    </div>
<?php endif; ?>
<?php if (isset($_GET['success']) && $_GET['success'] == 2): ?>
    <div style="background-color: #d4edda; color: #155724; padding: 15px; border-radius: 5px; margin-bottom: 20px; text-align: center;">
        ✅ Utilisateur supprimé avec succès !
    </div>
<?php endif; ?>
<?php if (isset($_GET['success']) && $_GET['success'] == 6): ?>
    <div style="background-color: #d4edda; color: #155724; padding: 15px; border-radius: 5px; margin-bottom: 20px; text-align: center;">
        ✅ Utilisateur modifié avec succès !
    </div>
<?php endif; ?>
    <table id="usersTable" class="users-table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nom d'utilisateur</th>
          <th>Email</th>
          <th>Rôle</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($users as $user): ?>
        <tr data-user-id="<?php echo $user->id; ?>">
          <td><?php echo $user->id; ?></td>
          <td><?php echo htmlspecialchars($user->username); ?></td>
          <td><?php echo htmlspecialchars($user->email); ?></td>
          <td><?php echo $user->role; ?></td>
          <td>
          <a href="<?= "$base_url/admin/modifier_user-$user->id" ?>" class="btn-edit">Modifier</a>

          <a href="<?= "$base_url/admin/delete_user-$user->id" ?>"
            class="btn-delete"
            onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?');">
            Supprimer
          </a>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    <a href="<?= $base_url ?>/admin/ajout_user" class="btn-add">Ajouter un utilisateur</a>
  </section>
</div>


