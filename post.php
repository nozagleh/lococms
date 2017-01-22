<?php
require('query.php');

class Loco_Post {

	function __construct(){

	}

	function getPosts($pageId) {
		return Loco_Query::getPostsContent($pageId);
	}

	function getFrontPosts() {
		return Loco_Query::getFrontPosts();
	}

	function printPosts($posts, $is_front=0) {

		$all_posts = ($is_front != 0 ? self::getFrontPosts() : self::getPosts($posts));

		if (!empty($all_posts)) {
			foreach ($all_posts as $key => $value) {
				echo $value["data"];

				if (isset($_SESSION["user"])) {
					?>
					<a href="core/editor.php?page=<?php echo($value['fk_page']) ?>">[Edit]</a>
				<?php }
			}
		}
	}

	function getElementByName($element,$field=0) {
		if(!empty($element))
			return(Loco_Query::getCertainElement($element,$field));
	}

}



?>
