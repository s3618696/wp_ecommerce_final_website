<!--  RMIT University
Khuc Thi Xuan Quyen - s3618696
The host link for this website is kxquyen.epizy.com/public 
-->

<?php require_once("../resources/config.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>SweetPick</title>

	<meta charset="utf-8">

	<!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<link href='http://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Raleway:400,300,500,600,800,900,200,100' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Noticia+Text:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Raleway:500,600,700,400,200,300' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Playfair+Display:400,700,900,400italic,700italic,900italic' rel='stylesheet' type='text/css'>


	<link rel="stylesheet" type="text/css" href="css/bootstrap.css" media="screen">	

    <!-- REVOLUTION BANNER CSS SETTINGS -->
    <link rel="stylesheet" type="text/css" href="css/fullwidth.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="css/settings.css" media="screen" />

	<link rel="stylesheet" type="text/css" href="css/font-awesome.css" media="screen">
	<link rel="stylesheet" type="text/css" href="css/magnific-popup.css" media="screen">
	<link rel="stylesheet" type="text/css" href="css/jquery.bxslider.css" media="screen">
	<link rel="stylesheet" type="text/css" href="css/style.css" media="screen">
	<link rel="stylesheet" type="text/css" href="css/responsive.css" media="screen">
	
	<link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
	<link rel="icon" href="images/favicon.png" type="image/x-icon">



</head>
<body>

<!-- Preloader -->
<div id="preloader">
    <div id="status">&nbsp;</div>
</div>

	<!-- Container -->
	<div id="container">
		<!-- Header
		    ================================================== -->
			<header class="clearfix">
        <div class="top-line">
          <div class="nocontainer">
            <div class="left-line">
              <div class="mobile-a">
              <?php 
                    if(isset($_SESSION['username'])){
                      echo "<a href='#'>". $_SESSION['username'] . "</a>";
                      echo "<a href='admin/logout.php'><i class='fa fa-fw fa-power-off'></i> Log Out</a>";
                    } else {
                      echo "<a href='#login-box' class='login-window'>Login</a>";
                    }
                    ?>
              </div>
            </div>
            <div class="right-line clearfix">
              <ul>
              <?php 
                    if(isset($_SESSION['username'])){
                      echo "<li><a href='#'>". $_SESSION['username'] . "</a></li>";
                      echo "<li><a href='admin/logout.php'><i class='fa fa-fw fa-power-off'></i> Log Out</a></li>";
                    } else {
                      echo "<li><a href='#login-box' class='login-window'>Login</a></li>";
                    }
                    ?>
              </ul>

              <div id="login-box" class="login-popup">
                <a href="#" class="close"
                  ><img
                    src="images/delete.png"
                    class="btn_close"
                    title="Close Window"
                    alt="Close"
                /></a>
                <form method="post" class="signin" action="">
                  <?php login_user(); ?>
                  <fieldset class="textbox">
                    <h4 class="login-title">LOGIN</h4>

                    <input placeholder="Email*" type="text" name="username" />
                    <input placeholder="Password*" type="password" name="password" />

                    <input class="submit button" type="submit" name="submit" style = "background-color: #ea5748;">

                  </fieldset>
                </form>
              </div>
            </div>
            <div class="clear"></div>
          </div>
        </div>
        <!-- end topline -->

        <div class="upper-header" style="margin-bottom: 30px;">
          <div class="nocontainer">
            <div class="logo">
              <a href="index.php"><img src="images/logo.png" alt="" /></a>
            </div>
            <div class="clear"></div>
          </div>
          <!-- End container -->
        </div>
        <!-- End Upper-header -->

        <div class="nav-border"></div>
        <div class="nocontainer">
          <!-- Navigation -->
          <nav id="nav">
            <ul id="navlist" class="sf-menu clearfix">
              <li class="current">
                <a href="index.php">Home</a>
              </li>
              <li>
                <a href="shop-list.php">Shop</a>
              </li>
              <li>
              <?php 
                    if(isset($_SESSION['username'])){
                      echo "<a href='admin'>Admin</a>";
                    } else {
                      echo "<a href='#login-box' class='login-window'>Admin</a>";
                    }
                    ?>
              </li>
              <li><a href="shopping-cart.php">Shopping Cart</a></li>
            </ul>
          </nav>
          <!-- Navigation -->
        </div>
      </header>
		<!-- End Header -->


		<!-- content -->
		<div id="content">

			<div class="checkout">

				<div class="container">

					<div class="check-anchor clearfix mb40">
						<div class="holder">
							<ul>
								<li class="active"><a href="#"><i class="fa fa-star"></i> Checkout</a></li>
								<li><i class="fa fa-star"></i></li>
							</ul>
							<div class="holder-border"></div>
						</div>
					</div>

					<div class="checkout-infos">
						<div class="row">
						<form class="" action="index.php" method="post">
							<?php place_order();?>
							<div class="col-md-8">

								<div id="accordion-container" class="checkout-accordion"> 
									<h2 class="accordion-header">BILLING INFORMATION</h2>
									<div class="accordion-content second-row">
										
											<div class="row">
												<div class="col-md-6">
													<label>First Name <span>*</span></label>
													<input type="text" name="firstname">
												</div>
												<div class="col-md-6">
													<label>Last Name <span>*</span></label>
													<input type="text" name="lastname">
												</div>
											</div>

											<label>Company Name</label>
											<input type="text" name="company">

											<label>Address <span>*</span></label>
											<input type="text" placeholder="Street Address" name="shipping_address">

											<div class="row">
												<div class="col-md-6">
													<label>Country / State</label>
													<input type="text" name="country">
												</div>
												<div class="col-md-6">
													<label>Postcode <span>*</span></label>
													<input type="text" name="postcode">
												</div>
											</div>

											<div class="row">
												<div class="col-md-6">
													<label>Email Address <span>*</span></label>
													<input type="text" name="email">
												</div>
												<div class="col-md-6">
													<label>phone <span>*</span></label>
													<input type="text" name="phone">
												</div>
											</div>
										
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="check-aside">
									<div class="orders second-order mb20">
										<h6>Your Orders</h6>
										<?php checkout_cart(); ?>
										<div class="order-box">
											<p>Cart Subtotal: <span>$
											<?php echo isset($_SESSION['item_total']) ? $_SESSION['item_total'] : $_SESSION['item_total'] = "0";?>
											</span></p>
										</div>
										<div class="order-box mb20">
											<p>Shipping and Handling: <span>Free Shipping</span></p>
										</div>
										<p><strong>Total: <span>$
										<?php echo isset($_SESSION['item_total']) ? $_SESSION['item_total'] : $_SESSION['item_total'] = "0";?>
										</span></strong></p>
									</div>
									<div class="payment-method">
										<h6>Payment Method</h6>
										<form>
											<input type="radio" name="pay" value="paypal"><p>PayPal</p> <img src="upload/paypal.png" alt="">
											<input type="submit" value="Place Order" name="place_order">
										</form> 
									</div>
								</div>
							</div>
							</form>
						</div>
					</div>

				</div>

			</div>
			<!-- End Product Single -->
      <!-- End content -->

      <!-- footer 
			================================================== -->
      <footer>
        <div class="inner-footer">
          <div class="nocontainer">
            <div class="row">
              <div class="col-md-3">
                <div class="f-about">
                  <h1>ABOUT SHOP</h1>
                  <p class="mb20">
                    We possess within us two minds. So far I have written only
                    of the conscious mind.We further know that the subconscious
                    has recorded every event. This is just perfect fashion website.
                  </p>
                  <h1>NEWSLETTER</h1>
                  <form action="#">
                    <input type="text" placeholder="Your e-mail" />
                    <input type="submit" value="" />
                  </form>
                </div>
              </div>
              <div class="col-md-3">
                <div class="infos">
                  <h1>Information</h1>
                  <ul>
                    <li><a href="#">• Our Stores</a></li>
                    <li><a href="#">• Delivery Information</a></li>
                    <li><a href="#">• About Us</a></li>
                    <li><a href="#">• Terms and Conditions</a></li>
                    <li><a href="#">• Privacy Policy</a></li>
                    <li><a href="#">• Contact Us</a></li>
                    <li><a href="#">• Returns</a></li>
                  </ul>
                </div>
              </div>
              <div class="col-md-3">
                <div class="account">
                  <h1>My Account</h1>
                  <ul>
                    <li><a href="#">• My Account</a></li>
                    <li><a href="#">• Order History</a></li>
                    <li><a href="#">• My Wishlist</a></li>
                    <li><a href="#">• Specials</a></li>
                    <li><a href="#">• Track Order</a></li>
                    <li><a href="#">• Gift Vouchers</a></li>
                    <li><a href="#">• My Credit Slips</a></li>
                  </ul>
                </div>
              </div>
              <div class="col-md-3">
                <div class="gettouch">
                  <h1>Get in Touch with us</h1>
                  <p>
                    <i class="fa fa-home"></i> 702 Nguyen Van Linh Street, Ho Chi Minh City, Vietnam.
                  </p>
                  <p><i class="fa fa-phone"></i> +63 918 4084 694</p>
                  <p class="mb20">
                    <i class="fa fa-envelope"></i> s3618696@rmit.edu.vn
                  </p>
                  <h1>FIND US ON</h1>
                  <ul class="footer-socials">
                    <li>
                      <a href="#"><i class="fa fa-facebook"></i></a>
                    </li>
                    <li>
                      <a href="#"><i class="fa fa-twitter"></i></a>
                    </li>
                    <li>
                      <a href="#"><i class="fa fa-pinterest"></i></a>
                    </li>
                    <li>
                      <a href="#"><i class="fa fa-linkedin"></i></a>
                    </li>
                    <li>
                      <a href="#"><i class="fa fa-google-plus"></i></a>
                    </li>
                    <li>
                      <a href="#"><i class="fa fa-youtube"></i></a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div id="back-to-top">
            <a href="#top">Back to Top</a>
          </div>
        </div>
        <!-- end contanir & inner-footer -->
        <div class="nocontainer">
          <div class="last-div">
            <div class="row">
              <div class="payment">
                <a href="#"><img src="upload/payments.png" alt="" /></a>
              </div>
              <div class="clear"></div>
            </div>
          </div>
        </div>
      </footer>
		<!-- End footer -->



        <!-- Style Switch -->

		<!-- Style Switch -->

		</div>

	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery.superfish.js"></script>
	<script type="text/javascript" src="js/jquery.bxslider.js"></script>

	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script type="text/javascript" src="js/retina-1.1.0.min.js"></script>
	<script type="text/javascript" src="js/jquery.nicescroll.min.js"></script>
	<script type="text/javascript" src="js/jquery.magnific-popup.min.js"></script>
	<script type="text/javascript" src="js/plugins-scroll.js"></script>
  	<script type="text/javascript" src="js/jquery.isotope.min.js"></script>
	<script type="text/javascript" src="js/jquery.imagesloaded.min.js"></script>
	<script type="text/javascript" src="js/jquery.appear.js"></script>
	<script type="text/javascript" src="js/jquery.countTo.js"></script>
	<script src="js/jquery.parallax.js"></script>
     <!-- jQuery KenBurn Slider  -->
    <script type="text/javascript" src="js/jquery.themepunch.revolution.min.js"></script>
	<script type="text/javascript" src="js/script.js"></script>

 	<!-- include jQuery + carouFredSel plugin -->
    <script type="text/javascript" src="js/jquery.carouFredSel.js"></script>

    <!-- optionally include helper plugins -->
    <script type="text/javascript" src="js/jquery.mousewheel.min.js"></script>
    <script type="text/javascript" src="js/jquery.touchSwipe.min.js"></script>
	
</body>
</html>