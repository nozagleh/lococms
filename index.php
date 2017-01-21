<?php
	session_start();
	require("page.php");
	require("core/head.php");

	require("header.php");

	if (isset($_GET["page"])) {
		Loco_Page::getPage($_GET["page"]);
	}

	require("footer.php");

?>
