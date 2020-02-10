<?php
$connect = mysqli_connect("localhost","root","","buyer");
$output='';
$sql='SELECT * FROM fournisseur WHERE id_service =  '.$_POST['id_four'].'  ';
$result=mysqli_query($connect, $sql);
$output='<option value="">Choisissez le fournisseur </option>' ;
while ($row = mysqli_fetch_array($result)) {
  $output .= '<option value = '. $row["nom_fournisseur"].' > ' .$row["nom_fournisseur"]. '</option>';
}
echo $output;


