<?php
// Vérifier que $racine_path est bien défini
if (!isset($racine_path)) {
	$racine_path = './'; // Valeur par défaut
}
?>

<!-- 🏠 Logo du site -->
<div class="logo">
	<a class="navbar-brand" href="<?php echo $racine_path . 'index.php'; ?>">Luna Perla</a>
</div>

<nav class="navbar navbar-expand-lg bg-light">
	<div class="container-fluid">
		<!-- 🛠️ Bouton pour mobile -->
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
			aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse justify-content-between" id="navbarNav">
			<!-- 🌿 Menu principal -->
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" href="<?php echo $racine_path . 'index.php'; ?>">Accueil</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo $racine_path . 'control/collection.php'; ?>">Collection</a>
				</li>

				<li class="nav-item">
					<a class="nav-link" href="<?php echo $racine_path . 'control/notre-histoire.php'; ?>">Notre Histoire</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo $racine_path . 'control/soldes.php'; ?>">Soldes</a>

				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo $racine_path . 'control/best-sellers.php'; ?>">Best Sellers</a>
				</li>
			</ul>
		</div>
	</div>
</nav>

<!-- 🔍 Icônes à droite -->
<div class="d-flex align-items-center">
	<a href="<?php echo $racine_path . '/control/login.php'; ?>" class="nav-link">
		<i class="fas fa-user"></i>
	</a>
	<a href="<?php echo $racine_path . 'control/panier.php'; ?>" class="nav-link">
		<i class="fas fa-shopping-bag"></i>
	</a>

	
</div>