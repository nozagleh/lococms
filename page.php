<?php
require('post.php');

class Loco_Page {



	function getPage($pageid) {
		$posts = Loco_Post::getPosts($pageid);
		return $posts;
	}


}




?>