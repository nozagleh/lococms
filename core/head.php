<?php require("constants.php");

function getHead($url,$base='') {?>
<!DOCTYPE html>
  <head>
      <link rel="stylesheet" type="text/css" href="<?php echo($url . $base . '-base.css') ?>">
      <link href="https://fonts.googleapis.com/css?family=Titillium+Web" rel="stylesheet">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
      <script type="text/javascript" src="scripts/loco-base.js"></script>
  </head>
<?php } ?>
