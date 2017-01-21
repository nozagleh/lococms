<?php
	session_start();
	require("page.php");

	require("header.php");

	if (isset($_GET["post"])) {
		Loco_Page::getPage($_GET["post"]);
	}

	require("footer.php");

?>