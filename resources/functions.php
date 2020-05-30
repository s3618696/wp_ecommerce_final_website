<?php 

$upload_directory = "uploads";

// helper functions

function last_id(){
        global $connection;
        return mysqli_insert_id($connection);
}


function set_message($msg){
    if(!empty($msg)) {
        $_SESSION['message'] = $msg;
        } else {
        $msg = "";
    }
}


function display_message() {
    if(isset($_SESSION['message'])) {
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }

}


function redirect($location){
    return header("Location: $location ");
}

function query($sql) {
    global $connection;
    return mysqli_query($connection, $sql);
}


function confirm($result){
    global $connection;
    if(!$result) {
        die("QUERY FAILED" . mysqli_error($connection));
    }
}


function escape_string($string){
    global $connection;
    return mysqli_real_escape_string($connection, $string);
}

function fetch_array($result){
    return mysqli_fetch_array($result);
}


/****************************FRONT END FUNCTIONS************************/


function get_products_in_cate_page() {
    $query = query(" SELECT * FROM products WHERE product_category_id = " . escape_string($_GET['id']) . " AND product_quantity >= 1");
    confirm($query);
    $rows = mysqli_num_rows($query); // Get total of mumber of rows from the database
    if(isset($_GET['page'])){ //get page from URL if its there
        $page = preg_replace('#[^0-9]#', '', $_GET['page']);//filter everything but numbers
    } else{// If the page url variable is not present force it to be number 1
        $page = 1;
    }

    $perPage = 6; // Items per page here
    $lastPage = ceil($rows / $perPage); // Get the value of the last page
// Be sure URL variable $page(page number) is no lower than page 1 and no higher than $lastpage
    if($page < 1){ // If it is less than 1
        $page = 1; // force if to be 1
    }elseif($page > $lastPage){ // if it is greater than $lastpage
        $page = $lastPage; // force it to be $lastpage's value
    }
    $middleNumbers = ''; // Initialize this variable
// This creates the numbers to click in between the next and back buttons
    $sub1 = $page - 1;
    $sub2 = $page - 2;
    $add1 = $page + 1;
    $add2 = $page + 2;
    if($page == 1){
        $middleNumbers .= '<li class="page-item active"><a>' .$page. '</a></li>';
        $middleNumbers .= '<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?page='.$add1.'">' .$add1. '</a></li>';
    } elseif ($page == $lastPage) {
        $middleNumbers .= '<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?page='.$sub1.'">' .$sub1. '</a></li>';
        $middleNumbers .= '<li class="page-item active"><a>' .$page. '</a></li>';
    }elseif ($page > 2 && $page < ($lastPage -1)) {
        $middleNumbers .= '<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?page='.$sub2.'">' .$sub2. '</a></li>';
        $middleNumbers .= '<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?page='.$sub1.'">' .$sub1. '</a></li>';
        $middleNumbers .= '<li class="page-item active"><a>' .$page. '</a></li>';
        $middleNumbers .= '<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?page='.$add1.'">' .$add1. '</a></li>';
        $middleNumbers .= '<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?page='.$add2.'">' .$add2. '</a></li>';
    } elseif($page > 1 && $page < $lastPage){
        $middleNumbers .= '<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?page= '.$sub1.'">' .$sub1. '</a></li>';
        $middleNumbers .= '<li class="page-item active"><a>' .$page. '</a></li>';
        $middleNumbers .= '<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?page='.$add1.'">' .$add1. '</a></li>';
    }
// This line sets the "LIMIT" range... the 2 values we place to choose a range of rows from database in our query
    $limit = 'LIMIT ' . ($page-1) * $perPage . ',' . $perPage;
// $query2 is what we will use to to display products with out $limit variable
    $query2 = query(" SELECT * FROM products WHERE product_category_id = " . escape_string($_GET['id']) . " AND product_quantity >= 1 ");
    confirm($query2);
    $outputPagination = ""; // Initialize the pagination output variable
    // If we are not on page one we place the back link
    if($page != 1){
        $prev  = $page - 1;
        $outputPagination .='<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?page='.$prev.'">Back</a></li>';
    }
    // Lets append all our links to this variable that we can use this output pagination
    $outputPagination .= $middleNumbers;
// If we are not on the very last page we the place the next link
    if($page != $lastPage){
        $next = $page + 1;
        $outputPagination .='<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?page='.$next.'">Next</a></li>';
    }
// Doen with pagination

    while($row = fetch_array($query2)) {
        $product_image = $row['product_image'];
        $product = <<<DELIMETER
        <div class="grid-item2 mb30">
            <div class="row">
                <div class="arrival-overlay col-md-4">
                    <img src="../resources/uploads/{$product_image}" alt="">
                </div>
                <div class="col-md-8">
                    <div class="list-content">
                        <h1><a style="color: black;" href="shop-single.php?id={$row['product_id']}">{$row['product_title']}</a></h1>
                        <div class="list-midrow">
                            <ul>
                                <li><span class="low-price">$ {$row['product_price']}</span></li>
                            </ul>
                            <div class="clear"></div>
                        </div>
                        <p class="list-desc">{$row['short_desc']}</p>
                        <div class="list-downrow">
                            <a href="#" class="medium-button button-red add-cart">Add to Cart</a>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
DELIMETER;
        echo $product;
    }
    echo "<div class='shop-pag'>
                <div class='right-pag'>
                    <div class='pagenation clearfix'>
                        <ul>
                        {$outputPagination}
                        </ul>
                    </div>
                    <div class='clear'></div>
                </div>
                <div class='clear'></div>
            </div>";
}

function get_products() {
    $query = query(" SELECT * FROM products");
    confirm($query);
    $rows = mysqli_num_rows($query); // Get total of mumber of rows from the database
    if(isset($_GET['page'])){ //get page from URL if its there
        $page = preg_replace('#[^0-9]#', '', $_GET['page']);//filter everything but numbers
    } else{// If the page url variable is not present force it to be number 1
        $page = 1;
    }

    $perPage = 6; // Items per page here
    $lastPage = ceil($rows / $perPage); // Get the value of the last page
// Be sure URL variable $page(page number) is no lower than page 1 and no higher than $lastpage
    if($page < 1){ // If it is less than 1
        $page = 1; // force if to be 1
    }elseif($page > $lastPage){ // if it is greater than $lastpage
        $page = $lastPage; // force it to be $lastpage's value
    }
    $middleNumbers = ''; // Initialize this variable
// This creates the numbers to click in between the next and back buttons
    $sub1 = $page - 1;
    $sub2 = $page - 2;
    $add1 = $page + 1;
    $add2 = $page + 2;
    if($page == 1){
        $middleNumbers .= '<li class="page-item active"><a>' .$page. '</a></li>';
        $middleNumbers .= '<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?page='.$add1.'">' .$add1. '</a></li>';
    } elseif ($page == $lastPage) {
        $middleNumbers .= '<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?page='.$sub1.'">' .$sub1. '</a></li>';
        $middleNumbers .= '<li class="page-item active"><a>' .$page. '</a></li>';
    }elseif ($page > 2 && $page < ($lastPage -1)) {
        $middleNumbers .= '<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?page='.$sub2.'">' .$sub2. '</a></li>';
        $middleNumbers .= '<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?page='.$sub1.'">' .$sub1. '</a></li>';
        $middleNumbers .= '<li class="page-item active"><a>' .$page. '</a></li>';
        $middleNumbers .= '<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?page='.$add1.'">' .$add1. '</a></li>';
        $middleNumbers .= '<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?page='.$add2.'">' .$add2. '</a></li>';
    } elseif($page > 1 && $page < $lastPage){
        $middleNumbers .= '<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?page= '.$sub1.'">' .$sub1. '</a></li>';
        $middleNumbers .= '<li class="page-item active"><a>' .$page. '</a></li>';
        $middleNumbers .= '<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?page='.$add1.'">' .$add1. '</a></li>';
    }
// This line sets the "LIMIT" range... the 2 values we place to choose a range of rows from database in our query
    $limit = 'LIMIT ' . ($page-1) * $perPage . ',' . $perPage;
// $query2 is what we will use to to display products with out $limit variable
    $query2 = query(" SELECT * FROM products $limit");
    confirm($query2);
    $outputPagination = ""; // Initialize the pagination output variable
    // If we are not on page one we place the back link
    if($page != 1){
        $prev  = $page - 1;
        $outputPagination .='<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?page='.$prev.'">Back</a></li>';
    }
    // Lets append all our links to this variable that we can use this output pagination
    $outputPagination .= $middleNumbers;
// If we are not on the very last page we the place the next link
    if($page != $lastPage){
        $next = $page + 1;
        $outputPagination .='<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?page='.$next.'">Next</a></li>';
    }
// Doen with pagination

    while($row = fetch_array($query2)) {
        $product_image = $row['product_image'];
        $product = <<<DELIMETER
        <div class="grid-item2 mb30">
            <div class="row">
                <div class="arrival-overlay col-md-4">
                    <img src="../resources/uploads/{$product_image}" alt="">
                </div>
                <div class="col-md-8">
                    <div class="list-content">
                        <h1><a style="color: black;" href="shop-single.php?id={$row['product_id']}">{$row['product_title']}</a></h1>
                        <div class="list-midrow">
                            <ul>
                                <li><span class="low-price">$ {$row['product_price']}</span></li>
                            </ul>
                            <div class="clear"></div>
                        </div>
                        <p class="list-desc">{$row['short_desc']}</p>
                        <div class="list-downrow">
                            <a href="../public/shopping-cart.php?add={$row['product_id']}" class="medium-button button-red add-cart" target="_blank">Add to Cart</a>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
DELIMETER;
        echo $product;
    }
    echo "<div class='shop-pag'>
                <div class='right-pag'>
                    <div class='pagenation clearfix'>
                        <ul>
                        {$outputPagination}
                        </ul>
                    </div>
                    <div class='clear'></div>
                </div>
                <div class='clear'></div>
            </div>";
}

function get_products_in_home() {
    $query = query(" SELECT * FROM products ORDER BY product_id LIMIT 8");
    confirm($query);
    
    while($row = fetch_array($query)) {
        $product_image = $row['product_image'];
        $product = <<<DELIMETER
        <li class="class1">
            <div class="arrival-overlay">
                <img src="../resources/uploads/{$product_image}" alt="" />
                <div class="arrival-mask">
                <a href="../public/shopping-cart.php?add={$row['product_id']}" class="medium-button button-red add-cart" target="_blank">Add to Cart</a>
                </div>
            </div>
            <div class="arr-content">
                <p style="text-overflow: ellipsis; white-space: nowrap; overflow: hidden; padding: 1em;"><a style="color: black;" href="shop-single.php?id={$row['product_id']}">{$row['product_title']}</a></p>
                <ul>
                <li><span class="low-price" style="width: 100px;">$ {$row['product_price']}</span></li>
                </ul>
            </div>
        </li>
DELIMETER;
        echo $product;
    }
}

function get_categories(){


$query = query("SELECT * FROM categories");
confirm($query);

while($row = fetch_array($query)) {


$categories_links = <<<DELIMETER

<li><a href='shop-list.php?id={$row['cat_id']}'>{$row['cat_title']}</a></li>


DELIMETER;

echo $categories_links;

     }



}

function get_categories_in_home(){
    $query = query("SELECT * FROM categories");
    confirm($query);
    
    while($row = fetch_array($query)) {
    
    
    $categories_links = <<<DELIMETER
    
    <div class="col-md-4">
        <div class="coll-item clearfix">
            <div class="coll-box">
            <a href="#"><img src="../resources/cate.jpg" alt="" /></a>
            <div class="coll-text">
                <p>{$row['cat_title']}</p>
                <a href='shop-list.php?id={$row['cat_id']}'>
                Get The Look <i class="fa fa-angle-right"></i
                ></a>
            </div>
            </div>
        </div>
    </div>
    
    
    DELIMETER;
    
    echo $categories_links;
    
         }
    }

function get_products_in_shop_page() {


$query = query(" SELECT * FROM products WHERE product_quantity >= 1 ");
confirm($query);

while($row = fetch_array($query)) {

$product_image = display_image($row['product_image']);

$product = <<<DELIMETER


            <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <img src="../resources/{$product_image}" alt="">
                    <div class="caption">
                        <h3>{$row['product_title']}</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        <p>
                            <a href="../resources/cart.php?add={$row['product_id']}" class="btn btn-primary">Buy Now!</a> <a href="item.php?id={$row['product_id']}" class="btn btn-default">More Info</a>
                        </p>
                    </div>
                </div>
            </div>

DELIMETER;

echo $product;


        }


}



function login_user(){

if(isset($_POST['submit'])){

$username = escape_string($_POST['username']);
$password = escape_string($_POST['password']);

$query = query("SELECT * FROM users WHERE username = '{$username}' AND password = '{$password }' ");
confirm($query);

if(mysqli_num_rows($query) == 0) {

set_message("Your Password or Username are wrong");
redirect("login.php");

} else {

$_SESSION['username'] = $username;
redirect("admin");

         }
    }

}



function send_message() {
    if(isset($_POST['submit'])){ 
        $to          = "someEmailaddress@gmail.com";
        $from_name   =   $_POST['name'];
        $subject     =   $_POST['subject'];
        $email       =   $_POST['email'];
        $message     =   $_POST['message'];
        $headers = "From: {$from_name} {$email}";
        $result = mail($to, $subject, $message,$headers);
        if(!$result) {
            set_message("Sorry we could not send your message");
            redirect("contact.php");
        } else {
            set_message("Your Message has been sent");
            redirect("contact.php");
        }
    }
}



/****************************BACK END FUNCTIONS************************/
/************************ Admin Products Page ********************/

function display_image($picture) {
    global $upload_directory;
    return $upload_directory  . DS . $picture;
}


function get_products_in_admin(){
    $query = query(" SELECT * FROM products");
    confirm($query);
    while($row = fetch_array($query)) {
        $category = show_product_category_title($row['product_category_id']);
        $product_image = display_image($row['product_image']);
        $product = <<<DELIMETER
                <tr>
                    <td>{$row['product_id']}</td>
                    <td>{$row['product_title']}<br>
                <a href="index.php?edit_product&id={$row['product_id']}"><img width='100' src="../../resources/{$product_image}" alt=""></a>
                    </td>
                    <td>{$category}</td>
                    <td>{$row['product_price']}</td>
                    <td>{$row['product_quantity']}</td>
                    <td><a class="btn btn-info" href="index.php?edit_product_id={$row['product_id']}"><span class="glyphicon glyphicon-pencil"></span></a></td>
                    <td><a class="btn btn-danger" href="index.php?delete_product_id={$row['product_id']}"><span class="glyphicon glyphicon-remove"></span></a></td>
                </tr>

        DELIMETER;
        echo $product;
    }
}


function show_product_category_title($product_category_id){
    $category_query = query("SELECT * FROM categories WHERE cat_id = '{$product_category_id}' ");
    confirm($category_query);
    while($category_row = fetch_array($category_query)) {
        return $category_row['cat_title'];
    }
}

/***************************Add Products in admin********************/


function add_product() {
    if(isset($_POST['publish'])) {
        $product_title          = escape_string($_POST['product_title']);
        $product_category_id    = escape_string($_POST['product_category_id']);
        $product_price          = escape_string($_POST['product_price']);
        $product_description    = escape_string($_POST['product_description']);
        $short_desc             = escape_string($_POST['short_desc']);
        $product_quantity       = escape_string($_POST['product_quantity']);
        $product_image          = escape_string($_FILES['file']['name']);
        $image_temp_location    = escape_string($_FILES['file']['tmp_name']);

        move_uploaded_file($image_temp_location  , UPLOAD_DIRECTORY . DS . $product_image);
        $query = query("INSERT INTO products(product_title, product_category_id, product_price, product_description, short_desc, product_quantity, product_image) VALUES('{$product_title}', '{$product_category_id}', '{$product_price}', '{$product_description}', '{$short_desc}', '{$product_quantity}', '{$product_image}')");
        $last_id = last_id();
        confirm($query);
        set_message("New Product with id {$last_id} was Added");
        redirect("index.php?products");
    }
}

function show_categories_add_product_page(){
    $query = query("SELECT * FROM categories");
    confirm($query);

    while($row = fetch_array($query)) {
        $categories_options = <<<DELIMETER
        <option value="{$row['cat_id']}">{$row['cat_title']}</option>
        DELIMETER;
        echo $categories_options;
    }
}



/***************************updating product code ***********************/
function update_category() {
    if(isset($_POST['update_category'])) {
        $cat_title = escape_string($_POST['cat_title']);

        $query = "UPDATE categories SET ";
        $query .= "cat_title            = '{$cat_title}'        ";
        $query .= "WHERE cat_id=" . escape_string($_GET['edit_category_id']);

        $send_update_query = query($query);
        confirm($send_update_query);
        set_message("Category has been updated");
        redirect("index.php?categories");
    }
}

function update_user() {
    if(isset($_POST['update_user'])) {
        $username = escape_string($_POST['username']);
        $email = escape_string($_POST['email']);
        $password = escape_string($_POST['password']);

        $query = "UPDATE users SET ";
        $query .= "username            = '{$username}'        , ";
        $query .= "email      = '{$email}'        , ";
        $query .= "password            = '{$password}'        ";
        $query .= "WHERE user_id=" . escape_string($_GET['edit_user_id']);

        $send_update_query = query($query);
        confirm($send_update_query);
        set_message("User has been updated");
        $_SESSION['username'] = $username;
        redirect("index.php?users");
    }
}

function update_product() {
    if(isset($_POST['update'])) {

        $product_title          = escape_string($_POST['product_title']);
        $product_category_id    = escape_string($_POST['product_category_id']);
        $product_price          = escape_string($_POST['product_price']);
        $product_description    = escape_string($_POST['product_description']);
        $short_desc             = escape_string($_POST['short_desc']);
        $product_quantity       = escape_string($_POST['product_quantity']);
        $product_image          = escape_string($_FILES['file']['name']);
        $image_temp_location    = escape_string($_FILES['file']['tmp_name']);

        if(empty($product_image)) {
            $get_pic = query("SELECT product_image FROM products WHERE product_id =" .escape_string($_GET['edit_product_id']). " ");
            confirm($get_pic);
            while($pic = fetch_array($get_pic)) {
                $product_image = $pic['product_image'];
            }
        }

        move_uploaded_file($image_temp_location  , UPLOAD_DIRECTORY . DS . $product_image);
        $query = "UPDATE products SET ";
        $query .= "product_title            = '{$product_title}'        , ";
        $query .= "product_category_id      = '{$product_category_id}'  , ";
        $query .= "product_price            = '{$product_price}'        , ";
        $query .= "product_description      = '{$product_description}'  , ";
        $query .= "short_desc               = '{$short_desc}'           , ";
        $query .= "product_quantity         = '{$product_quantity}'     , ";
        $query .= "product_image            = '{$product_image}'          ";
        $query .= "WHERE product_id=" . escape_string($_GET['edit_product_id']);

        $send_update_query = query($query);
        confirm($send_update_query);
        set_message("Product has been updated");
        redirect("index.php?products");
    }
}

/*************************Categories in admin ********************/


function show_categories_in_admin() {
    $category_query = query("SELECT * FROM categories");
    confirm($category_query);
    while($row = fetch_array($category_query)) {
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];
        $category = <<<DELIMETER
        <tr>
            <td>{$cat_id}</td>
            <td>{$cat_title}</td>
            <td><a class="btn btn-info" href="./index.php?edit_category_id={$row['cat_id']}"><span class="glyphicon glyphicon-pencil"></span></a></td>
            <td><a class="btn btn-danger" href="./index.php?delete_category_id={$row['cat_id']}"><span class="glyphicon glyphicon-remove"></span></a></td>
        </tr>
        DELIMETER;
        echo $category;
    }
}


function add_category() {
    if(isset($_POST['add_category'])) {
        $cat_title = escape_string($_POST['cat_title']);
        if(empty($cat_title) || $cat_title == " ") {
            echo "<p class='bg-danger'>THIS CANNOT BE EMPTY</p>";
        } else {
            $insert_cat = query("INSERT INTO categories(cat_title) VALUES('{$cat_title}') ");
            confirm($insert_cat);
            set_message("Category Created");
        }
    }
}

 /************************admin users***********************/

function display_users() {
    $category_query = query("SELECT * FROM users");
    confirm($category_query);
    while($row =  fetch_array($category_query)) {
            $user_id = $row['user_id'];
            $username = $row['username'];
            $email = $row['email'];
            $password = $row['password'];
            $user = <<<DELIMETER
            <tr>
                <td>{$user_id}</td>
                <td>{$username}</td>
                <td>{$email}</td>
                <td><a class="btn btn-info" href="index.php?edit_user_id={$row['user_id']}"><span class="glyphicon glyphicon-pencil"></span></a></td>
                <td><a class="btn btn-danger" href="index.php?delete_user_id={$row['user_id']}"><span class="glyphicon glyphicon-remove"></span></a></td>
            </tr>
            DELIMETER;
            echo $user;
        }

}


function add_user() {
    if(isset($_POST['add_user'])) {
        $username   = escape_string($_POST['username']);
        $email      = escape_string($_POST['email']);
        $password   = escape_string($_POST['password']);
        $query = query("INSERT INTO users(username,email,password) VALUES('{$username}','{$email}','{$password}')");
        confirm($query);
        set_message("USER CREATED");
        redirect("index.php?users");
    }
}


//////// SLIDES ////////

function add_slides(){

    if(isset($_POST['add_slide'])) {
        $slide_title        = escape_string($_POST['slide_title']);
        $slide_image        = escape_string($_FILES['file']['name']);
        $slide_image_loc    = escape_string($_FILES['file']['tmp_name']);
        if(empty($slide_title) || empty($slide_image)) {
            echo "<p class='bg-danger'>This field cannot be empty</p>";
        } else {
            move_uploaded_file($slide_image_loc, UPLOAD_DIRECTORY . DS . $slide_image);
            $query = query("INSERT INTO slides(slide_title, slide_image) VALUES('{$slide_title}', '{$slide_image}')");
            confirm($query);
            set_message("Slide Added");
            redirect("index.php?slides");
        }
    }
}

function get_first_slide(){
    $query = query("SELECT * FROM slides LIMIT 1");
    confirm($query);
    while($row = fetch_array($query)) {
        $slide_image = $row['slide_image'];

$slide_active = <<<DELIMETER
 <img src="../resources/uploads/{$slide_image}" data-fullwidthcentering="on" alt="slide"/>
DELIMETER;
        echo $slide_active;
    }
}

function get_second_slide(){
    $query = query("SELECT * FROM slides ORDER BY slide_id LIMIT 1, 1");
    confirm($query);
    while($row = fetch_array($query)) {
        $slide_image = $row['slide_image'];

$slide_active = <<<DELIMETER
 <img src="../resources/uploads/{$slide_image}" data-fullwidthcentering="on" alt="slide"/>
DELIMETER;
        echo $slide_active;
    }
}

function get_third_slide(){
    $query = query("SELECT * FROM slides ORDER BY slide_id LIMIT 2, 1");
    confirm($query);
    while($row = fetch_array($query)) {
        $slide_image = $row['slide_image'];

$slide_active = <<<DELIMETER
 <img src="../resources/uploads/{$slide_image}" data-fullwidthcentering="on" alt="slide"/>
DELIMETER;
        echo $slide_active;
    }
}

function get_slide_thumbnails(){
    $query = query("SELECT * FROM slides ORDER BY slide_id ASC ");
    confirm($query);
    while($row = fetch_array($query)) {
        $slide_image = display_image($row['slide_image']);
        $slide_thumb_admin = <<<DELIMETER

<div class="col-xs-6 col-md-3 image_container">
    <a href="">
         <img  class="img-responsive slide_image" src="../../resources/{$slide_image}" alt="">
    </a>
    <div class="caption">
    <p>{$row['slide_title']}</p>
    <a class="btn btn-danger" href="index.php?delete_slide_id={$row['slide_id']}"><span class="glyphicon glyphicon-remove"></span></a>
    </div>
</div>

DELIMETER;
        echo $slide_thumb_admin;
    }
}

function get_current_slide_in_admin(){
    $query = query("SELECT * FROM slides ORDER BY slide_id DESC LIMIT 1");
    confirm($query);
    while($row = fetch_array($query)) {
        $slide_image = display_image($row['slide_image']);
        $slide_active_admin = <<<DELIMETER
    <img class="img-responsive" src="../../resources/{$slide_image}" alt="">
DELIMETER;
        echo $slide_active_admin;
    }
}
