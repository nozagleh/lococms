<?php
session_start();
require('../query.php');
require("admin-navbar.php");
require("head.php");
getHead(ADMIN_THEME_STYLE_URL, THEME_NAME);
getAdminNav();
if(isset($_SESSION["user"])):
 ?>
 <div class="wrapper">
   <div class="site-list">
     <table>
       <?php
       $sites = Loco_Query::getAllPages();?>
       <tr>
         <th>Site</th>
         <th>Description</th>
         <th>Created</th>
         <th>Start Page</th>
         <th>Visible</th>
       </tr>
        <?php foreach ($sites as $key => $value) {?>
          <tr id="site-<?php echo($value["id"]) ?>" class="sites">
            <td class="site-name"><a href="editor.php?page=<?php echo($value["id"]) ?>"><?php echo($value["pagename"]) ?></a></td>
            <td class="site-desc"><?php echo($value["pagedesc"]) ?></td>
            <td class="site-date"><?php echo($value["creation-date"]) ?></td>
            <td class="site-start"><span class="<?php echo($value['is-start'] == 1 ? 'is-start' : 'not-start') ?>"></span></td>
            <td class="site-status"><span class="<?php echo($value["is-deprecated"] == 1 ? 'is-deprecated' : 'is-active') ?>"></span></td>
          </tr>

        <?php }
      endif;
        ?>
     </ul>
   </div>
 </div>
