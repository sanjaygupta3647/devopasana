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
        $session_id = session_id();
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

		$is_added = $this->cart->isExist($session_id);
		$url = base_url("checkout");
		if(!$is_added){
			$cartData['create_time'] = $current_time;
			$cartData['session_id'] = $session_id;
			$cartData['transaction_id'] = generateTransactionId();
			$id = $this->cart->add($cartData);
			if($id){
				$response = array('type' => 'success', 'message' => "Puja added successfully!", 'url' => $url);
			}else{
				$response = array('type' => 'error', 'message' => "There is some error!");
			} 
		}else{
			$where['session_id'] = $session_id;
			$id = $this->cart->update($cartData,$where);
			$response = array('type' => 'success', 'message' => "Puja updated successfully!", 'url' => $url);
		} 
		
		$this->output->set_content_type('application/json')->set_output(json_encode($response));

		 
	}
	
	 
	
	
}
