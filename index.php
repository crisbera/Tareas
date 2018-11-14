<?php

// / Linux
// \ Windows
define("DS", DIRECTORY_SEPARATOR);
define("ROOT", realpath(dirname(__FILE__)).DS);
define("APP_PATH", ROOT."application".DS);

//echo APP_PATH;

require_once(APP_PATH."Config.php");
require_once(APP_PATH."Request.php");
require_once(APP_PATH."Bootstrap.php");
require_once(APP_PATH."Controller.php");
require_once(APP_PATH."Model.php");
require_once(APP_PATH."View.php");
require_once(APP_PATH."Database.php");
require_once(ROOT."libs".DS."FlashMessages.php");

//echo "<pre>";
//print_r(get_required_files());
if (!session_id()) @session_start();

try {
	Bootstrap::run(new Request);
} catch (Exception $e) {
	echo $e->getMessage();
}