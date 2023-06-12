<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends MY_Controller
{


	public function index($id = null)
	{  

		$this->_view_data['pagetitle'] = 'Dashboard'; 
		$this->_view_data['pageCss'] = array(
			"admin/css/custom.css" => "false"
		);
		$this->_view_data['pageJs'] = array(); 
		$this->_view_data['pageContent'] = 'admin/dashboard';
		$this->load->view('admin-template', $this->_view_data);
	}
}
