 <?php
$token = $_POST['stripeToken'];
$email = $_POST['email'];
$name = $_POST['name'];

if (filter_var($email,FILTER_VALIDATE_EMAIL) && !empty($name) && !empty($token)) {

    require('stripe.php');
    $stripe = new Stripe('sk_test_yBFIfkUj5Rt73N3JJriJpH2M00B8C27Su0');
    $customer = $stripe->api('customers',[

        'source' => $token,
        'description' => $name,
        'email' => $email
        
    ]);
    $stripe->api('charges',[
     'amount' => 3000,
      'currency' => 'eur',
      'customer' =>$customer->id
    ]);
    die("votre paiement est OKAY");
    
}