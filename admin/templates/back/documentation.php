<main class="padding_dashboard">
  <h2>Documentation Client</h2>
  <p>Bienvenue dans la documentation du projet <strong>Luna Perla</strong>.</p>

  <section>
    <h3>1. Connexion / Inscription</h3>
    <ul>
      <li>Le client peut créer un compte via le formulaire d'inscription (à l'adresse <code>/register</code>).</li>
      <li>Connexion via le formulaire de login (à l'adresse <code>/login</code>).</li>
      <li>Un mot de passe sécurisé est requis (8 caractères minimum, majuscule, chiffre).</li>
      <li>Vérification CSRF présente dans tous les formulaires sensibles.</li>
    </ul>
  </section>

  <section>
    <h3>2. Navigation</h3>
    <ul>
      <li>Le menu de navigation est adapté selon le rôle (utilisateur ou admin).</li>
      <li>L'utilisateur peut accéder aux produits, à son compte, au panier, et au formulaire de contact.</li>
    </ul>
  </section>

  <section>
    <h3>3. Gestion du Panier</h3>
    <ul>
      <li>Panier disponible pour les utilisateurs connectés et non connectés (via cookie).</li>
      <li>Ajout, suppression, vidage, validation du panier gérés via des fichiers dans <code>control/</code>.</li>
      <li>Les utilisateurs connectés ont leur panier stocké en base.</li>
    </ul>
  </section>

  <section>
    <h3>4. Administration</h3>
    <ul>
      <li>Accès via <code>/admin/login</code></li>
      <li>Le dashboard permet d'ajouter, modifier et supprimer des produits et utilisateurs.</li>
      <li>Les routes sont réécrites proprement avec <code>.htaccess</code>.</li>
    </ul>
  </section>

  <section>
    <h3>5. Sécurité</h3>
    <ul>
      <li>Toutes les opérations sensibles utilisent un token CSRF.</li>
      <li>Les mots de passe sont hashés avec <code>password_hash</code>.</li>
      <li>Des contrôles sont effectués sur les champs pour éviter les injections SQL / XSS.</li>
    </ul>
  </section>

  <section>
    <h3>6. Contact</h3>
    <ul>
      <li>Le formulaire de contact est accessible via <code>/contact</code>.</li>
      <li>Les messages sont stockés dans la table <code>contact_lp</code>.</li>
    </ul>
  </section>

  <section>
    <h3>7. Structure du projet</h3>
    <ul>
      <li><code>control/</code> : logique des pages PHP.</li>
      <li><code>templates/front/</code> : affichage utilisateur.</li>
      <li><code>templates/back/</code> : affichage admin.</li>
      <li><code>model/</code> : accès à la base de données.</li>
      <li><code>class/</code> : définition des objets métiers.</li>
    </ul>
  </section>

  <p>Pour toute question ou assistance, veuillez contacter l'équipe de développement.</p>
</main>
