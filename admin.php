<?php
  session_start();
  require("core/admin-navbar.php");
  if (!isset($_SESSION["user"])) {
    header("location:login.php");
  }
?>
<!DOCTYPE html>
  <head>

  </head>
  <body>
    <?php getAdminNav(); ?>
  </body>
</html>
