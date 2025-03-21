<main>
	<!-- 📌 Conteneur principal -->
	<div class="contact-container">
		<h2 class="page-title">Nous Contacter</h2>
		<p class="contact-description">Une question ? Une demande spéciale ? Remplissez ce formulaire et nous vous
			répondrons rapidement !</p>

		<form action="<?php echo $action; ?>" method="<?php echo $method; ?>" class="contact-form">
			<div class="input-group">
				<label for="name">Nom & Prénom</label>
				<input id="name" name="name">
			</div>

			<div class="input-group">
				<label for="email">Adresse e-mail</label>
				<input id="email" name="email">
			</div>

			<div class="input-group">
				<label for="subject">Objet</label>
				<input id="subject" name="subject">
			</div>

			<div class="input-group">
				<label for="message">Message</label>
				<textarea id="message" name="message" rows="5"></textarea>
			</div>

			<button type="submit" class="btn-contact">Envoyer</button>
		</form>

		<div class="contact-info">
			<p><i class="fas fa-envelope"></i> Email : contact@lunaperla.com</p>
			<p><i class="fas fa-phone"></i> Téléphone : +33 1 23 45 67 89</p>
			<p><i class="fas fa-map-marker-alt"></i> Adresse : 123 Rue des Bijoux, Paris, France</p>
		</div>
	</div>
</main>