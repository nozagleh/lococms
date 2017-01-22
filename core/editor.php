<?php
  session_start();
  require('../query.php');
  require('admin-navbar.php');
  require("head.php");
  getHead(ADMIN_THEME_STYLE_URL, THEME_NAME);
  getAdminNav();
  if (!isset($_SESSION["user"]))
    header("location:../login.php");
    ?>
    <div class="wrapper"><?php

  //create edit post
  if (isset($_GET["page"])) {
    $post_data = Loco_Query::getPostsContent($_GET["page"]);

    foreach ($post_data as $key => $value) {
      if ($value["type"] == "blog") {?>
        <div class="editarea">
          <div class="edit-bar"><div class="edit-bar-left"></div><div class="edit-bar-right"><span class="edit-live-view">Live</span><span class="edit-text-view">Text</span></div></div>
          <div id="blog-data-<?php echo($value["id"]); ?>" class="edit-blog-data" contenteditable><?php echo($value["data"]); ?></div>
          <textarea class="edit-blog-data-input" name="blog-data"><?php echo($value["data"]);?></textarea>
        </div>
      <?php }
    }
  }
  //checks of an element has been specified and display the editor menu for it
  if (isset($_GET["element"])) {
    $element = Loco_Query::getCertainElement($_GET["element"]);
    if(!empty($element)):?>
      <div class="editarea">
        <div class="edit-bar"><div class="edit-bar-left"></div><div class="edit-bar-right"><span class="edit-live-view">Live</span><span class="edit-text-view">Text</span></div></div>
        <div id="blog-data-<?php echo($element->id); ?>" class="edit-blog-data" contenteditable><?php echo($element->data); ?></div>
        <textarea class="edit-blog-data-input" name="blog-data"><?php echo($element->data);?></textarea>
      </div>
  <?php endif;
  }
 ?>
 </div>
