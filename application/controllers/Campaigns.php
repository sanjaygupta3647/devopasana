<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Campaigns extends CI_Controller {

	 
	public function details()
	{ 
		$this->_view_data['pageContent'] = 'frontend/campaign/details';
		$this->load->view('frontend-template',$this->_view_data);
	}
	
	 
	
	
}
