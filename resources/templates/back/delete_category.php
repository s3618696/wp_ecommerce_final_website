<!--  RMIT University
Khuc Thi Xuan Quyen - s3618696
The host link for this website is kxquyen.epizy.com/public 
-->

<?php require_once("../../resources/config.php");
if(isset($_GET['delete_category_id'])) {
$query = query("DELETE FROM categories WHERE cat_id = " . escape_string($_GET['delete_category_id']) . " ");
confirm($query);
set_message("Category Deleted");
redirect("./index.php?categories");
} else {

redirect("./index.php?categories");

}

 ?>