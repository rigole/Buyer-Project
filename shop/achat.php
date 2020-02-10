<?php require 'header2.php';?>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>FlashPay</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Hind:400,700" rel="stylesheet">
	<link href="../img/favicon.ico" rel="icon">
  <link href="../img/apple-touch-icon.png" rel="apple-touch-icon">
	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

	<!-- Slick -->
	<link type="text/css" rel="stylesheet" href="css/slick.css" />
	<link type="text/css" rel="stylesheet" href="css/slick-theme.css" />

	<!-- nouislider -->
	<link type="text/css" rel="stylesheet" href="css/nouislider.min.css" />

	<!-- Font Awesome Icon -->
	<link rel="stylesheet" href="css/font-awesome.min.css">

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="css/style.css" />
	
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

</head>

<body style=" background-size: cover;">
<br><br><br><br><br><br><br>
	
	
	<!--<div class="section">
		
	
	<!-- /section -->

	<!-- section -->
	
	<!-- /section -->

	<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			
			<!-- /row -->

			<!-- row -->
			
			<div class="row">

				<!-- section title -->
				
				<div class="col-md-12">
					<div class="section-title">
						<h2 class="title">Déja Payable</h2>
					</div>
				</div>
				<!-- section title -->

				<?php $products = $DB->query('SELECT * FROM products'); ?>
				<?php foreach ($products as $product) : ?>
				<div class="col-md-3 col-sm-6 col-xs-6">
					
					<div class="product product-single">
						<div class="product-thumb">
							<img src="./img/<?= $product->id; ?>.jpg" alt="">
						</div>
						<div class="product-body">
							<h3 class="product-price"><?= number_format($product->price,2,',',' ');  ?>€<del class="product-old-price"></del></h3>
							
							<h2 class="product-name"><?= $product->name ?></h2>
							<div class="product-btns">
								<a  href="addpanier.php?id=<?=$product->id; ?>" class="addPanier" >	<button id="basket" onclick="changeBackground();" class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Ajouter au Panier</button></a>
							</div>
						</div>
					</div>
				</div>
				<?php endforeach  ?>
				<!-- /Product Single -->

				<!-- Product Single -->
				
				
			</div>
			<!-- /row -->
			
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->


	<!-- jQuery Plugins -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/slick.min.js"></script>
	<script src="js/nouislider.min.js"></script>
	<script src="js/jquery.zoom.min.js"></script>
	<script src="js/main2.js"></script>

</body>
<?php  require '../footer2.php'; ?>

