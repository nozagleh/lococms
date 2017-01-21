<?php
  session_start();
  if (!isset($_SESSION["user"])) {
    header("location:login.php");
  }
?>
<!DOCTYPE html>
  <head>

  </head>
  <body>
    <a href="logout.php">Logout</a>
  </body>
</html>
