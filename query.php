<?php

  class Query {

    function __construct() {


    }

    function verifyLogin($username, $password) {
      try {
        $pdo = new PDO("mysql:dbname=loco-db;host=localhost",'root','');
        $query = $pdo->prepare("SELECT * FROM `loco-users` WHERE `username` LIKE :user AND `passwd` LIKE :pass;");
        $query->bindParam(':user', $username);
        $query->bindParam(':pass', $password);

        $query->execute();
        $results = $query->fetchAll();

        if (!empty($results)) {
          return true;
        }
      } catch (PDOException $e) {
        return $e->getMessage();
      }
      return false;
    }

  }

?>
