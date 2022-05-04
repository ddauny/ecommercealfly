<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>DaShop</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

	<link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
	<link rel="stylesheet" href="css/animate.css">

	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">
	<link rel="stylesheet" href="css/magnific-popup.css">

	<link rel="stylesheet" href="css/aos.css">

	<link rel="stylesheet" href="css/ionicons.min.css">

	<link rel="stylesheet" href="css/bootstrap-datepicker.css">
	<link rel="stylesheet" href="css/jquery.timepicker.css">


	<link rel="stylesheet" href="css/flaticon.css">
	<link rel="stylesheet" href="css/icomoon.css">
	<link rel="stylesheet" href="css/style.css">
</head>

<body class="goto-here">
	<div class="py-1 bg-black">
		<div class="container">
			<div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
				<div class="col-lg-12 d-block">
					<div class="row d-flex">
						<div class="col-md pr-4 d-flex topper align-items-center">
							<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
							<span class="text">+39 3334567890</span>
						</div>
						<div class="col-md pr-4 d-flex topper align-items-center">
							<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
							<span class="text">iania_daniele@ismonnet.onmicrosoft.com</span>
						</div>
						<div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right">
							<span class="text">3-5 Business days delivery &amp; Free Returns</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
		<div class="container">
			<a class="navbar-brand" href="index.php">DaShop</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="oi oi-menu"></span> Menu
			</button>

			<div class="collapse navbar-collapse" id="ftco-nav">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>

					<li class="nav-item"><a href="contact.html" class="nav-link">Contatti</a></li>
					<?php if (!isset($_SESSION["id"])) echo "<li class='nav-item'><a href='login.php' class='nav-link'>Login</a></li>";
					else echo "<li class='nav-item'><a href='logout.php' class='nav-link'>Logout</a></li>"; ?>
					<?php if (isset($_SESSION["admin"]) && $_SESSION["admin"] == 1) echo "<li class='nav-item'><a href='addArticolo.php' class='nav-link'>Aggiungi</a></li>"; ?>
					<li class="nav-item cta cta-colored"><a href="cart.php" class="nav-link"><span class="icon-shopping_cart"></span>[<?php
																																		include("connection.php");
																																		if (isset($_SESSION["idCarrello"])) {
																																			$sql = "select count(*) from contiene where IDCarrello = $_SESSION[idCarrello]";
																																			$result = $conn->query($sql);
																																			if ($result != null) {
																																				$row = $result->fetch_assoc();
																																				echo $row["count(*)"];
																																			} else {
																																				echo "0";
																																			}
																																		} else echo "0";
																																		?>]</a></li>
					<li class="nav-item"><a href='#' class='nav-link'>Benvenuto <?php if (isset($_SESSION["name"]) && $_SESSION["name"] != "") echo $_SESSION["name"]; ?></a></li>
				</ul>
			</div>
		</div>
	</nav>
	<!-- END nav -->

	<section id="home-section" class="hero">
		<div class="home-slider owl-carousel">
			<div class="slider-item js-fullheight">
				<div class="overlay"></div>
				<div class="container-fluid p-0">
					<div class="row d-md-flex no-gutters slider-text align-items-center justify-content-end" data-scrollax-parent="true">
						<img class="one-third order-md-last img-fluid" src="images/bg_1.png" alt="">
						<div class="one-forth d-flex align-items-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
							<div class="text">
								<span class="subheading">#New Arrival</span>
								<div class="horizontal">
									<h1 class="mb-4 mt-3">Shoes Collection 2019</h1>
									<p class="mb-4">A small river named Duden flows by their place and supplies it with
										the necessary regelialia. It is a paradisematic country.</p>

									<p><a href="#" class="btn-custom">Discover Now</a></p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="slider-item js-fullheight">
				<div class="overlay"></div>
				<div class="container-fluid p-0">
					<div class="row d-flex no-gutters slider-text align-items-center justify-content-end" data-scrollax-parent="true">
						<img class="one-third order-md-last img-fluid" src="images/bg_2.png" alt="">
						<div class="one-forth d-flex align-items-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
							<div class="text">
								<span class="subheading">#New Arrival</span>
								<div class="horizontal">
									<h1 class="mb-4 mt-3">New Shoes Winter Collection</h1>
									<p class="mb-4">A small river named Duden flows by their place and supplies it with
										the necessary regelialia. It is a paradisematic country.</p>

									<p><a href="#" class="btn-custom">Discover Now</a></p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>



	<section class="ftco-section bg-light">
		<div class="container">
			<div class="row justify-content-center mb-3 pb-3">
				<div class="col-md-12 heading-section text-center ftco-animate">
					<h2 class="mb-4">I Prodotti</h2>
					<p>I migliori prezzi per ogni nostro cliente</p>
				</div>
			</div>
		</div>




		<div class="container">
			<div class="row">
				<?php
				include("connection.php");
				if (isset($_GET["msg"])) echo $_GET["msg"];
				$sql = "select articoli.ID, nome, prezzo, descrizione, img, tipo from articoli join categorie on articoli.IDCategoria = categorie.ID where 1";
				$result = mysqli_query($conn, $sql);
				if ($result->num_rows > 0) {
					while ($row = $result->fetch_assoc()) {
						echo "<div class='col-sm-12 col-md-6 col-lg-3 ftco-animate d-flex'>";
						echo "<div class='product d-flex flex-column'>";
						echo "<a href='product-single.php?id=$row[ID]' class='img-prod'><img class='img-fluid' src='$row[img]' alt='Colorlib Template'>"; //ID in conflitto con quello della categoria
						echo "<div class='overlay'></div></a>";
						echo "<div class='text py-3 pb-4 px-3'><div class='d-flex'><div class='cat'>";
						echo "<span>$row[tipo]</span></div></div>"; //categoria
						echo "<h3><a href='#'>$row[nome]</a></h3>"; //nome
						echo "<div class='pricing'><p class='price'><span>€$row[prezzo]</span></p></div>"; //prezzo
						echo "<p class='bottom-area d-flex px-3'><a href='addCart.php?id=$row[ID]&q=1' class='add-to-cart text-center py-2 mr-1'><span>Aggiungi al carrello<i class='ion-ios-add ml-1'></i></span></a></p>";
						if(isset($_SESSION["admin"]) && $_SESSION["admin"] == 1) echo "<p class=''><a href='deleteArticolo.php?id=$row[ID]' class=' text-center py-2 mr-1'><span>Elimina articolo<i class=' ml-1'></i></span></a></p>";
						echo "</div></div></div>";
					}
				} else {
					//	echo "<script>window.location.replace('loadArticoli.php?msg=Errore durante il carimento degli articoli')</script>";

				}
				?>
				<script>
					function add(id) {
						window.location.replace("addCart.php?id=" + id + "&q=1");
					}
				</script>

				<!-- <div class="col-sm-12 col-md-6 col-lg-3 ftco-animate d-flex">
					<div class="product d-flex flex-column">
						<a href="#" class="img-prod"><img class="img-fluid" src="images/product-1.png"
								alt="Colorlib Template">
							<div class="overlay"></div>
						</a>
						<div class="text py-3 pb-4 px-3">
							<div class="d-flex">
								<div class="cat">
									<span>Lifestyle</span>
								</div>
							</div>
							<h3><a href="#">Nike Free RN 2019 iD</a></h3>
							<div class="pricing">
								<p class="price"><span>$120.00</span></p>
							</div>
							<p class="bottom-area d-flex px-3">
								<a href="#" class="add-to-cart text-center py-2 mr-1"><span>Add to cart <i
											class="ion-ios-add ml-1"></i></span></a>
							</p>
						</div>
					</div>
				</div> -->
			</div>
		</div>
	</section>


	<footer class="ftco-footer ftco-section">
		<div class="container">
			<div class="row">
				<div class="mouse">
					<a href="#" class="mouse-icon">
						<div class="mouse-wheel"><span class="ion-ios-arrow-up"></span></div>
					</a>
				</div>
			</div>
			<div class="row mb-5">
				<div class="col-md">
					<div class="ftco-footer-widget mb-4">
						<h2 class="ftco-heading-2">DaShop</h2>
						<p>fwhbiufcbwiyub vcwbcviuwbcvuiwbcviuwbviy wvwyvbui</p>
						<ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
							<li class="ftco-animate"><a href="https://twitter.com/barackobama"><span class="icon-twitter"></span></a></li>
							<li class="ftco-animate"><a href="https://www.facebook.com/BillGates"><span class="icon-facebook"></span></a></li>
							<li class="ftco-animate"><a href="https://www.instagram.com/elonmusk/"><span class="icon-instagram"></span></a></li>
						</ul>
					</div>
				</div>
				<div class="col-md">
					<div class="ftco-footer-widget mb-4 ml-md-5">
						<h2 class="ftco-heading-2">Menu</h2>
						<ul class="list-unstyled">
							<li><a href="contact.html" class="py-2 d-block">Contattaci</a></li>
						</ul>
					</div>
				</div>
				<div class="col-md-4">
					<div class="ftco-footer-widget mb-4">
						<h2 class="ftco-heading-2">Help</h2>
						<div class="d-flex">
							<ul class="list-unstyled mr-l-5 pr-l-3 mr-4">
								<li><a href="#" class="py-2 d-block">Shipping Information</a></li>
								<li><a href="#" class="py-2 d-block">Returns &amp; Exchange</a></li>
								<li><a href="#" class="py-2 d-block">Terms &amp; Conditions</a></li>
								<li><a href="#" class="py-2 d-block">Privacy Policy</a></li>
							</ul>
							<ul class="list-unstyled">
								<li><a href="#" class="py-2 d-block">FAQs</a></li>
								<li><a href="#" class="py-2 d-block">Contact</a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-md">
					<div class="ftco-footer-widget mb-4">
						<h2 class="ftco-heading-2">Hai domande?</h2>
						<div class="block-23 mb-3">
							<ul>
								<li><span class="icon icon-map-marker"></span><span class="text">Via Santa Caterina da Siena, 3, 22066 Mariano Comense CO</span></li>
								<li><a href="#"><span class="icon icon-phone"></span><span class="text">+39 3334567890</span></a></li>
								<li><a href="#"><span class="icon icon-envelope"></span><span class="text"> iania_daniele@ismonnet.onmicrosoft.com</span></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 text-center">

					<p>
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						Copyright &copy;
						<script>
							document.write(new Date().getFullYear());
						</script> All rights reserved | This template
						is made with <i class="icon-heart color-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
					</p>
				</div>
			</div>
		</div>
	</footer>



	<!-- loader -->
	<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
			<circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
			<circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
		</svg></div>


	<script src="js/jquery.min.js"></script>
	<script src="js/jquery-migrate-3.0.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.easing.1.3.js"></script>
	<script src="js/jquery.waypoints.min.js"></script>
	<script src="js/jquery.stellar.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/aos.js"></script>
	<script src="js/jquery.animateNumber.min.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/scrollax.min.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
	<script src="js/google-map.js"></script>
	<script src="js/main.js"></script>

</body>

</html>