<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends MY_Controller
{


	public function checkout($status = null)
	{

		 
		$this->_view_data['pageContent'] = 'frontend/checkout';
		$this->load->view('frontend-template', $this->_view_data);
	}

}
