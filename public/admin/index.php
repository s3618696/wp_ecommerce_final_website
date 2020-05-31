<?php require_once("../../resources/config.php"); ?>
<!--  RMIT University
Khuc Thi Xuan Quyen - s3618696
The host link for this website is kxquyen.epizy.com/public 
-->

<?php include(TEMPLATE_BACK . "/header.php"); ?>

<?php 
if(!isset($_SESSION['username'])) {
redirect("../../public");

}

 ?>

        <div id="page-wrapper">
            <div class="container-fluid">
                <?php 
                if(isset($_GET['categories'])){
                    include(TEMPLATE_BACK . "/categories.php");
                }

                if(isset($_GET['edit_category_id'])){
                    include(TEMPLATE_BACK . "/edit_category.php");
                }

                 if(isset($_GET['products'])){
                    include(TEMPLATE_BACK . "/products.php");
                }


                 if(isset($_GET['add_product'])){
                    include(TEMPLATE_BACK . "/add_product.php");
                }


                 if(isset($_GET['edit_product_id'])){
                    include(TEMPLATE_BACK . "/edit_product.php");
                }

                if(isset($_GET['users'])){
                    include(TEMPLATE_BACK . "/users.php");
                }


                if(isset($_GET['add_user'])){
                    include(TEMPLATE_BACK . "/add_user.php");
                }


                 if(isset($_GET['edit_user_id'])){
                    include(TEMPLATE_BACK . "/edit_user.php");
                }

                if(isset($_GET['slides'])){
                    include(TEMPLATE_BACK . "/slides.php");
                }

                if(isset($_GET['delete_product_id'])){
                    include(TEMPLATE_BACK . "/delete_product.php");
                }

                if(isset($_GET['delete_category_id'])){
                    include(TEMPLATE_BACK . "/delete_category.php");
                }

                if(isset($_GET['delete_user_id'])){
                    include(TEMPLATE_BACK . "/delete_user.php");
                }


                if(isset($_GET['delete_slide_id'])){
                    include(TEMPLATE_BACK . "/delete_slide.php");
                }

                 ?>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
<?php include(TEMPLATE_BACK . "/footer.php"); ?>
