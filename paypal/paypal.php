<?php 
include_once "../php/config.php";
require_once "vendor/autoload.php";

USE Omnipay\Omnipay;


define("CLIENT_ID","AaigVCF4J8MHURGNrCvFWNB4qJzzSxFzufNU1L-A5_zCsl6iKv-wYZ4F49RZqFszrxX8yqiDVTEJ7XSj");
define("CLIENT_SECRET","ENyyM3J9Zb4rd_2yoMQNdb4LRe8TTpVy8JcI7CWX9COzHk-j0JkAifU4CtnUxHG543XcGexP1YIrcI9V");


define("PAYPAL_RETURN_URL","http://localhost:8080/sultan-car/Sutton-Executive-Cars/paypal/paypalthird.php");
define("PAYPAL_CANCEL_URL","http://localhost:8080/sultan-car/Sutton-Executive-Cars/payment.html?msg=failed");
define("PAYPAL_CURRENCY",'USD');

$gateway = Omnipay::create("PayPal_Rest");

$gateway->setClientId(CLIENT_ID);
$gateway->setSecret(CLIENT_SECRET);
$gateway->setTestMode(true); //to go live set false
