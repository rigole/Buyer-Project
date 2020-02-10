<html>
<head>
<meta charset="utf-8">
</head>
</html>
<?php

$connect = mysqli_connect("localhost","root","","buyer");
$output='';
$sql='SELECT * FROM service WHERE id_ville = '.$_POST['id_serv'].'  ';
$result=mysqli_query($connect,$sql);
$output='<option value="">Choisissez le service </option>' ;
while ($row=mysqli_fetch_array($result)) {
  $output .= '<option value ="' .$row ["id_service"]. '"> ' .$row["nom_service"]. '</option>';
}
echo $output;