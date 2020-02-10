<?php
if(!empty($_POST['mail'])){
  require_once 'shop/db.php';
  $req = $pdo->prepare("INSERT INTO newsletter SET email = ?");
  $req ->execute([$_POST['mail']]);
}
 if(!empty($_POST['name'])){
  require_once 'shop/db.php';
  $req = $pdo->prepare("INSERT INTO contact SET Nom = ?,  email = ?,  objet= ?, message= ? ");
  $req ->execute([$_POST['name'], $_POST['email'],$_POST['subject'],$_POST['message']]);
 }
 if(!empty($_POST['paychoice'])){

  $page = $_POST['paychoice'];
  switch ($page) {
    case 'Eneo':
      header('Location: shop/facture.php');
      break;
    case 'Camwater':
      header('Location: shop/camwater.php');
      break;
    case 'Orange':
        header('Location: shop/orange.php');
        break;
    case 'MTN':
          header('Location: shop/mtn.php');
          break;
    case 'orange':
        header('Location: shop/recharge.php');
        break;
    case 'mtn':
        header('Location: shop/recharge.php');
        break;
    case 'nextell':
        header('Location: shop/recharge.php');
        break;
    
    default:
      # code...
      break;
  }

 }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Flashpayers</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords" content="achat,acheter,payer,argent,famille, procher,distance,paiment,facture,service,etranger,disapora,
  temps,pays,ville,Douala,Cameroun,Afrique,Europe">
  <meta content="" name="description" content="faites des paiements de services à distances pour vos proches et nous livrons vos proches au pays et si vous êtes au pays choississez votre service et nous nous livrons ou vous retirez au lieu du service">

  <!-- Favicons -->
  <link href="img/favicon.ico" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

  
  <!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Hind:400,700" rel="stylesheet">

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

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">
  <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

	<!-- Slick -->
	<link type="text/css" rel="stylesheet" href="css/slick.css" />
	<link type="text/css" rel="stylesheet" href="css/slick-theme.css" />

	<!-- nouislider -->
	<link type="text/css" rel="stylesheet" href="css/nouislider.min.css" />

	<!-- Font Awesome Icon -->
	<link rel="stylesheet" href="css/font-awesome.min.css">

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="css/style2.css" />

</head>

<body>


  <!--==========================
    Header
  ============================-->
  <header id="header">
    <div class="container-fluid">

      <div id="logo" class="pull-left">
        <h1><img id="logo2" src="img/flashpayers1.png" style="padding-right: 14px; height:50px; width:100px;" alt="" title="" /><a href="#intro" class="scrollto">FlashPayer</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
         <a href="#intro"></a>
      </div>

      <nav id="nav-menu-container">
         
        <ul class="nav-menu">
          <li class="menu-active"><a href="#intro">Acceuil</a></li>
          <li><a href="#about">A Propos de Nous</a></li>
          <li><a href="#featured-services">Commander</a></li>
          <li><a href="#services">Services</a></li>
          <li><a href="#avantages">Nos Avantages</a></li>
          <li><a href="#contact">Contact</a></li>
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header>