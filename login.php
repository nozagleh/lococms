<?php
  session_start();
  require('query.php');

  if (isset($_SESSION["user"]))
    header('location:core/admin.php');

  if (isset($_POST["username"]))
    checkLogin($_POST["username"], $_POST["password"]);

  function checkLogin($user, $pass){
    $is_valid = Loco_Query::verifyLogin($user,$pass);

    if ($is_valid) {
      $_SESSION["user"] = $user;
      header('location:core/admin.php');
    }
  }

  ?>
  <!DOCTYPE html>
    <head>
      <link rel="stylesheet" type="text/css" href="core/styles/loco-base.css">
    </head>
    <body>
      <div class="wrapper">
        <div class="loginform">
          <form action="" method="POST" id="form">
            <label>Username:</label><input type="text" name="username" /><br/>
            <label>Password:</label><input type="password" name="password" /><br />
          </form>
          <button type="submit" form="form" value="Submit">Login</button>
          <a href="index.php">Go back to site</a>
        </div>
      </div>
    </body>
  </html>
