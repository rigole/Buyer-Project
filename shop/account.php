<?php
require 'header2.php';
require_once 'db.php';
/*$_SESSION['access_token']=(string)$accessToken;
if ((!isset($_SESSION['name']) || ($_SESSION['access_token']))) {
     $_SESSION['flash']['danger'] = "Vou n'avez pas le droit d'acceder à cette page";
     header("Location: ../index.php");
     exit();
 }*/




$test = $_SESSION['id'];
//$users = require_once 'db.php';

function getUsersInfos($test){
	//require 'db.php';
	$userInfos = array();
	$connect = mysqli_connect("localhost","root","","buyer");
	$sql ="SELECT * FROM users WHERE id_user =" .$test ;
	$req = mysqli_query($connect, $sql); 
	if (!$sql) {
		printf("Error: %s\n", mysqli_error($connect));
		//exit();
	}
	while ($row = mysqli_fetch_array($req)) {
		$userInfos['name'] = $row['name'];
		$userInfos['email'] = $row['email'];
		$userInfos['phone_user']=$row['phone_user'];
		$userInfos['country_user']=$row['country_user'];
		$userInfos['city_user']=$row['city_user'];
		$userInfos['first_name_user']=$row['first_name_user'];
	
	}

return $userInfos;
}

if (isset($_POST['newName'])) {
	$newName = $_POST['newName'];
	$newLastname = $_POST['newLastname'];
	$newEmail = $_POST['newEmail'];
	$newPhone = $_POST['newPhone'];
	$newCountry = $_POST['newCountry'];
	$newCity = $_POST['newCity'];
	require_once 'db.php';
	$req = $pdo->prepare("SELECT email FROM users WHERE email = '$newEmail' ");
	$req->execute([$_POST['newEmail']]);
	$email = $req->fetch();
	if($email){
		//$errors['email']=$_SESSION['flash']['danger'];
		$_SESSION['flash']['danger'] = 'cet email est déjà utilisé pour un autre compte';
		
	  }else{

		$connect = mysqli_connect("localhost","root","","buyer");
		$sql = "UPDATE users SET name = '$newName', email='$newEmail', phone_user='$newPhone',country_user='$newCountry', city_user='$newCity', first_name_user ='$newLastname' WHERE id_user='$test' ";
		$res = mysqli_query($connect,$sql);
	  }
	
}
?>


<?php 
$userInfo = getUsersInfos($test);
//$usertransaction = getUsersTransactions($test);
?>


<div class="panel" style="  border-color:#13a456;" >
      <div class="panel-heading" style="background-color:#13a456;color:white;">MES INFORMATIONS</div>
        <div class="panel-body">
		<div class="table-responsive">
		  <table class="table table-hover">
          <thead>
           <tr>
             <th>Prenom</th>
             <th>Nom</th>
             <th>Email</th>
			 <th>Numero de téléphone</th>
			 <th>Pays de residence</th>
			 <th>Ville de residence</th>
            </tr>
        </thead>
		<tbody>
         <tr>
          <td> <?= $userInfo['name']; ?></td>
          <td><?= $userInfo['first_name_user']; ?></td>
          <td><?= $userInfo['email']; ?></td>
		  <td><?= $userInfo['phone_user']; ?></td>
		  <td><?= $userInfo['country_user']; ?><td>
		  <td><?= $userInfo['city_user']; ?></td>
         </tr>
		</tbody>
		
		<tr>
		</tr>
		<tr>
		<td><button class="primary-btn add-to-cart"  href="#update" data-toggle="modal">Modifier mes informations</button></td>
		<tr>
		
		</table>
		</div>
	  </div>
</div>



<div class="panel" style="border-color:#13a456;" >
      <div class="panel-heading"style="background-color:#13a456; color:white;">MES PAIEMENTS</div>
	  <div class="table-responsive">   
	  <div class="panel-body">       
	  <table class="table table-hover">
        
		
          <thead>
           <tr>
             <th>Nom du beneficiaire</th>
             <th>email du beneficiare</th>
             <th>ville </th>
		
			 <th>services </th>
			 <th>Montant</th>
			 <th>Numero du beneficiaire</th>
            </tr>
		</thead>
		<tbody>
		<?php
		
                            $services = $DB->query('SELECT order_adress.id_user,order_adress.firstname,order_adress.email,order_adress.city,order_adress.command,order_adress.amount,order_adress.numero,users.name from order_adress JOIN users ON order_adress.id_user=users.id_user where users.id_user = ' .$test);
                           
    
                          foreach ($services as $service):
                                          ?>
   
         
         <tr>
          <td> <?= $service->firstname ?></td>
          <td> <?= $service->email ?></td>
          <td> <?= $service->city ?></td>
		  <td> <?= $service->command ?></td>
		  <td><?= $service->amount ?> $<td>
		  <td><?= $service->numero ?></td>
         </tr>
		 <?php endforeach  ?>
		</tbody>
		
	  </div>
	  </table>
</div>
</div>
</div>


<div class="modal fade" id="update" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modifiez vos informations</h4>
        </div>
        <div class="modal-body">
		   <form method="POST">
		     <div class="form-group">
                 <label for="name">Votre nom:</label>
                 <input type="text" class="form-control" name="newName">
            </div>
			<div class="form-group">
                 <label for="name">Prenom:</label>
                 <input type="text" class="form-control" name="newLastname">
            </div>
			<div class="form-group">
                 <label for="email">Email :</label>
                 <input type="email" class="form-control"  name="newEmail">
            </div>
			<div class="form-group">
                 <label for="phone"> Votre Téléphone:</label>
                 <input type="text" class="form-control" name="newPhone">
            </div>
			<div class="form-group">
                 <label for="country">Pays de résidence:</label>
                 <input type="text" class="form-control" name="newCountry">
            </div>
			<div class="form-group">
                 <label for="city">ville de résidence:</label>
                 <input type="text" class="form-control" name="newCity">
            </div>
			<button type="submit" class="primary-btn add-to-cart">Enregister les modifications</button>
		
		   </form>
		  
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">fermer</button>
        </div>
      </div>
      
    </div>
  </div>
<?php  require '../footer2.php'; ?>

