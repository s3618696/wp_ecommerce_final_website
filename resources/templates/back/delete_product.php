<!--  RMIT University
Khuc Thi Xuan Quyen - s3618696
The host link for this website is kxquyen.epizy.com/public 
-->

<?php require_once("../../resources/config.php");

if(isset($_GET['delete_product_id'])) {
$query = query("DELETE FROM products WHERE product_id = " . escape_string($_GET['delete_product_id']) . " ");
confirm($query);
set_message("Product Deleted");
redirect("./index.php?products");
} else {
redirect("./index.php?products");
}
 ?>