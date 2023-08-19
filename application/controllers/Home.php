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
		$this->load->model('divine_model', 'divine');
		$meta['title'] = "Online Pujas for Inner Harmony and Balanced Living";
		$meta['description'] = "Participate in pujas in your and your family family's name. You will receive prasad at your doorstep along with divine grace.";
		$meta['og_img'] = base_url('assets/frontend/img/logo.jpg');
		$arr['status'] = "Active";
		$campaigns = $this->campaign->getAllData($arr);	 
		$this->_view_data['faqs'] = $this->faq->getAllFaq(null,'Active'); 
		$this->_view_data['campaigns'] = $campaigns; 
		$this->_view_data['meta'] = $meta; 
		$this->_view_data['categories'] = $this->divine->getActivedivine_category();	 
		$this->_view_data['pageContent'] = 'frontend/index';
		$this->load->view('frontend-template',$this->_view_data);
	}

	public function about_us()
	{		
		$this->_view_data['pageContent'] = 'frontend/about-us';
		$this->load->model('faq_model', 'faq'); 
		$this->_view_data['faqs'] = $this->faq->getAllFaq(null,'Active'); 
		$this->load->view('frontend-template',$this->_view_data);
	}

 
	
	public function privacy_policy()
	{		
		$this->_view_data['pageContent'] = 'frontend/privacy-policy';
		$this->load->model('faq_model', 'faq'); 
		$this->_view_data['faqs'] = $this->faq->getAllFaq(null,'Active'); 
		$this->load->view('frontend-template',$this->_view_data);
	}

	public function terms_of_services()
	{		
		$this->_view_data['pageContent'] = 'frontend/terms-of-services';
		$this->load->model('faq_model', 'faq'); 
		$this->_view_data['faqs'] = $this->faq->getAllFaq(null,'Active'); 
		$this->load->view('frontend-template',$this->_view_data);
	}

	function divine_list($slug){
		if(!empty($slug)){
			$this->load->model('divine_model', 'divine');
			$this->load->model('page_model', 'page');
			$cat =  $this->divine->getDetailBySlug($slug); 
			$this->_view_data['categories'] = $cat;
			$this->_view_data['allpost'] = $this->page->getAllByCategory($cat->id);
			$this->_view_data['pageContent'] = 'frontend/post/list';
			$this->load->model('faq_model', 'faq'); 
			$this->_view_data['faqs'] = $this->faq->getAllFaq(null,'Active'); 
			$meta['title'] = $cat->title;
			$meta['description'] = $cat->short_description;
			$meta['og_img'] = base_url('uploads/divine/' . $cat->img);
			$this->_view_data['meta'] = $meta;
			 
			$this->load->view('frontend-template',$this->_view_data);
		}else{
			show_404();
		} 
		
	}

	function post_details($cat_slug,$post_slug){
		if(!empty($cat_slug) || !empty($post_slug)){
			$this->load->model('divine_model', 'divine');
			$this->load->model('page_model', 'page');
			$cat =  $this->divine->getDetailBySlug($cat_slug); 
			if(empty($cat)){
				show_404();
			}
			$postdetails  = $this->page->getPostDetails($cat->id,$post_slug); 
			$this->_view_data['categories'] = $cat;
			$this->_view_data['postdetails'] = 	$postdetails; 
			$this->_view_data['pageContent'] = 'frontend/post/details';
			$this->load->model('faq_model', 'faq'); 
			$this->_view_data['faqs'] = $this->faq->getAllFaq(null,'Active'); 
			$meta['title'] = $postdetails->meta_title;
			$meta['description'] = $postdetails->meta_description;
			$meta['og_img'] = base_url('uploads/divine_post/' . $postdetails->img);
			$this->_view_data['meta'] = $meta;  
			$this->load->view('frontend-template',$this->_view_data);
		}else{
			show_404();
		} 
		
	}

	
	 
	
	
}
