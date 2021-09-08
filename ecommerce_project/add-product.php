<?php 
include "php/connection.php";
$query = "Select * from types";
$stmt = $connection->prepare($query);
$stmt->execute();
$result = $stmt->get_result();
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Basic Page Needs
  ================================================== -->
  <meta charset="utf-8">
  <title>AShop | E-commerce Website</title>

  <!-- Mobile Specific Metas
  ================================================== -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Construction Html5 Template">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
  <meta name="author" content="Themefisher">
  <meta name="generator" content="Themefisher Constra HTML Template v1.0">
  
  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" />
  
  <!-- Themefisher Icon font -->
  <link rel="stylesheet" href="plugins/themefisher-font/style.css">
  <!-- bootstrap.min css -->
  <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
  
  <!-- Animate css -->
  <link rel="stylesheet" href="plugins/animate/animate.css">
  <!-- Slick Carousel -->
  <link rel="stylesheet" href="plugins/slick/slick.css">
  <link rel="stylesheet" href="plugins/slick/slick-theme.css">
  
  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="css/style.css">

</head>

<body id="body">
<!-- Start Top Header Bar -->
<section class="top-header">
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-xs-12 col-sm-4">
			</div>
			<div class="col-md-4 col-xs-12 col-sm-4">
				<!-- Site Logo -->
				<div class="logo text-center">
					<a href="dashboard.php">
						<!-- replace logo here -->
						<svg width="135px" height="29px" viewBox="0 0 155 29" version="1.1" xmlns="http://www.w3.org/2000/svg"
							xmlns:xlink="http://www.w3.org/1999/xlink">
							<g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" font-size="40"
								font-family="AustinBold, Austin" font-weight="bold">
								<g id="Group" transform="translate(-108.000000, -297.000000)" fill="#000000">
									<text id="AVIATO">
										<tspan x="108.94" y="325">ASHOP</tspan>
									</text>
								</g>
							</g>
						</svg>
					</a>
				</div>
			</div>
			<div class="col-md-4 col-xs-12 col-sm-4">
				<!-- Cart -->
				<ul class="top-menu text-right list-inline">
					<!-- Search -->
					<li class="dropdown search dropdown-slide">
						<a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"><i
								class="tf-ion-ios-search-strong"></i> Search</a>
						<ul class="dropdown-menu search-dropdown">
							<li>
								<form action="post"><input type="search" class="form-control" placeholder="Search..."></form>
							</li>
						</ul>
					</li><!-- / Search -->
					<li class="dropdown search dropdown-slide">
					<a href="php/logout.php" class="">Logout</a>
					</li>
				</ul><!-- / .nav .navbar-nav .navbar-right -->
			</div>
		</div>
	</div>
</section><!-- End Top Header Bar -->


<!-- Main Menu Section -->
<section class="menu">
	<nav class="navbar navigation">
		<div class="container">
			<div class="navbar-header">
				<h2 class="menu-title">Main Menu</h2>
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
					aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>

			</div><!-- / .navbar-header -->

			<!-- Navbar Links -->
			<div id="navbar" class="navbar-collapse collapse text-center">
				<ul class="nav navbar-nav">

					<!-- Home -->
					<li class="dropdown ">
						<a href="dashboard.php">Home</a>
					</li><!-- / Home -->


					<!-- Elements -->
					<li class="dropdown dropdown-slide">
						<a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="350"
							role="button" aria-haspopup="true" aria-expanded="false">Shop <span
								class="tf-ion-ios-arrow-down"></span></a>
						<div class="dropdown-menu">
							<div class="row">

								<!-- Basic -->
								<div class="col-lg-12 col-md-12 mb-sm-6">
									<ul>
										<li class="dropdown-header">Pages</li>
										<li role="separator" class="divider"></li>
										<li><a href="dashboard.php">Dashboard</a></li>
										<li><a href="add-product.php">Add Product</a></li>
										<li><a href="products_instore.php">Show All Products</a></li>
									</ul>
								</div>

							</div><!-- / .row -->
						</div><!-- / .dropdown-menu -->
					</li><!-- / Elements -->


					<!-- Pages -->
					<li class="dropdown dropdown-slide">
						<a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="350"
							role="button" aria-haspopup="true" aria-expanded="false">Pages <span
								class="tf-ion-ios-arrow-down"></span></a>
						<div class="dropdown-menu">
							<div class="row">

								<!-- Introduction -->
								<div class="col-lg-6 col-md-6 mb-sm-3">
									<ul>
										<li class="dropdown-header">Introduction</li>
										<li role="separator" class="divider"></li>
										<li><a href="about.php">About Us</a></li>
										<li><a href="contact.html">Contact Us</a></li>
									</ul>
								</div>

								<!-- Contact -->
								<div class="col-lg-6 col-md-6 mb-sm-3">
									<ul>
										<li class="dropdown-header">Dashboard</li>
										<li role="separator" class="divider"></li>
										<li><a href="dashboard.php">Dashboard</a></li>
										<li><a href="profile-details.php">Profile Details</a></li>
									</ul>
								</div>
							</div><!-- / .row -->
						</div><!-- / .dropdown-menu -->
					</li><!-- / Pages -->

				</ul><!-- / .nav .navbar-nav -->

			</div>
			<!--/.navbar-collapse -->
		</div><!-- / .container -->
	</nav>
</section>
<section class="signin-page account">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <div class="block text-center">
          <h2 class="text-center">Add Your Product Information</h2>
          <form action="php/add.php" method="post" id="add_productF" class="text-left clearfix" enctype="multipart/form-data">
            <div class="form-group">
              <input type="text" class="form-control"  placeholder="Product's Name" name="name" id="name" required>
              <div id="name_error" class="alert alert-danger alert-common alert-dismissible" role="alert" hidden> 
		            	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		            	<i class="tf-ion-close-circled"></i><span id="error"></span>
		          </div>
            </div>
            <div class="form-group">
              <input type="text" class="form-control"  placeholder="Price in $" name="price_per_unit" required id="price">
              <div id="price_error" class="alert alert-danger alert-common alert-dismissible" role="alert" hidden> 
		            	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		            	<i class="tf-ion-close-circled"></i><span id="perror"></span>
		          </div>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" id="weight" placeholder="Weight in Kg" name="weight_in_Kg">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="quantity" placeholder="Quantity in stock" name="quantity_in_stock" required>
                <div id="quantity_error" class="alert alert-danger alert-common alert-dismissible" role="alert" hidden> 
		            	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		            	<i class="tf-ion-close-circled"></i><span id="qerror"></span>
		          </div>
              </div>
            <div class="form-group">
              <input type="text" class="form-control"  placeholder="Description" name="description" required id="description">
              <div id="desc_error" class="alert alert-danger alert-common alert-dismissible" role="alert" hidden> 
		            	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		            	<i class="tf-ion-close-circled"></i><span id="derror"></span>
		          </div>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="production"  placeholder="Production Date YYYY-MM-DD" name="prod_date">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" id="expiry"  placeholder="Expiration Date YYYY-MM-DD" name="exp_date">
              </div>
              <div class="form-group">
                <select class="form-control" id="category" name="type" required>
                  <option value="" selected>Category</option>
                  <?php while ($row = $result->fetch_assoc()) {
                    echo '<option value='.$row["id"].'>' . $row["type"]. "</option>";
                  } ?>
                </select>
              </div>
              <div class="custom-file form-group form-control">
                <input type="file" class="" id="image" name="image" required>
                <div id="image_error" class="alert alert-danger alert-common alert-dismissible" role="alert" hidden> 
		            	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		            	<i class="tf-ion-close-circled"></i><span id="ierror"></span>
		          </div>
              </div>

            <div class="text-center">
              <button type="button" class="btn btn-main text-center" id="add_product">Add Product</button>
            </div>
          </form>
          <p class="mt-20"><a href="dashboard.php">Return to Home Page</a></p>
        </div>
      </div>
    </div>
  </div>
</section>

<footer class="footer section text-center">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<ul class="social-media">
					<li>
						<a href="https://www.facebook.com">
							<i class="tf-ion-social-facebook"></i>
						</a>
					</li>
					<li>
						<a href="https://www.instagram.com">
							<i class="tf-ion-social-instagram"></i>
						</a>
					</li>
					<li>
						<a href="https://www.twitter.com">
							<i class="tf-ion-social-twitter"></i>
						</a>
					</li>
					<li>
						<a href="https://www.pinterest.com">
							<i class="tf-ion-social-pinterest"></i>
						</a>
					</li>
				</ul>
				<ul class="footer-menu text-uppercase">
					<li>
						<a href="contact.html">CONTACT</a>
					</li>
					<li>
						<a href="dashboard.php">SHOP</a>
					</li>
				</ul>
				<p class="copyright-text">Copyright &copy;2021, Designed &amp; Developed by <a href="https://themefisher.com/">Themefisher</a></p>
			</div>
		</div>
	</div>
</footer>

    <!-- 
    Essential Scripts
    =====================================-->
    
    <!-- Main jQuery -->
    <script src="plugins/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.1 -->
    <script src="plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- Bootstrap Touchpin -->
    <script src="plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js"></script>
    <!-- Instagram Feed Js -->
    <script src="plugins/instafeed/instafeed.min.js"></script>
    <!-- Video Lightbox Plugin -->
    <script src="plugins/ekko-lightbox/dist/ekko-lightbox.min.js"></script>
    <!-- Count Down Js -->
    <script src="plugins/syo-timer/build/jquery.syotimer.min.js"></script>

    <!-- slick Carousel -->
    <script src="plugins/slick/slick.min.js"></script>
    <script src="plugins/slick/slick-animation.min.js"></script>

    <!-- Main Js File -->
    <script src="js/script.js"></script>
    <script src="js/script2.js"></script>

</body>
</html>