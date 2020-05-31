<!--  RMIT University
Khuc Thi Xuan Quyen - s3618696
The host link for this website is kxquyen.epizy.com/public 
-->

<?php require_once("config.php"); ?>
<?php 
  if(isset($_GET['add'])) {
    $query = query("SELECT * FROM products WHERE product_id=" . escape_string($_GET['add']). " ");
    confirm($query);
    while($row = fetch_array($query)) {
      if($row['product_quantity'] != $_SESSION['product_' . $_GET['add']]) {
        $_SESSION['product_' . $_GET['add']]+=1;
        redirect("../public/shopping-cart.php");
      } else {
        set_message("We only have " . $row['product_quantity'] . " " . "{$row['product_title']}" . " available");
        redirect("../public/shopping-cart.php");
      }
    }
  }


  if(isset($_GET['remove'])) {
    $_SESSION['product_' . $_GET['remove']]--;
    if($_SESSION['product_' . $_GET['remove']] < 1) {
      unset($_SESSION['item_total']);
      unset($_SESSION['item_quantity']);
      redirect("../public/shopping-cart.php");
    } else {
      redirect("../public/shopping-cart.php");
     }
  }


 if(isset($_GET['delete'])) { 
  $_SESSION['product_' . $_GET['delete']] = '0';
  unset($_SESSION['item_total']);
  unset($_SESSION['item_quantity']);
  redirect("../public/shopping-cart.php");
 }

function cart() {
$total = 0;
$item_quantity = 0;
$item_name = 1;
$item_number =1;
$amount = 1;
$quantity =1;
foreach ($_SESSION as $name => $value) {
if($value > 0 ) {
if(substr($name, 0, 8 ) == "product_") {
$length = strlen($name);
$id = substr($name, 8 , $length);
$query = query("SELECT * FROM products WHERE product_id = " . escape_string($id). " ");
confirm($query);
while($row = fetch_array($query)) {
$sub = $row['product_price']*$value;
$item_quantity +=$value;
$product_image = display_image($row['product_image']);
$product = <<<DELIMETER

<tr>
  <td><img src="../resources/{$product_image}" alt=""></td>
  <td><h6>{$row['product_title']}</h6>
  <td>$ {$row['product_price']}</td>
  <td>{$value}</td>
  <td>$ {$sub}</td>
  <td>
    <ul>
    <li style="margin-bottom: 10px;"><a class='btn btn-default' href="../resources/cart.php?add={$row['product_id']}"><span class='glyphicon glyphicon-plus'></span></a></li>  
    <li style="margin-bottom: 10px;"><a class='btn btn-default' href="../resources/cart.php?remove={$row['product_id']}"><span class='glyphicon glyphicon-minus'></span></a></li>
      <li style="margin-bottom: 10px;"><a class='btn btn-default' href="../resources/cart.php?delete={$row['product_id']}"><span class=''>x</span></a></li>
    </ul>
  </td>
</tr>


DELIMETER;

echo $product;

$item_name++;
$item_number++;
$amount++;
$quantity++;

}

$_SESSION['item_total'] = $total += $sub;
$_SESSION['item_quantity'] = $item_quantity;
           }

      }
 
    }
}

function checkout_cart() {
  $total = 0;
  $item_quantity = 0;
  $item_name = 1;
  $item_number =1;
  $amount = 1;
  $quantity =1;
  foreach ($_SESSION as $name => $value) {
  if($value > 0 ) {
  if(substr($name, 0, 8 ) == "product_") {
  $length = strlen($name);
  $id = substr($name, 8 , $length);
  $query = query("SELECT * FROM products WHERE product_id = " . escape_string($id). " ");
  confirm($query);
  while($row = fetch_array($query)) {
  $sub = $row['product_price']*$value;
  $item_quantity +=$value;
  $product_image = display_image($row['product_image']);
  $product = <<<DELIMETER
  
  <div class="order-box">
    <p>{$row['product_title']}<span>$ {$row['product_price']}</span></p>
    <div class="quantity">{$value}</div>
  </div>
  
  DELIMETER;
  
  echo $product;
  
  $item_name++;
  $item_number++;
  $amount++;
  $quantity++;
  
  }
  
  $_SESSION['item_total'] = $total += $sub;
  $_SESSION['item_quantity'] = $item_quantity;
             }
  
        }
   
      }
  }

function place_order() {
  if(isset($_POST['place_order'])) {
    $firstname = escape_string($_POST['firstname']);
    $lastname = escape_string($_POST['lastname']);
    $company = escape_string($_POST['company']);
    $shipping_address = escape_string($_POST['shipping_address']);
    $country = escape_string($_POST['country']);
    $postcode = escape_string($_POST['postcode']);
    $email = escape_string($_POST['email']);
    $phone = escape_string($_POST['phone']);

    $query = query("INSERT INTO billing(first_name, last_name, company_name, shipping_address, country_state, postcode, email_address, phone) VALUES ('{$firstname}', '{$lastname}', '{$company}', '{$shipping_address}', '{$country}','{$postcode}', '{$email}', '{$phone}')");
    confirm($query);
    session_destroy();
    redirect('index.php');
  } 
    
}



 ?>