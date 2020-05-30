<?php require_once("../resources/config.php"); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>SweetPick</title>

    <meta charset="utf-8" />

    <!--[if IE
      ]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"
    /><![endif]-->
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, maximum-scale=1"
    />

    <link
      href="http://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic"
      rel="stylesheet"
      type="text/css"
    />
    <link
      href="http://fonts.googleapis.com/css?family=Raleway:400,300,500,600,800,900,200,100"
      rel="stylesheet"
      type="text/css"
    />
    <link
      href="http://fonts.googleapis.com/css?family=Noticia+Text:400,400italic,700,700italic"
      rel="stylesheet"
      type="text/css"
    />
    <link
      href="http://fonts.googleapis.com/css?family=Raleway:500,600,700,400,200,300"
      rel="stylesheet"
      type="text/css"
    />
    <link
      href="http://fonts.googleapis.com/css?family=Playfair+Display:400,700,900,400italic,700italic,900italic"
      rel="stylesheet"
      type="text/css"
    />

    <link
      rel="stylesheet"
      type="text/css"
      href="css/bootstrap.css"
      media="screen"
    />

    <!-- REVOLUTION BANNER CSS SETTINGS -->
    <link
      rel="stylesheet"
      type="text/css"
      href="css/fullwidth.css"
      media="screen"
    />
    <link
      rel="stylesheet"
      type="text/css"
      href="css/settings.css"
      media="screen"
    />

    <link
      rel="stylesheet"
      type="text/css"
      href="css/font-awesome.css"
      media="screen"
    />
    <link
      rel="stylesheet"
      type="text/css"
      href="css/jquery.bxslider.css"
      media="screen"
    />
    <link
      rel="stylesheet"
      type="text/css"
      href="css/style.css"
      media="screen"
    />
    <link
      rel="stylesheet"
      type="text/css"
      href="css/responsive.css"
      media="screen"
    />

    <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon" />
    <link rel="icon" href="images/favicon.png" type="image/x-icon" />
  </head>
  <body class="boxed">
    <!-- Preloader -->
    <div id="preloader">
      <div id="status">&nbsp;</div>
    </div>

    <!-- Container -->
    <div id="container" class="container">
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

      <!-- Slider -->
      <div class="slider">
        <div class="fullwidthbanner-container">
          <div class="fullwidthbanner" id="intro">
            <ul>
              <!-- First SLIDE -->
              <li
                data-transition="random"
                data-slotamount="10"
                data-masterspeed="300"
              >
                <!-- THE MAIN IMAGE IN THE FIRST SLIDE -->
                <?php get_first_slide(); ?>
                <!-- THE CAPTIONS IN THIS SLDIE -->
                <div
                  class="caption small_text lft"
                  data-x="center"
                  data-y="130"
                  data-speed="300"
                  data-start="1200"
                  data-easing="easeOutExpo"
                  data-end="7000"
                  data-endspeed="300"
                  data-endeasing="easeInSine"
                >
                  Hot Trends of This Year
                </div>

                <div
                  class="caption lfl"
                  data-x="center"
                  data-y="180"
                  data-speed="400"
                  data-start="1800"
                  data-easing="easeOutExpo"
                  data-end="7200"
                  data-endspeed="300"
                  data-endeasing="easeInSine"
                >
                  <img src="upload/revolution/s-border.png" alt="Image 1" />
                </div>

                <div
                  class="caption big_white lfb stt"
                  data-x="center"
                  data-y="250"
                  data-speed="500"
                  data-start="1800"
                  data-easing="easeOutExpo"
                  data-end="7100"
                  data-endspeed="300"
                  data-endeasing="easeInSine"
                >
                  new autumN collection
                </div>

                <div
                  class="caption lfb stt"
                  data-x="center"
                  data-y="340"
                  data-speed="640"
                  data-start="2100"
                  data-easing="easeOutExpo"
                  data-end="7100"
                  data-endspeed="300"
                  data-endeasing="easeInSine"
                >
                  <a href="shop-list.php" class="slider-button">SHOP NOW </a>
                </div>
              </li>
              <!-- second SLIDE -->
              <li
                data-transition="random"
                data-slotamount="10"
                data-masterspeed="300"
              >
                <!-- THE MAIN IMAGE IN THE FIRST SLIDE -->
                <?php get_second_slide(); ?>
                <!-- THE CAPTIONS IN THIS SLDIE -->
                <div
                  class="caption small_text lft"
                  data-x="center"
                  data-y="130"
                  data-speed="300"
                  data-start="1200"
                  data-easing="easeOutExpo"
                  data-end="7000"
                  data-endspeed="300"
                  data-endeasing="easeInSine"
                >
                  Hot Trends of This Year
                </div>

                <div
                  class="caption lfl"
                  data-x="center"
                  data-y="180"
                  data-speed="400"
                  data-start="1800"
                  data-easing="easeOutExpo"
                  data-end="7200"
                  data-endspeed="300"
                  data-endeasing="easeInSine"
                >
                  <img src="upload/revolution/s-border.png" alt="Image 1" />
                </div>

                <div
                  class="caption big_white lfb stt"
                  data-x="center"
                  data-y="250"
                  data-speed="500"
                  data-start="1800"
                  data-easing="easeOutExpo"
                  data-end="7100"
                  data-endspeed="300"
                  data-endeasing="easeInSine"
                >
                  Winter collection
                </div>

                <div
                  class="caption lfb stt"
                  data-x="center"
                  data-y="340"
                  data-speed="640"
                  data-start="2100"
                  data-easing="easeOutExpo"
                  data-end="7100"
                  data-endspeed="300"
                  data-endeasing="easeInSine"
                >
                  <a href="shop-list.php" class="slider-button">SHOP NOW </a>
                </div>
              </li>

              <!-- third SLIDE -->
              <li
                data-transition="random"
                data-slotamount="10"
                data-masterspeed="300"
              >
                <!-- THE MAIN IMAGE IN THE FIRST SLIDE -->
                <?php get_third_slide(); ?>
                <!-- THE CAPTIONS IN THIS SLDIE -->
                <div
                  class="caption modern_small_text_dark lft"
                  data-x="710"
                  data-y="130"
                  data-speed="300"
                  data-start="1200"
                  data-easing="easeOutExpo"
                  data-end="7000"
                  data-endspeed="300"
                  data-endeasing="easeInSine"
                >
                  Hot Trends of This Year
                </div>

                <div
                  class="caption big_black lfb stt"
                  data-x="650"
                  data-y="180"
                  data-speed="500"
                  data-start="1800"
                  data-easing="easeOutExpo"
                  data-end="7100"
                  data-endspeed="300"
                  data-endeasing="easeInSine"
                >
                  Summer<br />Trends
                </div>

                <div
                  class="caption lfl"
                  data-x="730"
                  data-y="360"
                  data-speed="400"
                  data-start="1800"
                  data-easing="easeOutExpo"
                  data-end="7200"
                  data-endspeed="300"
                  data-endeasing="easeInSine"
                >
                  <img src="upload/revolution/s-border2.png" alt="Image 1" />
                </div>

                <div
                  class="caption lfb stt"
                  data-x="745"
                  data-y="400"
                  data-speed="640"
                  data-start="2100"
                  data-easing="easeOutExpo"
                  data-end="7100"
                  data-endspeed="300"
                  data-endeasing="easeInSine"
                >
                  <a href="shop-list.php" class="slider-button2">SHOP NOW </a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <!-- End SLider -->

      <!-- content 
			================================================== -->
      <div id="content">
        <div class="collection clearfix">
          <div class="nocontainer">
            <div class="row">
              <?php get_categories_in_home();?>
            </div>
          </div>
        </div>
        <!-- End Collection -->

        <!-- our work portfolio -->
        <div class="arrivals">
          <div class="nocontainer">
            <div class="filters">
              <div class="filter clearfix">
                <div class="holder">
                  <ul>
                    <li><a href="#" class="" data-filter="*"><i class="fa fa-star"></i>All Products<i class="fa fa-star"></i></a></li>
                  </ul>
                  <div class="holder-border"></div>
                </div>
              </div>
              <div class="clear"></div>

              <div class="demo1 clearfix">
                <ul class="filter-container clearfix">
                  <?php get_products_in_home(); ?>
                </ul>
              </div>
            </div>
            <!-- End Filters -->
          </div>
        </div>
        <!-- end our work portfolio -->

        <div class="partners">
          <div class="nocontainer">
            <div class="row">
              <div class="col-sm-2">
                <a href="#"><img src="upload/b1.jpeg" alt="" /></a>
              </div>
              <div class="col-sm-2">
                <a href="#"><img src="upload/b2.jpg" alt="" /></a>
              </div>
              <div class="col-sm-2">
                <a href="#"><img src="upload/b3.png" alt="" /></a>
              </div>
              <div class="col-sm-2">
                <a href="#"><img src="upload/b4.jpg" alt="" /></a>
              </div>
              <div class="col-sm-2">
                <a href="#"><img src="upload/b5.jpg" alt="" /></a>
              </div>
              <div class="col-sm-2">
                <a href="#"><img src="upload/b6.jpg" alt="" /></a>
              </div>
            </div>
          </div>
        </div>
      </div>
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
    </div>

    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery.superfish.js"></script>
    <script type="text/javascript" src="js/jquery.bxslider.js"></script>

    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/jquery.nicescroll.min.js"></script>
    <script type="text/javascript" src="js/plugins-scroll.js"></script>
    <script type="text/javascript" src="js/jquery.isotope.min.js"></script>
    <script type="text/javascript" src="js/jquery.imagesloaded.min.js"></script>
    <script type="text/javascript" src="js/jquery.appear.js"></script>
    <script type="text/javascript" src="js/jquery.countTo.js"></script>
    <script src="js/jquery.parallax.js"></script>
    <!-- jQuery KenBurn Slider  -->
    <script
      type="text/javascript"
      src="js/jquery.themepunch.revolution.min.js"
    ></script>
    <script type="text/javascript" src="js/script.js"></script>

    <!--
	##############################
	 - ACTIVATE THE BANNER HERE -
	##############################
	-->
    <script type="text/javascript">
      var tpj = jQuery;
      tpj.noConflict();

      tpj(document).ready(function () {
        if (tpj.fn.cssOriginal != undefined) tpj.fn.css = tpj.fn.cssOriginal;

        var api = tpj(".fullwidthbanner").revolution({
          delay: 8000,
          startwidth: 1170,
          startheight: 570,

          onHoverStop: "off", // Stop Banner Timet at Hover on Slide on/off

          thumbWidth: 100, // Thumb With and Height and Amount (only if navigation Tyope set to thumb !)
          thumbHeight: 50,
          thumbAmount: 3,

          hideThumbs: 0,
          navigationType: "bullet", // bullet, thumb, none
          navigationArrows: "solo", // nexttobullets, solo (old name verticalcentered), none

          navigationStyle: "round", // round,square,navbar,round-old,square-old,navbar-old, or any from the list in the docu (choose between 50+ different item), custom

          navigationHAlign: "center", // Vertical Align top,center,bottom
          navigationVAlign: "bottom", // Horizontal Align left,center,right
          navigationHOffset: 30,
          navigationVOffset: 40,

          soloArrowLeftHalign: "left",
          soloArrowLeftValign: "center",
          soloArrowLeftHOffset: 40,
          soloArrowLeftVOffset: 0,

          soloArrowRightHalign: "right",
          soloArrowRightValign: "center",
          soloArrowRightHOffset: 40,
          soloArrowRightVOffset: 0,

          touchenabled: "on", // Enable Swipe Function : on/off

          stopAtSlide: -1, // Stop Timer if Slide "x" has been Reached. If stopAfterLoops set to 0, then it stops already in the first Loop at slide X which defined. -1 means do not stop at any slide. stopAfterLoops has no sinn in this case.
          stopAfterLoops: -1, // Stop Timer if All slides has been played "x" times. IT will stop at THe slide which is defined via stopAtSlide:x, if set to -1 slide never stop automatic

          hideCaptionAtLimit: 0, // It Defines if a caption should be shown under a Screen Resolution ( Basod on The Width of Browser)
          hideAllCaptionAtLilmit: 0, // Hide all The Captions if Width of Browser is less then this value
          hideSliderAtLimit: 0, // Hide the whole slider, and stop also functions if Width of Browser is less than this value

          fullWidth: "on",

          shadow: 1, //0 = no Shadow, 1,2,3 = 3 Different Art of Shadows -  (No Shadow in Fullwidth Version !)
        });

        // TO HIDE THE ARROWS SEPERATLY FROM THE BULLETS, SOME TRICK HERE:
        // YOU CAN REMOVE IT FROM HERE TILL THE END OF THIS SECTION IF YOU DONT NEED THIS !
        api.bind("revolution.slide.onloaded", function (e) {
          jQuery(".tparrows").each(function () {
            var arrows = jQuery(this);

            var timer = setInterval(function () {
              if (
                arrows.css("opacity") == 1 &&
                !jQuery(".tp-simpleresponsive").hasClass("mouseisover")
              )
                arrows.fadeOut(300);
            }, 3000);
          });

          jQuery(".tp-simpleresponsive, .tparrows").hover(
            function () {
              jQuery(".tp-simpleresponsive").addClass("mouseisover");
              jQuery("body")
                .find(".tparrows")
                .each(function () {
                  jQuery(this).fadeIn(300);
                });
            },
            function () {
              if (!jQuery(this).hasClass("tparrows"))
                jQuery(".tp-simpleresponsive").removeClass("mouseisover");
            }
          );
        });
        // END OF THE SECTION, HIDE MY ARROWS SEPERATLY FROM THE BULLETS
      });
    </script>
  </body>
</html>
