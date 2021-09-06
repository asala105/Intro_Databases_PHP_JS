<?php 
include "php/connection.php";
$query = "Select * from types";
$stmt = $connection->prepare($query);
$stmt->execute();
$result = $stmt->get_result();
session_start();
?>

<!-- 
THEME: Aviato | E-commerce template
VERSION: 1.0.0
AUTHOR: Themefisher

HOMEPAGE: https://themefisher.com/products/aviato-e-commerce-template/
DEMO: https://demo.themefisher.com/aviato/
GITHUB: https://github.com/themefisher/Aviato-E-Commerce-Template/

WEBSITE: https://themefisher.com
TWITTER: https://twitter.com/themefisher
FACEBOOK: https://www.facebook.com/themefisher
-->


<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Basic Page Needs
  ================================================== -->
  <meta charset="utf-8">
  <title>Aviato | E-commerce template</title>

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

<section class="signin-page account">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <div class="block text-center">
          <a class="logo" href="home.php">
            <img src="images/logo.png" alt="">
          </a>
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
          <p class="mt-20"><a href="home.php">Return to Home Page</a></p>
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
						<a href="shop.html">SHOP</a>
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