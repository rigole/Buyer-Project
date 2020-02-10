<?php
require_once 'header.php';
require_once 'db.php';
define('MODE', 'sandbox');
define('CURRENCY', 'EUR');
define('APP_URL', 'http://localhost/Buyer/shop/contenuPanier.php');
define('PayPal_CLIENT_ID', 'AXcB2yMU4biL4OsrzvdErdBrY0sCz0ZMt_SIB66KQpgQdWSjQbgy_3pM0rFu0MhWFq1ILhUpYAnozJCn');
define('PayPal_SECRET', 'EHTWHK5D-F-jRp_N79ggkE-qgkqWz8y9Sns1K0e4TwpDyFuhL-JkUXcrOGVu4CBwB6eRAJSOxZlaB-Ct');
define('PayPal_BASE_URL', 'https://api.sandbox.paypal.com/v1/');

class PaypalPayment
{

public function getUserDetails($id)
{
    $data = [];
    $query = "SELECT * FROM `users` WHERE `id` = '$id'";
    if (!$result = mysqli_query($this->pdo, $query)) {
        exit(mysqli_error($this->pdo));
    }
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $data = $row;
        }
    }
 
    return $data;
}
  
    /*public function add_new_order($user_id, $payment_id, $payer_id, $total)
    {
        $query = "INSERT INTO orders(user_id, payment_id, payer_id, payment_total, created_at) VALUES ('$user_id', '$payment_id', '$payer_id', '$total', CURRENT_TIMESTAMP )";
        if (!$result = mysqli_query($this->db, $query)) {
            exit(mysqli_error($this->db));
        }
        $order_id = mysqli_insert_id($this->db);
        $this->_add_order_items($order_id);
    }*/

public function paypal_check_payment($payment_id, $payer_id, $token, $user_id)
    {

        // request http using curl
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, PayPal_BASE_URL . 'oauth2/token');
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_USERPWD, PayPal_CLIENT_ID . ":" . PayPal_SECRET);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "grant_type=client_credentials");
        $result = curl_exec($ch);
        $accessToken = NULL;


        if (empty($result)) {
            return FALSE;
        } else {

            // get Order details along with the status and update order
            $json = json_decode($result);
            $accessToken = $json->access_token;
            $curl = curl_init(PayPal_BASE_URL . 'payments/payment/' . $payment_id);
            curl_setopt($curl, CURLOPT_POST, FALSE);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
            curl_setopt($curl, CURLOPT_HEADER, FALSE);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($curl, CURLOPT_HTTPHEADER, array(
                'Authorization: Bearer ' . $accessToken,
                'Accept: application/json',
                'Content-Type: application/xml'
            ));
            $response = curl_exec($curl);
            $result = json_decode($response);
            $state = $result->state;
            $total = $result->panier->total();
            curl_close($ch);
            curl_close($curl);

            if ($state == 'approved') {
                $this->add_new_order($user_id, $payment_id, $payer_id, $total);

                return TRUE;

            } else {

                return FALSE;
            }

        }

    }
 
    




}

?>