<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment extends CI_Controller {
 
	function index($transactionId){ 
		        if(empty($transactionId)){
					show_404();
				}else{ 
					$this->load->model('Cart_model', 'cart');
					$this->load->model('Orders_model', 'orders');
					$trans = $this->cart->getTransDetails($transactionId);
					if(empty($trans)){
						show_404();
					}
					
					// Code to insert data into orders table start

					$orderData  = array(
						"customer_id"=>$trans->customer_id,
						"campaign_id"=>$trans->campaign_id,
						"pooja_id"=>$trans->pooja_id,
						"price_id"=>$trans->price_id,
						"puja_price"=>$trans->puja_price, 
						"service_charge"=>$trans->service_charge,
						"prasad_charge"=>$trans->prasad_charge,
						"devotees"=>$trans->devotees,
						"name"=>$trans->name,
						"phone"=>$trans->phone,
						"email"=>$trans->email,
						"address1"=>$trans->address1,
						"address2"=>$trans->address2,
						"town"=>$trans->town,	
						"state"=>$trans->state,					 
						"additional_info"=>$trans->additional_info,
						"total_price"=>$trans->total_price,
						"transaction_id"=>$trans->transaction_id,
						"customer_id"=>$trans->customer_id

					);

					$id = $this->orders->add($orderData);
					if($id){
						$addons = $this->cart->getAddOnWithPooja($trans->id);
						if(count($addons)){
							foreach($addons as $ads){
								$data  = array(
									"order_id"=>$id,
									"addon_id"=>$ads->addon_id,
									"addon_price"=>$ads->addon_price									  
								);
								$this->orders->add($data,'order_addons');
							}
						}
					}

					$this->session->set_userdata('transaction_id','');



					// Code to insert data into orders table end


					$data = array(
						'merchantId' => 'MERCHANTUAT',
						'merchantTransactionId' => $transactionId,
						'merchantUserId' => 'MUID123',
						'amount' => $trans->total_price,
						'redirectUrl' => base_url("payment/response"), // Replace with your actual response route
						'redirectMode' => 'POST',
						'callbackUrl' => base_url("payment/response"), // Replace with your actual response route
						'mobileNumber' => $trans->phone,
						'paymentInstrument' => array(
							'type' => 'PAY_PAGE',
						),
					);

					// Step 2: Encode the data using base64
					$encode = base64_encode(json_encode($data));

					// Step 3: Generate the X-VERIFY header
					$saltKey = '099eb0cd-02cf-4e2a-8aca-3e6c6aff0399';
					$saltIndex = 1;
					$string = $encode . '/pg/v1/pay' . $saltKey;
					$sha256 = hash('sha256', $string);
					$finalXHeader = $sha256 . '###' . $saltIndex;

					// Step 4: Prepare the request data for the POST request
					$requestData = json_encode(['request' => $encode]);

					// Step 5: Perform the POST request using cURL or other HTTP libraries
					$ch = curl_init('https://api-preprod.phonepe.com/apis/merchant-simulator/pg/v1/pay');
					curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
					curl_setopt($ch, CURLOPT_POSTFIELDS, $requestData);
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
					curl_setopt($ch, CURLOPT_HTTPHEADER, array(
						'Content-Type: application/json',
						'X-VERIFY: ' . $finalXHeader,
					));

					$response = curl_exec($ch);
					curl_close($ch);

					// Step 6: Decode the response and redirect
					$rData = json_decode($response);

					if ($rData && isset($rData->data->instrumentResponse->redirectInfo->url)) {
						header('Location: ' . $rData->data->instrumentResponse->redirectInfo->url);
						exit;
					}
			}
    }
	
	public function response()
    {
		
		 
		$merchantId = $_POST['merchantId'];
		$transactionId = $_POST['transactionId'];

		// Salt and salt index
		$saltKey = '099eb0cd-02cf-4e2a-8aca-3e6c6aff0399';
		$saltIndex = 1;

		// Generate the final X-VERIFY header
		$finalXHeader = hash('sha256', '/pg/v1/status/' . $merchantId . '/' . $transactionId . $saltKey) . '###' . $saltIndex;

		// Perform the GET request (using cURL or other HTTP libraries)
		$url = 'https://api-preprod.phonepe.com/apis/merchant-simulator/pg/v1/status/' . $merchantId . '/' . $transactionId;

		// Add appropriate headers to the request
		$headers = array(
			'Content-Type: application/json',
			'accept: application/json',
			'X-VERIFY: ' . $finalXHeader,
			'X-MERCHANT-ID: ' . $transactionId,
		);

		// Your cURL or HTTP request implementation goes here
		// Replace this with your actual HTTP request code using cURL or other libraries

		// Sample implementation using cURL (replace this with actual HTTP code)
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		$response = curl_exec($ch);
		curl_close($ch);
		$this->load->model('Cart_model', 'cart');
		$this->load->model('Orders_model', 'orders');
        $res = json_decode($response); 
		$orderData  = array(
			"pp_state"=>$res->data->state,
			"pp_response_code"=>$res->data->responseCode,
			"pp_transactionId"=>$res->data->transactionId,
			"pp_response"=>$response,			 
			"pp_amount"=>$res->data->amount
		);
		$where["transaction_id"] = $transactionId;
		$this->orders->update($orderData, $where);
		$this->_view_data['pp_code'] = $res->data->responseCode;
		$this->_view_data['pp_trans_id'] = $res->data->transactionId;
		$this->_view_data['site_trans_id'] = $transactionId;

		$this->_view_data['pageContent'] = 'frontend/payment-response';
		$this->load->view('frontend-template', $this->_view_data); 

    }
	
	function refundProcess($tra_id)
	{
		// Build the payload data array
		$payload = [
			'merchantId' => 'MERCHANTUAT',
			'merchantUserId' => 'MUID123',
			'merchantTransactionId' => $tra_id,
			'originalTransactionId' => strrev($tra_id),
			'amount' => 5000,
			'callbackUrl' => 'your_response_route.php', // Replace with your actual response route
		];

		// Encode the payload using base64
		$encode = base64_encode(json_encode($payload));

		// Salt and salt index
		$saltKey = '099eb0cd-02cf-4e2a-8aca-3e6c6aff0399';
		$saltIndex = 1;

		// Generate the final X-VERIFY header
		$string = $encode . '/pg/v1/refund' . $saltKey;
		$sha256 = hash('sha256', $string);
		$finalXHeader = $sha256 . '###' . $saltIndex;

		// Perform the POST request for refund using cURL or other HTTP libraries
		$url = 'https://api-preprod.phonepe.com/apis/merchant-simulator/pg/v1/refund';

		// Prepare the request data for the POST request
		$requestData = json_encode(['request' => $encode]);

		// Initialize cURL session
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
		curl_setopt($ch, CURLOPT_POSTFIELDS, $requestData);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			'Content-Type: application/json',
			'X-VERIFY: ' . $finalXHeader,
		));

		// Execute cURL request and get the response
		$response = curl_exec($ch);

		// Check for cURL errors
		if (curl_errno($ch)) {
			echo 'Error: ' . curl_error($ch);
		}

		// Close cURL session
		curl_close($ch);

		// Decode the response
		$rData = json_decode($response);

		// Generate X-VERIFY header for the status check
		$finalXHeader1 = hash('sha256', '/pg/v1/status/' . 'MERCHANTUAT' . '/' . $tra_id . $saltKey) . '###' . $saltIndex;

		// Perform the GET request for status check using cURL or other HTTP libraries
		$statusUrl = 'https://api-preprod.phonepe.com/apis/merchant-simulator/pg/v1/status/' . 'MERCHANTUAT' . '/' . $tra_id;

		// Initialize cURL session for status check
		$chStatus = curl_init($statusUrl);
		curl_setopt($chStatus, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($chStatus, CURLOPT_HTTPHEADER, array(
			'Content-Type: application/json',
			'accept: application/json',
			'X-VERIFY: ' . $finalXHeader1,
			'X-MERCHANT-ID: ' . $tra_id,
		));

		// Execute cURL request for status check and get the response
		$responseStatus = curl_exec($chStatus);

		// Check for cURL errors
		if (curl_errno($chStatus)) {
			echo 'Error: ' . curl_error($chStatus);
		}

		// Close cURL session for status check
		curl_close($chStatus);

		// Decode the status check response
		$rDataStatus = json_decode($responseStatus);

		// Display the responses
		var_dump($rData, $rDataStatus);
	}
	 
}
