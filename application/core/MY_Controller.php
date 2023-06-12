<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
	public $_view_data = array();
	public $_user_id = null;
	protected $_username = null;
	protected $_role_id = null;
	protected $_status = null;

	function __construct()
	{
		parent::__construct(); 
		date_default_timezone_set('Asia/Kolkata');
		if (!$this->is_logged_in() && $this->router->method != "authenticate") {
			$nextUrl = uri_string();
			redirect(base_url('login/logout?nextUrl=' . $nextUrl));
		}



		$session_data = $this->session->userdata('logged_in');
		$roleId = $session_data['role_id'];

		$firstUrlParameter = $this->uri->segment(1);
		if ($firstUrlParameter == 'admin' &&  $roleId == 3) {
			show_404();
		} elseif ($firstUrlParameter == 'user' && $roleId != 3) {
			show_404();
		}



		$this->_user_id = $session_data['user_id'];
		$this->_role_id = $session_data['role_id'];
		$this->_username   = $session_data['username'];
		$this->_status = $session_data['status'];

		$this->_view_data['user_id'] = $this->_user_id;
		$this->_view_data['role_id'] = $this->_role_id;
		$this->_view_data['username'] = $this->_username;
		$this->_view_data['status'] = $this->_status;
	}

	public function is_logged_in()
	{
		$user = $this->session->userdata('logged_in');
		return !empty($user);
	}
}
/* End of file MY_Controller.php */
/* Location: ./application/core/MY_Controller.php */