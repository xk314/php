<?php
// define("PLAT", "Home");
// $c = isset($_GET['c']) ? $_GET['C'] : "Index";
// $a = isset($_GET['a']) ? $_GET['a'] : "index";
// define("Controller", $c);
// define("Action", $a);

define("DS", DIRECTORY_SEPARATOR);
define("ROOT_PATH", getcwd().DS);
define("APP_PATH", ROOT_PATH."Admin".DS);
require_once ROOT_PATH."Frame".DS."Frame.class.php";
\Frame\Frame::run();
?>