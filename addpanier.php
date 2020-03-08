<?php
require 'header.php';
$json = array('error' => true);

if (isset($_GET['id'])) {
 $product = $DB->query('SELECT id FROM products WHERE id=:id', array('id' => $_GET['id']));
 if (empty($product)) {
    $json['message']="Vous avez  choisi un produit qui n'existe pas";
 }
 $panier->add($product[0]->id);
 $json['error']= false;
 $json['total'] = $panier->total();
 $json['total'] = $panier->count();
 $json['message']='Produit ajouté au panier';
}else {
    $json['message']="Vous n'avez pas choisi de produit a ajouter au panier";
}
echo json_encode($json);
?>