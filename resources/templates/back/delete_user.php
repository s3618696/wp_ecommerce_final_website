<!--  RMIT University
Khuc Thi Xuan Quyen - s3618696
The host link for this website is kxquyen.epizy.com/public 
-->

<?php require_once("../../resources/config.php");

if(isset($_GET['delete_user_id'])) {
$query = query("DELETE FROM users WHERE user_id = " . escape_string($_GET['delete_user_id']) . " ");
confirm($query);
set_message("Sser Deleted");
redirect("./index.php?users");

} else {
redirect("./index.php?users");
}

 ?>