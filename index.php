<?php
session_start();

$titre = 'Accueil';
$racine_path = './';

$base_url = "/~uapv2500231/Luna_Perla";

include($racine_path . 'templates/front/header.php'); 

include($racine_path . 'templates/front/main.php'); 

include($racine_path . 'templates/front/footer.php'); ?>

<?php if (!isset($_COOKIE['accept_cookie'])): ?>
<!-- Cookie banner -->
<div id="cookie-banner" style="position:fixed; bottom:0; width:100%; background:#f7b6c1; color:white; padding:15px; text-align:center; z-index:1000;">
  Ce site utilise des cookies pour améliorer votre expérience.
  <button onclick="acceptCookies()" style="margin-left:15px; padding:8px 12px; background-color:#fff; color:#d75c7b; border:none; border-radius:5px; cursor:pointer;">
    Accepter les cookies
  </button>
</div>

<script>
function acceptCookies() {
  document.cookie = "accept_cookie=true; path=/; max-age=" + (60*60*24*365);
  document.getElementById("cookie-banner").style.display = "none";
}
</script>
<?php endif; ?>