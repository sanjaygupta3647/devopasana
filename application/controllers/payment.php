<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment extends CI_Controller {
 
	function index(){
				$data = array(
					'merchantId' => 'MERCHANTUAT',
					'merchantTransactionId' => uniqid(),
					'merchantUserId' => 'MUID123',
					'amount' => 10000,
					'redirectUrl' => base_url("payment/response"), // Replace with your actual response route
					'redirectMode' => 'POST',
					'callbackUrl' => base_url("payment/response"), // Replace with your actual response route
					'mobileNumber' => '9999999999',
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

        echo "<pre>"; print_r(json_decode($response));
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
