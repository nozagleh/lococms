<?php
  class Loco_Query {

    //empty constructor
    function __construct() {

    }

    /*
    *Function for verifying users
    *@return bool true/false
    */
    function verifyLogin($username, $password) {
      try {
        //initiate a new connection
        $pdo = new PDO("mysql:dbname=loco-db;host=localhost",'root','');

        //prepare the query to check user data, bind parameters
        $query = $pdo->prepare("SELECT `passwd` FROM `loco-users` WHERE `username` LIKE :user LIMIT 1;");
        $query->bindParam(':user', $username);

        //execute the query and fetch the results
        $query->execute();
        $results = $query->fetch(PDO::FETCH_OBJ);

        //if results are not empty, compare with user provided information
        if (!empty($results)) {
          //if username and password match, then return true
          if (($password == $results->passwd)) {
            return true;
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
  		$pdo = new PDO("mysql:dbname=loco-db;host=localhost",'root','');

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

  			$results = $query->fetch(PDO::FETCH_OBJ);

        if(!empty($results))
          return $results;

  		}catch(PDOException $e) {
  			return($e->getMessage());
  		}
      return 0;
    }

    function getAllPages() {
      $pdo = new PDO('mysql:host=localhost;dbname=loco-db','root','');

      try {
        $query = $pdo->prepare("SELECT * FROM `loco-page`;");
        $query->execute();

        $results = $query->fetchAll();

        return $results;
      } catch (PDOException $e) {
        return($e->getMessage());
      }


    }

  }

?>
