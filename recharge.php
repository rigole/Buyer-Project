<?php
require 'header2.php';
?>
<br><br><br><br><br><br><br>

<div class="section">
		<!-- container -->
		<div class="container">
			<div class="row">

				<div class="col-md-12">
					<div class="section-title">
						<h2 class="title">Selectionnez le montant</h2>
					</div>
				</div>
				<!-- section title -->

				<?php $products = $DB->query('SELECT * FROM products WHERE id BETWEEN 9 AND 29'); ?>
				<?php foreach ($products as $product) : ?>
				<div class="col-md-3 col-sm-6 col-xs-6">
					
					<div class="product product-single">
						<div class="product-thumb">
							
							
						</div>
						<div class="product-body">
							<h3 class="product-price"><?= number_format($product->price,2,',',' ');  ?>€<del class="product-old-price"></del></h3>
							
							<h2 class="product-name"><?= $product->name ?></h2>
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
<?php  require '../footer2.php'; ?>