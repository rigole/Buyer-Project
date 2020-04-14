<?php
require 'header2.php';
?>
<br><br><br>

<div class="container">
<form class="form-inline" method="post" action="search.php">
      <div class="form-group ">
      <input class="form-control" name="search" placeholder="Rechercher un medicament" type="text">
	  </div>
	  <button type="submit" name="search-submit" class="primary-btn add-to-cart">Rechercher</button>


</form>
</div>
			<div class="section">
		<!-- container -->
		<div class="container">
			<div class="row">

				<!-- section title -->
				
				<div class="col-md-12">
					<div class="section-title">
						<h2 class="title">Médicaments Disponibles</h2>
					</div>
				</div>
				<!-- section title -->

				<?php $products = $DB->query('SELECT * FROM products WHERE id BETWEEN 73 AND 112'); ?>
				<?php foreach ($products as $product) : ?>
				<div class="col-md-3 col-sm-6 col-xs-6">
					
					<div class="product product-single">
						<div class="product-thumb">
							
							<img src="./img/<?= $product->id; ?>.jpg" alt="">
						</div>
						<div class="product-body">
							<h3 class="product-price"><?= number_format($product->price,2,',',' ');  ?>€<del class="product-old-price"></del></h3>
							
							<h3 class="product-name"><?= $product->name ?></h3>
                            <h4 class="product-name"><?= $product->description ?></h4>
							<div class="product-btns">	
								<a  href="addpanier.php?id=<?=$product->id; ?>" class="addPanier" >	<button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Ajouter à la facture</button></a>
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
		</div>
		<!-- /container -->
	</div>
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