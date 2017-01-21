<?php

if (isset($_POST["username"])) {
  checkLogin();
}

function checkLogin(){
  header('location:index.php');
}

 ?>
