

<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- section-title -->
				<div class="col-md-12">
					<div class="section-title">
				
						<div class="pull-right">
							<div class="product-slick-dots-1 custom-dots"></div>
						</div>
					</div>
				</div>
				<!-- /section-title -->

				<!-- banner -->
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="banner banner">
						<img src="./img/banner14.jpg" alt="">
						<div class="banner-caption">
							<h2 class="white-color">NEW<br>COLLECTION</h2>
							<button class="primary-btn">Shop Now</button>
						</div>
					</div>
				</div>
				<!-- /banner -->

				<!-- Product Slick -->
				<div class="col-md-9 col-sm-6 col-xs-6">
					<div class="row">
						<div  id="product-slick-1" class="product-slick">
							<!-- Product Single -->
							  <?php $products = $DB->query('SELECT * FROM products'); ?>
							  <?php foreach ($products as $product) : ?> 
								  <div  class="product product-single">
								  <div style="background:black;" class="product-thumb">
									  <div class="product-label">
										
									  </div>
									  
									  
									  <img src="./img/<?= $product->id; ?>.jpg" alt="">
								  </div>
								  <div  class="product-body">
									  <h3 class="product-price"><?= number_format($product->price,2,',',' ');  ?>€<del class="product-old-price"></del></h3>
									  <div class="product-rating">
										  <i class="fa fa-star"></i>
										  <i class="fa fa-star"></i>
										  <i class="fa fa-star"></i>
										  <i class="fa fa-star"></i>
										  <i class="fa fa-star-o empty"></i>
									  </div>
									  <h2  class=""><a href="#"><?= $product->name ?></a></h2>
									  <div class="product-btns">
										  <button class="main-btn icon-btn"><i class="fa fa-hear"></i></button>
										  <button class="main-btn icon-btn"><i class="fa fa-exchang"></i></button>
										<a  href="addpanier.php?id=<?=$product->id; ?>" class="addPanier" > <button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Ajouter au panier</button></a>
									  </div>
								  </div>
							  </div>
							  <?php endforeach  ?>
							
							<!-- /Product Single -->

							<!-- Product Single -->
							
							<!-- /Product Single -->
						</div>
					</div>
				</div>
				<!-- /Product Slick -->
			</div>
			</div>
