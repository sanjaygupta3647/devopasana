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
					"frontend/js/campaign-details.js" => "false" 
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
	
	 
	
	
}
