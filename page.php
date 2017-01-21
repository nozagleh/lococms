<?php
require('post.php');

class Loco_Page {

	function __construct(){}

	function getPage($pageid) {
		$posts = Loco_Post::printPosts($pageid);
		return $posts;
	}


}




?>
