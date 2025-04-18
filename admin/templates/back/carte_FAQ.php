<div class="fag_style">
  <h1><?= htmlspecialchars($titre) ?></h1>

  <section class="faq">
    <table class="faq-table">
      <thead>
        <tr>
          <th>Nom</th>
          <th>Email</th>
          <th>Objet</th>
          <th>Message</th>
          <th>Date</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($faq_items as $item): ?>
          <tr>
            <td><?= htmlspecialchars($item->nom) ?></td>
            <td><?= htmlspecialchars($item->email) ?></td>
            <td><?= htmlspecialchars($item->objet) ?></td>
            <td><?= nl2br(htmlspecialchars($item->message)) ?></td>
            <td><?= htmlspecialchars($item->date_envoi) ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </section>
</div>