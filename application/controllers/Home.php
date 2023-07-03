<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{	
		$this->load->model('campaign_model', 'campaign'); 
		$this->load->model('faq_model', 'faq');
		$arr['status'] = "Active";
		$campaigns = $this->campaign->getAllData($arr);	 
		$this->_view_data['faqs'] = $this->faq->getAllFaq(null,'Active'); 
		$this->_view_data['campaigns'] = $campaigns; 
		$this->_view_data['pageContent'] = 'frontend/index';
		$this->load->view('frontend-template',$this->_view_data);
	}

	public function about_us()
	{		
		$this->_view_data['pageContent'] = 'frontend/about-us';
		$this->load->view('frontend-template',$this->_view_data);
	}

	public function contact_us()
	{		
		$this->_view_data['pageContent'] = 'frontend/contact-us';
		$this->load->view('frontend-template',$this->_view_data);
	}
	
	public function privacy_policy()
	{		
		$this->_view_data['pageContent'] = 'frontend/privacy-policy';
		$this->load->view('frontend-template',$this->_view_data);
	}

	public function terms_of_services()
	{		
		$this->_view_data['pageContent'] = 'frontend/terms-of-services';
		$this->load->view('frontend-template',$this->_view_data);
	}

	
	
	 
	
	
}
