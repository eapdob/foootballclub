<?php

ob_start();

ini_set('session.gc_maxlifetime', 120960);
ini_set('session.cookie_lifetime', 120960);

session_start();
//session_destroy();

// directory constants
defined("DS") ? null : define("DS", DIRECTORY_SEPARATOR);
defined("TEMPLATE_FRONT") ? null : define("TEMPLATE_FRONT", __DIR__ . DS . "templates/front");
defined("TEMPLATE_BACK") ? null : define("TEMPLATE_BACK", __DIR__ . DS . "templates/back");
// db constants
defined("DB_HOST") ? null : define("DB_HOST", "mysql.zzz.com.ua");
defined("DB_USER") ? null : define("DB_USER", "dobj11");
defined("DB_PASS") ? null : define("DB_PASS", "Jeka89d");
defined("DB_NAME") ? null : define("DB_NAME", "dobj11");
// db connection
$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
// game constants
$qtyPlayers = 15;

require_once("functions.php");