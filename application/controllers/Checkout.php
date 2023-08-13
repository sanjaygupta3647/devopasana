<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Checkout extends CI_Controller
{


	public function index($status = null)
	{

		 
		$this->_view_data['pageContent'] = 'frontend/checkout';
		$this->load->view('frontend-template', $this->_view_data);
	}

}
