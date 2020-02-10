<?php
session_start();
if($_SESSION["paypalphp"]=="")
{
    ?>
    <script type="text/javascript">
        window.location="contenuPqnier.php";
    </script>
<?php

}
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"buyer");
$order_id=$_GET["id"];

//this is for getting record from temp table to permanent table
$res=mysqli_query($link,"select * from order_address where id=$order_id");
while($row=mysqli_fetch_array($res))
{
    $fname=$row["firstname"];
    $lname=$row["lastname"];
    $email=$row["email"];
    $address=$row["address"];
    $city=$row["city"];
    $pincode=$row["pincode"];
    $contactno=$row["contactno"];
}
mysqli_query($link,"insert into order_confirm values('','$fname','$lname','$email','$address','$city','$pincode','$contactno')");

//now need to get permanent table order id

$res=mysqli_query($link,"select id_order_confirm from order_confirm order by id desc limit 1");
while($row=mysqli_fetch_array($res))
{
    $id=$row["id"];
}

foreach ($_COOKIE['item'] as $name1 => $value)   //this is for looping as per cookies if 3 cookies then loop move
{
    $values11 = explode("__", $value);

    mysqli_query($link,"insert into confirm_order_product values('','$id','$values11[1]','$values11[2]','$values11[3]','$values11[0]','$values11[4]')");
}


echo "your order get successfully, we deliver product soon";

$_SESSION["pay"]="";
$_SESSION["paypalphp"]="";


?>

<script type="text/javascript">

    setTimeout(function(){
        window.location="contenu.php";

    },3000);

</script>
