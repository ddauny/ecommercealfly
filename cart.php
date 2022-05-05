<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>DaShop - Carrello</title>
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

	<div class="hero-wrap hero-bread" style="background-image: url('images/bg_6.jpg');">
		<div class="container">
			<div class="row no-gutters slider-text align-items-center justify-content-center">
				<div class="col-md-9 ftco-animate text-center">
					<p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>Carrello</span></p>
					<h1 class="mb-0 bread">Carrello</h1>
				</div>
			</div>
		</div>
	</div>

	<section class="ftco-section ftco-cart">
		<div class="container">
			<div class="row">
				<div class="col-md-12 ftco-animate">
					<div class="cart-list">
						<table class="table">
							<thead class="thead-primary">
								<tr class="text-center">
									<th>&nbsp;</th>
									<th>&nbsp;</th>
									<th>Articolo</th>
									<th>Prezzo</th>
									<th>Quantità</th>
									<th>Totale</th>
								</tr>
							</thead>
							<tbody>
								<?php

								if (isset($_SESSION["idCarrello"])) {
							//	echo $_SESSION["idCarrello"];
									$sql = "select articoli.prezzo, contiene.quantita, articoli.nome, articoli.ID, articoli.descrizione, articoli.img from carrelli join contiene on carrelli.ID = contiene.IDCarrello join articoli on contiene.IDArticolo = articoli.ID where carrelli.ID = $_SESSION[idCarrello] ";
									$result = $conn->query($sql);
									$_SESSION["totale"] = 0;
									if ($result != null) { //se il carrello ha qualche articolo
										while ($row = $result->fetch_assoc()) {
											echo "<tr class='text-center'>";
											echo "<td class='product-remove'><a href='removeCart.php?id=$row[ID]&q=$row[quantita]'><span class='ion-ios-close'></span></a></td>";
											echo "<td class='image-prod'><div class='img' style='background-image:url($row[img]);'></div></td>";
											echo "<td class='product-name'><h3>$row[nome]</h3><p>$row[descrizione]</p></td><td class='price'>€$row[prezzo]</td>";
											echo "<td class='quantity'><p>$row[quantita]</p> </div></td><td class='total'>";
											$finale = $row["prezzo"] * $row["quantita"];
											$_SESSION["totale"] = $_SESSION["totale"] + $finale;
											echo "€" . $finale . '</td></tr>';
										}
									} else {
										echo "0";
									}
								}

								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="row justify-content-start">
				<div class="col col-lg-5 col-md-6 mt-5 cart-wrap ftco-animate">
					<div class="cart-total mb-3">
						<h3>Totale carrello</h3>
						<p class="d-flex">
							<span>Subtotale</span>
							<span>€<?php if(isset($_SESSION["totale"])) echo $_SESSION["totale"]; else echo "0"; ?></span>
						</p>
						<p class="d-flex">
							<span>Consegna</span>
							<span>€2.00</span>
						</p>
						<hr>
						<p class="d-flex total-price">
							<span>Total</span>
							<span>€<?php if(isset($_SESSION["totale"])) echo $_SESSION["totale"] + 2; else echo "0";?> </span>
						</p>
					</div>
					<p class="text-center"><a href="checkout.php" class="btn btn-primary py-3 px-4">Vai al pagamento</a></p>
				</div>
			</div>
		</div>
	</section>


	<?php include("footer.php"); ?>



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

	<script>
		$(document).ready(function() {

			var quantitiy = 0;
			$('.quantity-right-plus').click(function(e) {

				// Stop acting like a button
				e.preventDefault();
				// Get the field name
				var quantity = parseInt($('#quantity').val());

				// If is not undefined

				$('#quantity').val(quantity + 1);


				// Increment

			});

			$('.quantity-left-minus').click(function(e) {
				// Stop acting like a button
				e.preventDefault();
				// Get the field name
				var quantity = parseInt($('#quantity').val());

				// If is not undefined

				// Increment
				if (quantity > 0) {
					$('#quantity').val(quantity - 1);
				}
			});

		});
	</script>

</body>

</html>