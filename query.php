<?php

  class Loco_Query {

    //empty constructor
    function __construct() {}

    /*
    *Function for verifying users
    *@return bool true/false
    */
    function verifyLogin($username, $password) {
      try {
        //initiate a new connection
        $pdo = new PDO("mysql:dbname=loco-db;host=localhost",'root','');

        //prepare the query to check user data, bind parameters
        $query = $pdo->prepare("SELECT `username`,`passwd` FROM `loco-users` WHERE `username` LIKE :user AND `passwd` LIKE :pass;");
        $query->bindParam(':user', $username);
        $query->bindParam(':pass', $password);

        //execute the query and fetch the results
        $query->execute();
        $results = $query->fetchAll();

        //if results are not empty, compare with user provided information
        if (!empty($results)) {
          foreach ($results as $key => $value) {
            //if username and password match, then return true
            if (($username == $value["username"] && $password == $value["passwd"])) {
              return true;
            }
          }
        }
      } catch (PDOException $e) {
        //return error message
        return $e->getMessage();
      }
      //return false if nothing is found
      return false;
    }

    function getPostsContent($pageid) {
  		$pdo = new PDO('mysql:host=localhost;dbname=loco-db','root','');

  		try{
  			$query = $pdo->prepare("SELECT * FROM `loco-post` WHERE `fk_page` = :pageid");
  			$query->bindParam(":pageid", $pageid);
  			$query->execute();

  			$results = $query->fetchAll();

        return $results;
  		}catch(PDOException $e) {
  			return($e->getMessage());
  		}

  	}

    function getCertainElement($element) {
      $pdo = new PDO('mysql:host=localhost;dbname=loco-db','root','');

  		try{
        $query = $pdo->prepare("SELECT * FROM `loco-meta` WHERE `type` = :element");
        $query->bindParam(":element", $element);
  			$query->execute();

  			$results = $query->fetchAll();

        return $results;
  		}catch(PDOException $e) {
  			return($e->getMessage());
  		}
    }

  }

?>
