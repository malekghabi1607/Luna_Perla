<footer>
    <div class="footer-container">
        <div class="footer-section">
            <h3>Catalogue</h3>
            <ul>
                <li><a href="<?= $base_url ?>/collection">Collection</a></li>
            </ul>
        </div>

        <div class="footer-section">
            <h3>La Marque</h3>
            <ul>
                <li><a href="<?= $base_url ?>/notre-histoire">Notre Histoire</a></li>
            </ul>
        </div>

        <div class="footer-section">
            <h3>Services Client</h3>
            <ul>
                <li><a href="<?= $base_url ?>/contact">Contact</a></li>
                <li><a href="<?= $base_url ?>/obligations">Les Obligations Légales</a></li>

            </ul>
        </div>

        <div class="footer-section">
            <h3>Informations</h3>
            <ul>
                <li><a href="<?= $base_url ?>/compte">Compte</a></li>
            </ul>
        </div>
    </div>

    <div class="footer-bottom">
        <p>&copy; 2025 Luna Perla - Tous droits réservés</p>
        <div class="social-icons">
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-pinterest"></i></a>
        </div>
    </div>

    <!-- 📩 Bouton de contact flottant -->
    <div class="contact-float">
        <a href="<?= $base_url ?>/contact">
            <i class="fas fa-envelope"></i>
        </a>
    </div>
</footer>


<?php if (!isset($_COOKIE['accept_cookie'])): ?>
<div id="cookie-banner" style="position:fixed; bottom:0; width:100%; background:#e91e63; color:white; padding:15px; text-align:center; z-index:9999;">
  Ce site utilise des cookies pour améliorer votre expérience.
  <button onclick="acceptCookies()" style="margin-left:15px; padding:8px 12px; background-color:#fff; color:#e91e63; border:none; border-radius:5px; cursor:pointer;">
    Accepter les cookies
  </button>
</div>
<script>
function acceptCookies() {
  document.cookie = "accept_cookie=true; path=/; max-age=" + (60 * 60 * 24 * 365);
  document.getElementById("cookie-banner").style.display = "none";
}
</script>
<?php endif; ?>