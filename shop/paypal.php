<?php
require_once 'header.php';
require_once 'db.php';
?>
<h1>Please wait we are transferring you in paypal....</h1>
<?php
$paypal_url = 'https://www.sandbox.paypal.com/';

$ids = array_keys($_SESSION['panier']);
if (empty($ids)) {
     $products = array();
}else {
        $products = $DB->query('SELECT * FROM products WHERE id IN ('.implode(',',$ids).')');
       }

      
?>
<form action="<?php echo $paypal_url;?>/cgi-bin/webscr" method="post" name="buyCredits" id="buyCredits">
    <input type="hidden" name="cmd" value="_xclick">
    <input type="hidden" name="business" value="FlashPayers">
    <input type="hidden" name="currency_code" value="USD">
    <input type="hidden" name="item_name" value="payment for testing">
    <input type="hidden" name="item_number" value="1212">
    <input type="hidden" name="amount" value="<?php echo $panier->total(); ?>">
    <input type="hidden" name="return" value="http://localhost/Buyer/shop/contenuPanier.php;">
</form>
<script type="text/javascript">
    document.getElementById("buyCredits").submit();
</script>