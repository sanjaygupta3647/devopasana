<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customer extends CI_Controller
{ 

	public function login()
	{		
		$this->_view_data['pageContent'] = 'frontend/login'; 
		$meta['title'] = "User login - Devopasana";
		$meta['description'] = "User login - Devopasana";
		$meta['og_img'] = base_url('assets/frontend/img/logo.jpg');
		$this->_view_data['meta'] = $meta; 
		$this->_view_data['pageJs'] = array( 
			"frontend/js/validate.min.js" => "false",
			"frontend/js/bootbox.min.js" => "false",
			"frontend/js/login.js" => "false" 
		);
		$this->load->view('frontend-template',$this->_view_data);
	}

	public function signup()
	{	
		$meta['title'] = "User registartion - Devopasana";
		$meta['description'] = "User registartion - Devopasana";
		$meta['og_img'] = base_url('assets/frontend/img/logo.jpg');
		$this->_view_data['meta'] = $meta;	
		$this->_view_data['pageJs'] = array( 
			"frontend/js/validate.min.js" => "false",
			"frontend/js/bootbox.min.js" => "false",
			"frontend/js/register.js" => "false" 
		);
		$this->_view_data['pageContent'] = 'frontend/signup'; 
		$this->load->view('frontend-template',$this->_view_data);
	}

	public function authenticate()
	{ 
		 
		$email = $this->input->post('email');
		$password = $this->input->post('pass');

		if (isset($email)) {

			$this->load->model('customer_model', 'customer');
			$password = base64_encode($password);
			$loggedInUser = $this->customer->authLogin($email, $password); 
			 
			if ($loggedInUser) {
				if ($loggedInUser->status == 'Inactive' || $loggedInUser->status == 'Blocked') {
					$response = array('type' => 'error', 'message' => 'Your account has been deactivated. Please contact your system administrator.');
				} else { 
					$sess_array = array(
						'id' => $loggedInUser->id							 
					);

					if ($this->session->flashdata('redirect')) {
						$url = base_url($this->session->flashdata('redirect'));
						$response = array('type' => 'success', 'message' => "Welcome " . $loggedInUser->name, 'url' => $url);
					} else { 
							$url = base_url('profile'); 
						$response = array('type' => 'success', 'message' => "Welcome " . $loggedInUser->name, 'url' => $url);
					}

					$this->session->set_userdata('customer', $sess_array);
				}
			} else {
				$response = array('type' => 'error', 'message' => 'Invalid username or password');
			}
		} else {
			$response = array('type' => 'error', 'message' => 'Invalid username or password');
		}

		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}
 


	public function register()
	{
		$this->load->model('customer_model', 'customer');
		$postdata = $this->input->post();
		$postdata['id']  = getCustomerID();
		$check_email_exist = $this->customer->isEmailExist($postdata['email'],$postdata['id']);
		if(!$check_email_exist){
			if(empty($postdata['id'])){
				if(!empty($postdata['pass'])){
					$postdata['pass'] = base64_encode($postdata['pass']);
				} 
				$id = $this->customer->add($postdata);
				if($id){
					$sess_array = array('id' => $id); 
					$this->session->set_userdata('customer', $sess_array);
					$url = base_url("profile");
					$response = array('type' => 'success', 'message' => 'You are registerd successfully!','url'=>$url);
				}
			}else{
				$where['id'] = $postdata['id'];
				$this->customer->update($postdata,$where);
				$url = base_url("profile");
				$response = array('type' => 'success', 'message' => 'Your details updated successfully!','url'=>$url);
			}
		}else{
			$response = array('type' => 'error', 'message' => 'You are already registerd with us, please login!');
		}
		
		$this->output->set_content_type('application/json')->set_output(json_encode($response));		 
		 
	}

	public function logout()
	{
		$this->session->unset_userdata('customer');
		//$this->session->sess_destroy();
		redirect(base_url('login')); 
	}
	
	public function saveRelation()
	{
		$this->load->model('customer_model', 'customer');
		$postdata = $this->input->post(); 
		$postdata['customer_id'] = getCustomerID();
		 
		if(empty($postdata['relation_id'])){ 
			unset($postdata['relation_id']);
			$id = $this->customer->add($postdata,'devotee');
			if($id){ 
				$response = array('type' => 'success', 'message' => 'Member registerd successfully!','url'=>$url);
			}else{
				$response = array('type' => 'error', 'message' => 'Could not process data!');
			}
		}else{
			$postdata['update_time'] = date("Y-m-d H:i:s");
			$where['customer_id'] = $postdata['customer_id'];
			$where['id'] = $postdata['relation_id'];
			unset($postdata['relation_id']);
			$this->customer->update($postdata,$where,'devotee');
			$response = array('type' => 'success', 'message' => 'Devotee details updated!');
		}
		
		$this->output->set_content_type('application/json')->set_output(json_encode($response));		 
		 
	}

	function changepassword(){
		$postdata = $this->input->post();
		if(!empty($postdata['pass'])){
			$this->load->model('customer_model', 'customer');
			$postdata['pass'] = base64_encode($postdata['pass']); 
			$postdata['id']  = getCustomerID();
			$where['id'] = $postdata['id'];
			$this->customer->update($postdata,$where); 
			$response = array('type' => 'success', 'message' => 'Your password changed successfully!');
		}else{
			$response = array('type' => 'error', 'message' => 'Could not process data!');
		}

		$this->output->set_content_type('application/json')->set_output(json_encode($response));	
	}
	
	function profile(){
		$this->_view_data['pageJs'] = array( 
			"frontend/js/validate.min.js" => "false",
			"frontend/js/bootbox.min.js" => "false",
			"frontend/js/register.js" => "false",
			"user/js/user/password.js" => "false" 
		);
		$this->_view_data['pageContent'] = 'user/profile';
		$this->load->view('user-template', $this->_view_data);
	}

	function family(){
		$this->load->model('customer_model', 'customer');
		$customer_id = getCustomerID(); 
		$customer = $this->customer->getUserData($customer_id);
		$devotees = $this->customer->getAllDevotee($customer_id);
		$this->_view_data['customer'] = $customer;
		$this->_view_data['devotees'] = $devotees;
		$this->_view_data['pageJs'] = array( 
			"frontend/js/validate.min.js" => "false",
			"frontend/js/bootbox.min.js" => "false", 
			"user/js/user/delete.js" => "false", 
		); 
		$this->_view_data['pageContent'] = 'user/devotee';
		$this->load->view('user-template', $this->_view_data);
	}

	function add_members($id=null){
		$this->load->model('customer_model', 'customer');
		$customer_id = getCustomerID();  
		$devotee = $this->customer->getDeviteeDetails($id,$customer_id); 
		$this->_view_data['devotee'] = $devotee;
		$this->_view_data['pageJs'] = array( 
			"frontend/js/validate.min.js" => "false",
			"frontend/js/bootbox.min.js" => "false",  
			"user/js/plugins/forms/selects/select2.min.js" => "false",
			"user/js/user/profile.js" => "false",
		); 
		$this->_view_data['pageContent'] = 'user/add_edit_devotee';
		$this->load->view('user-template', $this->_view_data);
	}

	function delete_devotee($id){
		$this->load->model('customer_model', 'customer');
		$data['id'] = $id;
		$data['customer_id'] = getCustomerID();  
		$delete  = $this->customer->deleteDevotee($data); 
		if($delete){
			$response = array('type' => 'success', 'message' => 'Member Deleted successfully!');
		}else{
			$response = array('type' => 'error', 'message' => 'Could not delete record!');
		}

		$this->output->set_content_type('application/json')->set_output(json_encode($response));	
		 
	}

	function orders(){
		$this->load->model('Orders_model', 'order');
		$customer_id = getCustomerID(); 
		$orders = $this->order->getAllOrdersByCustomerId($customer_id);  
		$this->_view_data['orders'] = $orders; 
		$this->_view_data['pageJs'] = array(); 
		$this->_view_data['pageContent'] = 'user/orders';
		$this->load->view('user-template', $this->_view_data);
	}

	function order_detail($id){

		$this->load->model('Orders_model', 'order');
		$customer_id = getCustomerID(); 
		$orders = $this->order->getAllOrdersByCustomerId($customer_id,$id);  
		if(empty($orders)){
			show_404();
		}
		$order = (!empty($orders[0])) ? $orders[0]:[];
		 
		$addons = $this->order->getAddOnOrder($order->id); 
		$devotees = $this->order->devoteeDetailOfOrder($order->devotees);  		 
		$this->_view_data['devotees'] = $devotees; 
		$this->_view_data['order'] = $order; 
		$this->_view_data['addons'] = $addons; 
		$this->_view_data['pageJs'] = array(); 
		$this->_view_data['pageContent'] = 'user/order_details';
		$this->load->view('user-template', $this->_view_data);
	}
}
