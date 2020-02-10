<?php
$connect = mysqli_connect("localhost","root","","buyer");
$output='';
$sql='SELECT * FROM ville WHERE id_pays =  '.$_POST['id_pys'].'  ';
$result=mysqli_query($connect, $sql);
$output='<option value="">Choisissez votre ville </option>' ;
while ($row = mysqli_fetch_array($result)) {
  $output .= '<option value =""> ' .$row["nom_ville"]. '</option>';
}
echo $output;