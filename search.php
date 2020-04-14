<?php
require 'header2.php';
require 'db.php';
?>
<br><br><br>

<div class="section">
		<!-- container -->
		<div class="container">
			<div class="row">

				<!-- section title -->
				
				<div class="col-md-12">
					<div class="section-title">
						<h2 class="title"></h2>
					</div>
		   </div>
           <?php
              if (isset($_POST['search-submit'])) {
                $connect = mysqli_connect("localhost","root","","buyer");
                  $search = mysqli_real_escape_string($connect,$_POST['search']);
                  $sql= "SELECT * FROM products WHERE id BETWEEN 73 AND 98 AND (name LIKE '%$search%' OR description LIKE '%$search%')";
                  $result = mysqli_query($connect,$sql);
                  $queryResult = mysqli_num_rows($result);

                  if ($queryResult > 0) {
                     while ($row = mysqli_fetch_assoc($result)) {
                         echo " <div class='col-md-3 col-sm-6 col-xs-6'>
					
                         <div class='product product-single'>
                             <div class='product-thumb'>
                                 
                                 <img src='./img/ ".$row['id'].".jpg' alt=''>
                             </div>
                             <div class='product-body'>
                                 <h3 class='product-price'>".$row['price']."€<del class='product-old-price'></del></h3>
                                 
                                 <h3 class='product-name'> ".$row['name']." </h3>
                                 <h4 class='product-name'> ".$row['description']." </h4>
                                 <div class='product-btns'>	
                                     <a  href=addpanier.php?id=".$row['id']."  class='addPanier' >	<button class='primary-btn add-to-cart'><i class='fa fa-shopping-cart'></i> Ajouter à la facture</button></a>
                                 </div>
                             </div>
                         </div>
                     </div>";
                     }
                  } else {
                     echo'pas de rseultas';
                  }
                  
              } 
              

           ?>


        </div>
    </div>
</div>

</body>
	<!-- jQuery Plugins -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/slick.min.js"></script>
	<script src="js/nouislider.min.js"></script>
	<script src="js/jquery.zoom.min.js"></script>
	<script src="js/main2.js"></script>









<?php  require '../footer2.php'; ?>