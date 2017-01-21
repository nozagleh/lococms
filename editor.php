<?php
  session_start();
  require('query.php');
  require('core/admin-navbar.php');

  if (!isset($_SESSION["user"]))
    header("location:login.php");

  //create edit post
  if (isset($_GET["post"])) {
    # code...
  }
  getAdminNav();
  //checks of an element has been specified and display the editor menu for it
  if (isset($_GET["element"])) {
    $element = Loco_Query::getCertainElement($_GET["element"]);?>
    <form action="" method="POST">
    <textarea name="meta-data"><?php echo($element[0]["data"]);?></textarea>
    </form>
    <?php
  }
 ?>
