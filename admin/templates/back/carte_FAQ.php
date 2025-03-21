<!-- Conteneur principal de la page FAQ -->
<div class="fag_style">
  
  <!-- Affichage du titre de la page FAQ -->
  <h1><?php echo $titre; ?></h1>
  
  <!-- Section FAQ contenant le tableau des questions et réponses -->
  <section class="faq">
    <table class="faq-table">
      <thead>
          <!-- En-tête du tableau pour la FAQ -->
          <p class="faq-question">Question</p>
      </thead>
        <?php foreach ($faq_items as $item): ?>
            <!-- Affichage de la question -->
            <p><?php echo $item['question']; ?></p>
            <!-- Affichage de la réponse correspondante -->
            <p><?php echo $item['answer']; ?></p>
        <?php endforeach; ?>
    </table>
  </section>
</div>
