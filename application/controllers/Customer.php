<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customer extends CI_Controller
{ 

	public function login()
	{ 
		// authenticate
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
		
		$check_email_exist = $this->customer->isEmailExist($postdata['email']);
		if(!$check_email_exist){
			$postdata['pass'] = base64_encode($postdata['pass']);
			$id = $this->customer->add($postdata);
			if($id){
				$sess_array = array('id' => $id); 
				$this->session->set_userdata('customer', $sess_array);
				$url = base_url("profile");
				$response = array('type' => 'success', 'message' => 'Customer registerd successfully!','url'=>$url);
			}
		}else{
			$response = array('type' => 'error', 'message' => 'You are already registerd with us, please login!');
		}
		
		$this->output->set_content_type('application/json')->set_output(json_encode($response));		 
		 
	}

	public function logout()
	{
		$this->session->unset_userdata('customer');
		$this->session->sess_destroy();
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
				$response = array('type' => 'success', 'message' => 'Devotee registerd successfully!','url'=>$url);
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
}
