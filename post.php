<?php


class Loco_Post {

	function __construct(){

	}

	function getPosts($pageid) {
		$pdo = new PDO('mysql:host=localhost;dbname=loco-db','root','');
		
		try{
			$query = $pdo->prepare("SELECT * FROM `loco-post` WHERE `fk_page` = :pageid");
			$query->bindParam(":pageid", $pageid);
			$query->execute();

			$results = $query->fetchAll();
			foreach ($results as $key => $value) {
				echo($value["data"]);
			}
		}catch(PDOException $e) {
			echo($e->getMessage());
		}

	}
}



?>