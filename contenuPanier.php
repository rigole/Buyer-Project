<?php
require_once 'db.php';
require 'header2.php';

?>

<script src="https://www.paypal.com/sdk/js?client-id=AfEa1JCw53vgxI8SsmiqCn8WpyZyaEyt3R8ueGkxsI2RSsxcdcacEgGUDV0_oGqYn-PpJ02l0hJJ0WLi"></script>
<br><br><br><br><br><br><br>
<!--div  class="collapse"  id="paymen_form">
   <form action="payment.php" id="payment_form"  method="post">
   <div class="form-group">
    <label for="email">Votre nom:</label>
    <input type="text" class="form-control" name="name" required="required" >
   </div>
   <div class="form-group">
    <label for="pwd">Email:</label>
    <input type="email" class="form-control" name="email" required="required" value="placide@gmail.com">
   </div>
   <div class="form-group">
    <label for="pwd">Nom Du bénéficiaire:</label>
    <input type="text" class="form-control" name="beneficiaire" required="required" value="placide">
   </div>
   <div class="form-group">
    <label for="pwd">Votre code de Carte Bleue:</label>
    <input type="text" class="form-control" name="checking" required="required" data-stripe="number" value="4242 4242 4242 4242">
   </div>
   <div class="form-group">
    <label for="pwd">Mois:</label>
    <input type="text" class="form-control" name="month" required="required" data-stripe="exp_month" value="10">
   </div>
   <div class="form-group">
     <label for="pwd">Année:</label>
    <input type="text" class="form-control" name="yaer" required="required" data-stripe="exp_year" value="19">
   </div>
   <div class="form-group">
    <label for="pwd">Code de Verification:</label>
    <input type="text" class="form-control" name="cvc" required="required" data-stripe="cvc" value="123">
  </div>
  <div class="text-center"><button  class="button btn btn-primary" type="submit">Payer</button></div>
</form> -->
<div class="container">
  <h2>Ma Facture</h2>
     <form method="post"   action="contenuPanier.php">                                          
         <div class="table-responsive">          
           <table  class="table">
               <thead>
              
                  <tr>
                   <th></th>
                   <th>Produits</th>
                   <th>Prix</th>
                   <th>Quantité</th>
                   <th></th>
                   <th>Actions</th>
                   </tr>
                </thead>
                <?php
                  $ids = array_keys($_SESSION['panier']);
                    if (empty($ids)) {
                         $products = array();
                    }else {
                            $products = $DB->query('SELECT * FROM products WHERE id IN ('.implode(',',$ids).')');
                           }
    
                          foreach ($products as $product):
                                          ?>
   
                        <tbody>
                           <tr>
                              <td><img style="width=220px; height:50px;" src="img/<?= $product->id; ?>.jpg" alt=""></td>
                               <td id="nomProduit"><?= $product->name ?></td>
                               <td><?= number_format($product->price,2,',',' ');  ?>€</td>
                               <td><input type="text" name="panier[quantity][<?= $product->id; ?>]" value="<?= $_SESSION['panier'][$product->id]; ?>" width ="30"></td>
                               <td></td>
                               <td><a href="contenuPanier.php?delPanier=<?= $product->id; ?>" ><img style="" src="img/trash.png" alt=""></a></td>
                         </tr>
           
                         <?php endforeach  ?>
                       
                        </tbody>
                         
                    <tfoot>
    
                      <tr class=" ">
                      <td>Frais de paiement</td>
                      <td rowspan=""> <span></span></td>
                      <td rowspan=""> <span></span></td>
                      <td rowspan="12">  <span></span></td>
                      <td rowspan="12">  4€<span></span></td> 
                      <td><button type="submit">Recalculer</button> </td>
                  
                    </tr>
                       <tr class="success">
                       <td colspan=""></td>
                       <td style="font-weight:bold; font-size:20px;" rowspan=""> Grand Total <span></span></td>
                       <td style="font-weight:bold; font-size:20px;" rowspan="">  <span ><?= number_format($panier->total(),2,',',' '); ?>€</span></td>
                  </tr>
                        </tfoot>
                   
          </table>
          
  </form>
  <br><br>
  
   </div>
   
   <h2>Choisissez votre methode de paiement</h2>
   <button  class="button btn btn-primary" data-toggle="collapse" style="width:300px;"   data-target="#vire" >Virement Bancaire</button><br><br>
   <button  class="button btn btn-primary" data-toggle="collapse" style="width:300px;"  data-target="#paymen_form" >Carte de crédit</button><br> <br>
   <button  class="btn btn-primary" data-toggle="collapse"  data-target="#paypal" style="width:300px;">compte Paypal</button><br> <br>
   
   <div id="paypal" class="collapse">
   <?php if (isset($_SESSION['name'])): ?> 
     <div class="step-one">
				<h2 class="heading">Etape 1</h2>
			</div>

			<div class="register-req">
				<p>Veuillez nous fournir les informations du bénéficiaire</p>
			</div><!--/register-req-->

			<div class="shopper-informations">
				<div class="row">
					<div class="col-sm-12">
					</div>
				 	<div class="col-md-12 ">
						<div class="bill-to">
							<p></p>
							
								<form name="form1" id="typeFormulaire" action="" method="post" >
                  <div class="form-group">
									<input type="text" class="form-control" placeholder="Nom Complet" value="placide" name="firstname" required pattern="[A-Za-z]+" title="please enter valid firstname[a-z only]">
                
                  </div>
                  <div class="form-group">
									<input type="text" class="form-control" placeholder="Email"  name="email"  value="placide@gmail.com" required ="required" title="please enter valid email address" >
                  </div>
                  <div class="form-group">
									<input type="text" class="form-control" placeholder="Ville" name="city" value="placide" required pattern="[A-Za-z]+" title="please enter valid city name[a-z only]" >
                  </div>
                  <div class="form-group">
								   	<input type="text" class="form-control" placeholder="Pincode si vous avez un code de reduction" name="pincode" value="123456" required pattern="[0-9]{6}" title="please enter valid pincode[0-9 and 6 digit only]" >
                  </div>
                 
                   
                  <?php
                  $ids = array_keys($_SESSION['panier']);
                    if (empty($ids)) {
                         $products = array();
                    }else {
                            $products = $DB->query('SELECT * FROM products WHERE id IN ('.implode(',',$ids).')');
                           }
    
                          
                                          ?>

                  <div  class="form-group">
                        
                        <ul   class="list-group">
                        <textarea id ="finalcommand" class="form-control" style="display: none;  "  name="command" rows="5" placeholder="Message">
                        <?php foreach ($products as $product): ?>
                          <?= $product->name ?><?=$_SESSION['panier'][$product->id]; ?>
                          <?php endforeach  ?>
                          </textarea>
                        </ul>
                      
                 </div>
                 </div>
                   <div  class="form-group">
									<input type="text" class="form-control" id="total" value="<?=number_format($panier->total() + 4,2,'.',' ');  ?>" name="amount">
                  </div>
                  <div class="form-group">
									<input type="text" class="form-control" placeholder="" required="required" value="1254564jhgf2" name="numero">
                  </div>
                  
									<input type="submit" name="submit1" value="save" >
						     </form>
                 <div class="step-one">
				               <h2 class="heading">Etape 2</h2>
		            	</div>

                  <div class="register-req">
				<p>Veuillez choisir votre methode de paiement</p>
			</div>
                 <div id="paypal-button-container"></div>

                 <?php else :?>
                 <div class="alert alert-danger">
                 Vous devez vous <a data-toggle="modal" href="#connexion">connecter</a> pour continuer. Si vous n'avez pas de compte <a data-toggle="modal" href="#inscrire">Inscrivez vous</a>
                 </div> 
              
                 <?php endif;?>
              </div>

						</div>
					</div>

				</div>
			</div>

    </div>
   </div>

   
    

			<?php
			if(isset($_POST["submit1"]))
			{
      
				//$link=mysqli_connect("localhost","root","");
			//	mysqli_select_db($link,"buyer");
			//	mysqli_query($link,"INSERT into order_adress values('','$_POST[firstname]','$_POST[lastname]','$_POST[email]','$_POST[city]','$_POST[pincode]','$_POST[cno],'$_POST[nomProduit],$_POST[qty]',$_POST[montant])");
      
				/*$res=mysqli_query($link,"select order_address_id from order_address order by order_address_id desc limit 1");
				while($row=mysqli_fetch_array($res))
				{
					$_SESSION["order_id"]=$row["id"];
        }*/
        try {
          if(!empty($_POST['firstname'])){ 
            $req = $pdo-> prepare(" INSERT into order_adress SET firstname = ? , email = ? , city = ? , pincode = ?, command = ? , amount = ?, numero= ?,id_user = ?");
            $req->execute([$_POST['firstname'],$_POST['email'],$_POST['city'],$_POST['pincode'],$_POST['command'],$_POST['amount'],$_POST['numero'],$_SESSION['id']]);
          }
        } catch (PDOException $e) {
          print $e->getMessage();
        }
      }
        
				?>









<script>
 var PAYPAL_CLIENT = 'AfEa1JCw53vgxI8SsmiqCn8WpyZyaEyt3R8ueGkxsI2RSsxcdcacEgGUDV0_oGqYn-PpJ02l0hJJ0WLi';
  var PAYPAL_SECRET = 'EO0xjd0Np0wU6ah21GSnc2lVbeDcQ0h7FniAakh8OZDxwQEX-YGhTpY3LB_TIZSbDWpZ6O4DbWPP6J8l';
  var PAYPAL_ORDER_API = 'https://api.paypal.com/v2/checkout/orders/';
var total = document.getElementById('total').value;
//alert(total);
paypal.Buttons({   
  //var total = document.getElementById('total').value;
  createOrder:function (data,actions) {
    return actions.order.create({
        purchase_units: [{

          amount: {
            value : document.getElementById('total').value
          }
        }]



    });
    
  },
  onApprove: function (data, actions) {
    return actions.order.capture().then(function (details) {
      alert('Transaction completed by ' + details.payer.name.given_name);
      return fetch('/paypal-transaction-complete', {
         method: 'post',
         headers:{
           'content-type':'application/json'
         },

        body: JSON.stringify({
          orderID:data.orderID
        })

      });
    });
  }




}).render('#paypal-button-container');
</script>

  
     
</div>

<?php require '../footer2.php'; ?>