<?php
	session_start();
	require("page.php");
	require("core/head.php");

	getHead(THEME_STYLES_URL);

	//call header
	require("header.php");

	//check if any specific page is requested
	if (isset($_GET["page"])) {
		Loco_Page::getPage($_GET["page"]);
	}else{
		Loco_Page::getFrontPage();
	}

	//call footer
	require("footer.php");

?>
