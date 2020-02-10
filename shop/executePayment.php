<?php
require_once 'db.php';
require 'paypalConfig.php';
require 'header2.php';

if (empty($_SESSION['name'])) {
    header('location: contenuPanier.php');
    exit;
}

if (!empty($_GET['payment_id']) && !empty($_GET['payer_id']) && !empty($_GET['token'])) {
    $app = new PaypalPayment();
    $user = $app->getUserDetails($_SESSION['name']);

    $payment_id = _GET['payment_id'];
    $payer_id = _GET['payer_id'];
    $token = _GET['token']
    
    if ($app->paypal_check_payment($payment_id,$payer_id,$user['id_user'])) {
        header('location: contenuPanier.php?status=true');
        exit;
        
    } else {
        header('location: contenuPanier.php?status=false');
        exit;
    }
    
}else{
    header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;

}




?>
