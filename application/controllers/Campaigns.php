<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Campaigns extends CI_Controller {

	 
	public function details($slug)
	{ 
		if(!empty($slug)){
			$this->load->model('campaign_model', 'campaign');
			$campaign = $this->campaign->getDetailBySlug($slug); 
			if(!empty($campaign)){
				$meta['title'] = $campaign->meta_title;
				$meta['meta_description'] = $campaign->meta_description;
				$meta['og_img'] = base_url('uploads/campaign/' . $campaign->image);
				$this->_view_data['pooja'] = $this->campaign->getAllCampaignPoojaDetails($campaign->id);

				$this->load->model('faq_model', 'faq'); 
				$this->_view_data['faqs'] = $this->faq->getAllFaq($campaign->id,'Active');

				//p($this->_view_data['pooja']);
				$this->_view_data['meta'] = $meta; 
				$this->_view_data['pageCss'] = array("" => "true");
				$this->_view_data['pageJs'] = array( 
					"frontend/js/validate.min.js" => "false",
					"frontend/js/campaign-details.js" => "false",
					"frontend/js/bootbox.min.js" => "false"  
				);
				$this->_view_data['campaign'] = $campaign;
				$this->_view_data['pageContent'] = 'frontend/campaign/details';
				$this->load->view('frontend-template',$this->_view_data); 
			}else{
				show_404();
			}
			
		}else{
			show_404();
		} 
	}


	function addpooja(){
		$postData = $this->input->post();
		$this->load->model('cart_model', 'cart');
		$this->load->model('pooja_model', 'pooja'); 
		$sess = $this->session->userdata('customer');
		$current_time = date("Y-m-d H:i:s");
		$cartData = array(
			"pooja_id"=>$postData['pooja_id'],
			"campaign_id"=>$postData['campaign_id'],
			"price_id"=>$postData['price_id'],
			"service_charge"=>$postData['service_charge'],
			"prasad_charge"=>$postData['prasad_charge'],		
			"customer_id"=>$sess['id'],
			"puja_price"=>$this->pooja->getPoojaPrice($postData['price_id']),
			"update_time"=>$current_time

		); 
		$transaction_id = $this->session->userdata('transaction_id');
		$is_added = $this->cart->isExist($transaction_id);
		$url = base_url("checkout");
		if(!$is_added){
			$cartData['create_time'] = $current_time;
			 
			$cartData['transaction_id'] = generateTransactionId();
			$this->session->set_userdata('transaction_id', $cartData['transaction_id']);
			$id = $this->cart->add($cartData);
			if($id){
				$response = array('type' => 'success', 'message' => "Puja added successfully!", 'url' => $url);
			}else{
				$response = array('type' => 'error', 'message' => "There is some error!");
			} 
		}else{
			$where['transaction_id'] = $transaction_id;
			$id = $this->cart->update($cartData,$where);
			$response = array('type' => 'success', 'message' => "Puja updated successfully!", 'url' => $url);
		} 
		
		$this->output->set_content_type('application/json')->set_output(json_encode($response));

		 
	}
	

	public function checkout($status = null)
	{ 
		$this->load->model('cart_model', 'cart');
		$this->load->model('Addon_model', 'addons');
		$this->load->model('customer_model', 'customer');
		$customer_id = getCustomerID(); 
		$customer = $this->customer->getUserData($customer_id);
		$devotees = $this->customer->getAllDevotee($customer_id); 

		$cart = $this->cart->getDetails(transaction_id());  
		if(empty($cart->addons)){
			$addons_ids = 0;
			$cart_id = 0;
		}else{
			$addons_ids = $cart->addons;
			$cart_id = $cart->id;
		}
		$addons = $this->addons->getAllData($addons_ids); 
		$add_addons = $this->cart->addOnWithPooja($cart_id);  

		$this->_view_data['devotees'] = $devotees;
		$this->_view_data['cart'] = $cart;
		$this->_view_data['customer'] = $customer;
		$this->_view_data['addons'] = $addons;
		$this->_view_data['add_addons'] = $add_addons;
		$this->_view_data['pageJs'] = array( 
			"frontend/js/validate.min.js" => "false",
			"frontend/js/campaign-details.js" => "false",
			"frontend/js/profile.js" => "false",
			"frontend/js/bootbox.min.js" => "false"  
		); 
		$this->_view_data['pageContent'] = 'frontend/checkout';
		$this->load->view('frontend-template', $this->_view_data);
	}

	function addpoojaAddon(){
		$postData = $this->input->post(); 
		$this->load->model('cart_model', 'cart');
		$this->load->model('Addon_model', 'addons');
        $price  = $this->addons->getPrice($postData['addon_id']); 
		$current_time = date("Y-m-d H:i:s");
		$addOnData = array(
			"cart_id"=>$postData['cart_id'],
			"addon_id"=>$postData['addon_id'], 
			"addon_price"=>$price,			 
			"create_time"=>$current_time

		); 
		 
		$is_added = $this->cart->isExistAddOn($postData);
		$url = base_url("checkout");
		if(!$is_added){ 
			$id = $this->cart->add($addOnData,'cart_addons');
			if($id){
				$response = array('type' => 'success', 'message' => "Added successfully!", 'url' => $url);
			}else{
				$response = array('type' => 'error', 'message' => "There is some error!");
			} 
		}else{ 
			$response = array('type' => 'error', 'message' => "Already added!");
		} 
		
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}

	function removePoojaAddon(){
		$this->load->model('Cart_model', 'cart');
		$postData = $this->input->post(); 
		 
		$remove = $this->cart->removePoojaAddon($postData);
		if($remove){
			$response = array('type' => 'success', 'message' => "removed successfully!");
		}else{
			$response = array('type' => 'error', 'message' => "There is some error!");
		}

		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}

	function finalCheckout(){
		$postData = $this->input->post(); 
		$this->load->model('Cart_model', 'cart');
		$postData['devotees'] = implode(",",array_values($postData['relation']));
		unset($postData['relation']);
		$postData['update_time'] = date("Y-m-d H:i:s");
		$postData['status'] = "Initiated";
		$where['id'] = $postData['cart_id'];
		unset($postData['cart_id']);
		$id = $this->cart->update($postData,$where);
		$url = base_url("payment/".$postData['transaction_id']);
		if($id){
			$response = array('type' => 'success', 'message' => "Added successfully!", 'url' => $url);
		}else{
			$response = array('type' => 'error', 'message' => "There is some error!");
		} 

		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}
	 
	
	
}
