<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH."libraries/razorpay/razorpay-php/Razorpay.php");
use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;
class Register extends CI_Controller {
  
  public function index()
  {
    $this->load->view('register-form.php');
  }
  
  public function pay()
  {
    $this->load->helper('form');
    $api = new Api('rzp_test_mDSwnekBBSpC7F', 'djTVxJ9hxMpspmmE1D9xUeL5');
    $amt = $this->input->post('amount');
    $razorpayOrder = $api->order->create(array(
      'receipt'         => rand(),
      'amount'          => $amt * 100, // 2000 rupees in paise
      'currency'        => 'INR',
      'payment_capture' => 1 // auto capture
    ));
    
    $amount = $razorpayOrder['amount'];
    $razorpayOrderId = $razorpayOrder['id'];
    $data = $this->prepareData($amount,$razorpayOrderId);
    $this->load->view('register',array('data' => $data));
  }
 
 
  public function verify()
  {
    $success = true;
    $error = "payment_failed";
    if (empty($_POST['razorpay_payment_id']) === false) {
        $api = new Api('rzp_test_mDSwnekBBSpC7F','djTVxJ9hxMpspmmE1D9xUeL5');
    try {
            $attributes = array(
                'razorpay_order_id' => $_POST['razorpay_order_id'],
                'razorpay_payment_id' => $_POST['razorpay_payment_id'],
                'razorpay_signature' => $_POST['razorpay_signature']
            );
            $api->utility->verifyPaymentSignature($attributes);
        } catch(SignatureVerificationError $e) {
            $success = false;
            $error = 'Razorpay_Error : ' . $e->getMessage();
        }
    }
    if ($success === true) {
       
        redirect(base_url().'index.php/register/success');
    }
    else {
        redirect(base_url().'index.php/register/paymentFailed');
    }
}


 
  public function prepareData($amount,$razorpayOrderId)
  {
    $data = array(
      "key" => 'rzp_test_mDSwnekBBSpC7F',
      "amount" => $amount,
      "name" => "Gaurav Mishra",
      "description" => "Lets learn and deep dive into technology",
      "image" => "https://example.com/your_logo",
      "prefill" => array(
        "name"  => $this->input->post('name'),
        "email"  => $this->input->post('email'),
        "contact" => $this->input->post('contact'),
      ),
      "notes"  => array(
        "address"  => "Banaglore",
        "merchant_order_id" => "merchant_order_id".rand(),
      ),
      "theme"  => array(
        "color"  => "#F37254"
      ),
      "order_id" => $razorpayOrderId,
    );
    
    return $data;
  }
 
 
 
  public function success()
  {
    $this->load->view('success');
  }
 
  public function paymentFailed()
  {
    $this->load->view('failed');
  }  
}