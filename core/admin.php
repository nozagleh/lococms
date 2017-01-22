<?php
  session_start();
  require("head.php");
  require("admin-navbar.php");
  if (!isset($_SESSION["user"])) {
    header("location:../login.php");
  }
?>
<!DOCTYPE html>
  <?php getHead(ADMIN_THEME_STYLE_URL, THEME_NAME); ?>
  <body>
    <?php getAdminNav(); ?>
  </body>
</html>
