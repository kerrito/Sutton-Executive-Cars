<?php 
require_once "paypal.php";

if(array_key_exists('paymentId',$_GET) && array_key_exists('PayerID',$_GET)){
    $transaction = $gateway->completePurchase(array(
    'payer_id'=>$_GET['PayerID'],
    'transactionReference'=>$_GET['paymentId']
    ));

    $response=$transaction->send();

    if($response->isSuccessful()){
      $arr_body=$response->getData();

      $payment_id=$arr_body['id'];
      $payer_id=$arr_body['payer']['payer_info']['payer_id'];
      $payer_email=$arr_body['payer']['payer_info']['email'];
      $payment_paid=$arr_body['transactions'][0]['amount']['total'];
      $curency= PAYPAL_CURRENCY;
      $payment_status=$arr_body['state'];


      
    $location_credentail_id = $_SESSION['location_credentail_id'];
      
      $query="SELECT * FROM location_credential WHERE id=$location_credentail_id";
      $query_res=mysqli_query($con,$query);
      if(mysqli_num_rows($query_res)>0){
          $query_result=mysqli_fetch_assoc($query_res);
          $payment_needed=$query_result['payment'];
          if($payment_needed==$payment_paid){
            $sql="INSERT INTO payment_details SET payment_id='$payment_id',payer_id='$payer_id',payer_email='$payer_email',payment='$payment_paid',currency='$curency',payment_status='$payment_status',`ride_id`=$location_credentail_id ";
            if(mysqli_query($con,$sql)){
              
            // Redirecting to mailer page
            echo "<script>
                location.href='../php/mailer.php'
                </script>";
            }
          }
    }
}
}


?>