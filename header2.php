<?php 
session_start();
require  'vendor/autoload.php';
//use  FacebookRedirectLoginhelper;

/*$appSecret = 'b3b2e1b0a05abfe3cc06c3b157ac13d9' ;
 $appId= '256593521978349';
 $helper = new FacebookRedirectLoginHelper('http://localhost/Buyer/shop/achat.php');*/

 $fb = new Facebook\Facebook([

'app_id' => '256593521978349',
'app_secret' => 'b3b2e1b0a05abfe3cc06c3b157ac13d9',
'default_graph_version'=> 'v2.10'



 ]);
 $helper = $fb->getRedirectLoginHelper();
 $login_url = $helper->getLoginUrl("http://localhost/Buyer/shop/facebookRedirect.php");

 try {
	 $accessToken = $helper->getAccessToken();
	 if(isset($accessToken)){
		$_SESSION['access_token']=(string)$accessToken;
		$_SESSION['flash']['success'] = 'vous êtes maintenant connectés';
	     //echo $_SESSION['name'];
	}
	 
 } catch (Exception $th) {
	 echo $th->getTraceAsString();
 }

 if (isset($_SESSION['access_token'])) {
	require 'db.php';
	 try {
	  
	  $fb->setDefaultAccessToken($_SESSION['access_token']);
	  $res = $fb->get('/me?locale=en_US&fields=name,email');
	  $user=$res->getGraphUser();
	  $name=$user->getField('name');
	  $emailFacebook= $user->getField('email');
	  $name2=$user->getFirstName();
	  $emailFacebook2= $user->getEmail();


	  $_SESSION['name']=$name; 
	  
	  $sql = "INSERT INTO users(name,email) Values('$name2', '$emailFacebook2')";
	 // $result = mysql_query($req);
	 
	 } catch (Exception $th) {
		echo $th->getTraceAsString();
	 }
 }

if(!empty($_POST['mail'])){
	require_once 'db.php';
	$req = $pdo->prepare("INSERT INTO newsletter SET email = ?");
	$req ->execute([$_POST['mail']]);
}
  if (!empty($_POST['email2'])) {
	//$name=$_POST['email2'];
	require_once 'db.php';
	$req = $pdo->prepare('SELECT * FROM users WHERE email = ?');
	$req ->execute( [$_POST['email2']]);
	$email = $req->fetch();

	if (password_verify($_POST['password2'],$email->password)) {
		$_SESSION['name'] = $email->name;
		$_SESSION['id'] = $email->id_user;
		//exit();
	}else {
		$_SESSION['flash']['danger'] = 'Email ou mot de passe Incorrect';
	}
	  
  }

  if(!empty($_POST['name'])){
	require_once 'db.php';
	$req = $pdo->prepare("INSERT INTO contact SET Nom = ?,  email = ?,  objet= ?, message= ? ");
	$req ->execute([$_POST['name'], $_POST['email'],$_POST['subject'],$_POST['message']]);
}
   if (!empty($_POST['nom'])) {
     $name=$_POST['nom'];
	require_once 'db.php';
	if ($_POST['password'] != $_POST['checking'])
	{
		$_SESSION['flash']['danger'] = 'Les mots de passe ne sont pas identiques';
	}
	else{ 

	  $req = $pdo->prepare('SELECT id_user,name,email FROM users WHERE email = ?');
	  $req->execute([$_POST['email']]);
	  $email = $req->fetch();
     
	 
	  if($email){
		//$errors['email']=$_SESSION['flash']['danger'];
		$_SESSION['flash']['danger'] = 'cet email est déjà utilisé pour un autre compte';
		
	  }
	  else {
	  $req = $pdo->prepare("INSERT INTO users SET name = ?, email = ?,  password= ?  ");
	  $password = password_hash($_POST['password'],PASSWORD_BCRYPT);
	  $req->execute([$_POST['nom'], $_POST['email'],$password]);
	  $_SESSION['name']=$name;
	 $_SESSION['id'] =$pdo->lastInsertId();
	 // exit();
	  //session_start();
	  //$email=$_SESSION['name'] ;
	   $_SESSION['flash']['success'] = 'vous êtes maintenant connectés';
	  }
    }
	
	  
	  
	  //mail($_POST['email'], 'confirmation de compte', "Cliquer sur ce lien afin de valider de valider votre Compte\n\nhttp://localhost/Buyer/shop/confirm.php?id_user=$id_user&token=$token");
	 // $_SESSION['name'] = $email; 
	 
	 // header('Location: account.php');
	  //exit();  
	}

require_once 'header.php';
?>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>FlashPayers: Parce que la distance n'est qu'un chiffre</title>
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	
	
	
	
	
	
	<!-- Google font -->
	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

	<!-- Slick -->
	<link type="text/css" rel="stylesheet" href="css/slick.css" />
	<link type="text/css" rel="stylesheet" href="css/slick-theme.css" />

	<!-- nouislider -->
	<link type="text/css" rel="stylesheet" href="css/nouislider.min.css" />

	
	<link href="https://fonts.googleapis.com/css?family=Hind:400,700" rel="stylesheet">
	<link href="../img/favicon.ico" rel="icon">
  <link href="../img/apple-touch-icon.png" rel="apple-touch-icon">
	<!-- Bootstrap -->
	
	<!-- Font Awesome Icon -->
	<link rel="stylesheet" href="css/font-awesome.min.css">

	<!-- Custom stlylesheet -->

	
	<link type="text/css" rel="stylesheet" href="../css/style.css" />
	<link type="text/css" rel="stylesheet" href="css/style.css" />
	<link rel="stylesheet" href="css/toastr.min.css">
	<link rel="stylesheet" href="css/toastr.css">
	
	
	
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	
	
		<style>
	
	.primary-btn{
		color: #30323A;
		background-color: #f9c051;
		border-radius: 16px; 
		
	}
	</style>
	
	

</head>


 


 	<div class="navbar  navbar-inverse" style=" background: rgba(0, 0, 0, 0.9);" id="header">
  		  <nav>
     		 	<div class="container-fluid">
					<div class="navbar-header">
     				 	<button type="button"  id="droptoggle" style="color:#ffff;" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
     		 		 	 <span class="icon-bar"></span>
     		 		  	<span class="icon-bar"></span>
     		 		 	 <span class="icon-bar"></span>                        
    		 			 </button>
    			 		 <a class="navbar-brand" href=""><h3><img id="" src="../img/logoBuyer2.png" style="padding-right: " alt="" title="" /><span style="color:#ffff; font-weight:bold;  padding-left: 10px;">FlashPayers <span></h3></a>
    				</div>
   					 <div  class="collapse navbar-collapse" id="myNavbar">
    					   
      						  	   <ul id="basket" class="nav navbar-nav navbar-right"> 
									   <?php if((isset($_SESSION['name'])) || isset($_SESSION['access_token'])) : ?> 
										   <li class="dropdown" >
										       <a class="dropdown-toggle" data-toggle="dropdown"  style="color:rgb(249,192,81);" href="#">Bonjour <?=  $_SESSION['name']; ?> <span class="caret"></span></a>
										       <ul class="dropdown-menu">
                                                <li><a href="#">Mes Paiements</a></li>
												<li><a href="logout.php">Deconnexion</a></li>
                                                 </ul>
											</li>
											<li><a href="account.php" style="color:rgb(249,192,81); font-weight:bolder;" >Mon Compte</a></li> 
										<?php else :?>						   
											<li><a  data-toggle="modal" style="color:rgb(249,192,81);" href="#connexion"> <span class="glyphicon glyphicon-log-in"></span>   Connexion</a></li>	    
											<li><a style="color:rgb(249,192,81); font-weight:bolder;" href="#inscrire" data-toggle="modal" ><span class="glyphicon glyphicon-user"></span> S'inscrire</a></li>			
										<?php endif;?>
						   			  	  <li class="">
											 	<span class="">
												 <a href="contenuPanier.php"><img src="img/bill.png"/><span id="count" class="qty"><?= $panier->count();?></span></a>
									 		   	</span>
											
											<!--<strong class="text-uppercase">Mon panier:</strong><br><span id="total"></*?= number_format($panier->total(),2,',',' '); ?>€</span>-->
										</li>
										
										
     				 		 		</ul>
    							</div>
 				 			</div>
			</nav>
		</div>

	</div>
	<!-- HEADER -->

	<br><br><br><br><br><br><br>

 <div  id="inscrire" class="modal fade" role="dialog">
   <div class="modal-dialog modal-lg">

<!-- Modal content-->
<div class="modal-content">
  <div class="modal-header">
	<button type="button" class="close" data-dismiss="modal">&times;</button>
	<h4 class="modal-title">Flashpayer</h4>
  </div>
  <div class="modal-body">
   <form action=""  method="post">
		   <div class="form-group">
				<label class="control-label col-sm-2" >Votre nom:</label>
				   <div class="col-sm-10">
						<input type="text" class="form-control" required="required" name="nom"  >
				 </div>
		  </div>
		  <br><br><br><br>
		  <div class="form-group">
			<label class="control-label col-sm-2" >Email:</label>
				  <div class="col-sm-10">
					  <input type="email" class="form-control" required="required" name="email" >
				</div>
		  </div>
		  <br><br><br><br>
		  <div class="form-group">
				<label class="control-label col-sm-2" >Mot De Passe:</label>
					<div class="col-sm-10">
						<input type="password" class="form-control" name="password" required="required"  >
					</div>
		  </div>
		  <br><br><br><br>
		  <div class="form-group">
				<label class="control-label col-sm-2" >Confirmez votre Mot de passe</label>
				<div class="col-sm-10">
				<input type="password" class="form-control"  required="required" name="checking" >
			  </div>
		  </div>
		  <br><br><br><br>
		  <div class=" text-center">
		 <button class="button btn btn-primary" style="width:200px;" type="submit">Inscription</button><br><br><br><p>OU</p>
	

  
		 </div>
	</form>
	<a href="<?php echo  $login_url;?>"><Button class="primary-btn" style="background-color:#4267b2; color:white; "><i style="padding-right:12px;" class="fa fa-facebook"></i>Inscription  Facebook</button></a>
  </div>
  <div class="modal-footer">
	<button type="button" class="btn btn-default" data-dismiss="modal">fermer</button>
  </div>
</div>






</div>
</div>
     <div class="container">  
             <?php if(isset($_SESSION['flash'])): ?>
			    <?php foreach ($_SESSION['flash'] as $type => $message):?>
                  <div class="alert alert-<?= $type; ?>">
				  
				  <?= $message;?>
				  </div>
			    <?php endforeach;?>
				<?php unset($_SESSION['flash']);?>
				<?php endif;?>

				
   
				<div class="modal fade" id="connexion" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Flashpayers</h4>
        </div>
        <div class="modal-body">
		<form action=""  method="post">
		 
		 <br><br><br><br>
		 <div class="form-group">
		   <label class="control-label col-sm-2" >Email:</label>
				 <div class="col-sm-10">
					 <input type="email" class="form-control" required="required" name="email2" >
			   </div>
		 </div>
		 <br><br><br><br>
		 <div class="form-group">
			   <label class="control-label col-sm-2" >Mot De Passe:</label>
				   <div class="col-sm-10">
					   <input type="password" class="form-control" name="password2" required="required"  >
				   </div>
		 </div>
		 <br><br>
		
		 <div class=" text-center">
		<button class="button btn btn-primary" style="width:200px;" type="submit">connexion</button><br><br><br><p>OU</p>
		<fb:login-button scope="public_profile,email" onlogin="checkLoginState();">
        </fb:login-button>

    <div id="status">
</div>
		</div>
   </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">fermer</button>
        </div>
      </div>
      
    </div>
  </div>
