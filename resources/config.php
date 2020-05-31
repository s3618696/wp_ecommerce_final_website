<!--  RMIT University
Khuc Thi Xuan Quyen - s3618696
The host link for this website is kxquyen.epizy.com/public 
-->

<?php 

// ob_start();

session_start();
// session_destroy();
// separator folder: /:mac  \: win >>> auto hieu
defined("DS") ? null : define("DS", DIRECTORY_SEPARATOR); 

defined("TEMPLATE_BACK") ? null : define("TEMPLATE_BACK", __DIR__ . DS . "templates/back");


defined("UPLOAD_DIRECTORY") ? null : define("UPLOAD_DIRECTORY", __DIR__ . DS . "uploads");


//database
defined("DB_HOST") ? null : define("DB_HOST", "sql303.epizy.com");

defined("DB_USER") ? null : define("DB_USER","epiz_25905948");


defined("DB_PASS") ? null : define("DB_PASS", "x9VSwQq0Jyg");

defined("DB_NAME") ? null : define("DB_NAME",  "epiz_25905948_kxquyen");



$connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);

require_once("functions.php");
require_once("cart.php");


 ?>