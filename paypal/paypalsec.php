<?php 
require_once "paypal.php";
echo "ok";
if(isset($_GET['id'])){
    echo "ok1";
    try{
        $reponsive =$gateway->purchase(array(
            'amount'=>$_GET['id'],
            'currency'=>PAYPAL_CURRENCY,
            'returnUrl'=>PAYPAL_RETURN_URL,
            'cancelUrl'=>PAYPAL_CANCEL_URL
        ))->send();
        if($reponsive->isRedirect()){
            $reponsive->Redirect();
        }else{
            echo $e->getMessage();    
        }

    }catch(Exception $e){
        echo $e->getMessage();
    }
}






?>