<?php
   if(!empty($_POST['paychoice'])){
    
    switch ($_POST['paychoice']) {
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
      case 'Pharmacie_de_Douala':
          header('Location: shop/drugs.php');
          break;
      
      default:
      $_SESSION['flash']['danger'] = 'Veuillez choisir un fournisseur';
        break;
    }
  
   }
 ?>
