<?php

if(!defined(INDEX_CHECK_LBARMAN) || INDEX_CHECK_LBARMAN != "TRUE")
	die("Hack attempt. Infos logged");
	
define('DB_NAME', 'prifi_tasks'); 
define('DB_USER', 'prifi_tasks');
define('DB_PASSWORD', 'nice_try');
define('DB_HOST', 'localhost');

define("TEXTAREA_PAGE_COLS", 65);
define("TEXTAREA_PAGE_ROWS", 20);
?>
