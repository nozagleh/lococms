<?php
require('post.php');

class Loco_Page {

	function __construct(){}

	function getPage($pageid) {
		$posts = Loco_Post::printPosts($pageid);
		return $posts;
	}

	function getFrontPage() {
		//set id to 0 and call on frontpage with bool is_front
		return Loco_Post::printPosts(0,1);
	}


}




?>
