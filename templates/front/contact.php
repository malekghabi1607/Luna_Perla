<main>
  <div class="contact-container">
    <h2 class="page-title">Nous Contacter</h2>
    <p class="contact-description">Une question ? Une demande spéciale ? Remplissez ce formulaire et nous vous répondrons rapidement !</p>

    <!-- ✅ URL rewriting : action vers /contact -->
    <form action="<?= $base_url ?>/contact" method="POST" class="contact-form">      <div class="input-group">
        <label for="nom">Nom & Prénom</label>
        <input type="text" id="nom" name="nom" required>
      </div>

      <div class="input-group">
        <label for="email">Adresse e-mail</label>
        <input type="email" id="email" name="email" required>
      </div>

      <div class="input-group">
        <label for="objet">Objet</label>
        <input type="text" id="objet" name="objet" required>
      </div>

      <div class="input-group">
        <label for="message">Message</label>
        <textarea id="message" name="message" rows="5" required></textarea>
      </div>
      <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($csrf_token) ?>">
      <button type="submit" class="btn-contact">Envoyer</button>
    </form>

    <div class="contact-info">
      <p><i class="fas fa-envelope"></i> Email : contact@lunaperla.com</p>
      <p><i class="fas fa-phone"></i> Téléphone : +33 1 23 45 67 89</p>
      <p><i class="fas fa-map-marker-alt"></i> Adresse : 123 Rue des Bijoux, Paris, France</p>
    </div>
  </div>
</main>