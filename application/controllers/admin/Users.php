<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends MY_Controller
{
	public function add($id = null)
	{
		restrictAdminAccess();
		$this->_view_data['pagetitle'] = 'Add User';
		$this->load->model('Users_model', 'user');
		 

		if ($id) {
			$this->_view_data['pagetitle'] = 'Edit User ';

			$this->_view_data['user_basic']   = $this->user->getUserInfo($id);
			$this->_view_data['user_details'] = $this->user->getDetail($id);
		}

		$this->_view_data['roles'] = $this->user->getAllRoles();
		 

		$this->_view_data['pageCss'] = array("" => "true");
		$this->_view_data['pageJs'] = array(
			"admin/js/core/libraries/jquery_ui/core.min.js" => "false",
			//"admin/js/plugins/forms/wizards/form_wizard/form.min.js" => "false",
			"admin/js/plugins/forms/wizards/form_wizard/form_wizard.min.js" => "false",
			"admin/js/plugins/forms/selects/select2.min.js" => "false",
			//"admin/js/plugins/forms/styling/uniform.min.js" => "false",
			//"admin/js/core/libraries/jasny_bootstrap.min.js" => "false",
			"admin/js/plugins/forms/validation/validate.min.js" => "false",
			"admin/js/bootbox.min.js" => "false",
			"admin/js/user/add-edit.js" => "false"


		);
		$this->_view_data['id'] = $id;
		$this->_view_data['pageContent'] = 'admin/user/add';
		$this->load->view('admin-template', $this->_view_data);
	}

	public function all()
	{

		restrictAdminAccess();
		$this->_view_data['pagetitle'] = 'User list';
		$this->_view_data['pageCss'] = array("" => "true");
		$this->_view_data['pageJs'] = array(
			"admin/js/plugins/tables/datatables/datatables.min.js" => "false",
			"admin/js/plugins/tables/datatables/extensions/responsive.min.js" => "false",
			"admin/js/plugins/forms/selects/select2.min.js" => "false",
			"admin/js/user/datatables_responsive.js" => "false",
			"admin/js/user/password.js" => "false",
			"admin/js/bootbox.min.js" => "false",
			"admin/js/plugins/forms/validation/validate.min.js" => "false",
			"admin/js/user/delete.js" => "false"
		);
		$this->_view_data['pageContent'] = 'admin/user/list';
		$this->load->view('admin-template', $this->_view_data);
	}

	public function allusers($postdata = null)
	{
		$allinputes = $this->input->get();

		$this->load->model('Users_model', 'user');

		$users = $this->user->getAllForPagination($allinputes);


		$i = 0;
		foreach ($users['alldata'] as $key => $val) {
			$dataArr[$i][] = $i + 1;

			$sublink  = base_url("admin/users/add/" . $val->id);
			$link = '<a href="' . $sublink . '" >' . $val->username . '</a>';

			$dataArr[$i][] = $link;
			$dataArr[$i][] = $val->name;
			$dataArr[$i][] = $val->fname . ' ' . $val->lname;
			$dataArr[$i][] = $val->email;
			$class = ($val->status == "ACTIVE") ? "success" : "danger";
			$dataArr[$i][] = '<span class="label label-' . $class . '">' . $val->status . '</span>';
			$dataArr[$i][] = db2userDate($val->created_at);

			$action =  '<ul class="text-center icons-list"><li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu9"></i></a>';
			$action .= '<ul class="dropdown-menu dropdown-menu-right">';
			$link1 = '<li><a href="' . base_url("admin/users/add/" . $val->id) . '"><i class="icon-pencil7"></i>Update Profile</a></li>';
			$link2 = '<li><a href="javascript:void(0)" class="updatepassword" data-id="' . $val->id . '" data-username="' . $val->username . '"><i class="icon-database-edit2"></i>Change Password</a></li>';
			$link3 = '<li><a href="javascript:void(0)" class="delete" data-id="' . $val->id . '"><i class="icon-bin"></i>Delete User</a></li>';
			$action .= $link1 . $link2 . $link3 . '</ul></li></ul>';

			$dataArr[$i][] = $action;

			$i++;
		}
		if (empty($dataArr)) {
			$dataArr = [];
		}
		$response = array('draw' => $allinputes['draw'], 'recordsFiltered' => $users['count'], 'recordsTotal' => $users['count'], 'data' => $dataArr);
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}

	public function delete_user($id)
	{
		restrictAdminAccess();
		if (empty($id)) {
			$response = array('type' => 'error', 'message' => "Unable to delete record 'ID' meessing.", 'url' => $url);
		} else {
			$this->load->model('Users_model', 'user');
			$image = $this->user->getProfileImage($id);
			if (!empty($image)) {
				unlink("./uploads/profile/" . $image);
			}
			$return = $this->user->deleteDetails($id);
			if ($return) {
				$return = $this->user->deleteBasic($id);
			}

			$url = base_url('admin/users/all');
			if ($return) {
				$response = array('type' => 'success', 'message' => "Record deleted!", 'url' => $url);
			} else {
				$response = array('type' => 'success', 'message' => "Unable to delete record there could be a DB issue.", 'url' => $url);
			}
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}

	public function changepassword()
	{
		$postdata = $this->input->post();

		$user_basic['pass'] = md5(SALT_CONSTANT . $postdata['password']);
		$session_data = $this->session->userdata('logged_in');
		$user_id = $session_data['user_id'];
		$user_basic['updated_by'] = $user_id;
		$user_basic['updated_at'] = current_ts();
		$where['id'] = $postdata['id'];
		$where['username'] = $postdata['username'];
		$this->load->model('Users_model', 'user');
		$id = $this->user->updateUser($user_basic, $where);
		if ($id) {
			$message = "Password have been changed!";
			$url = base_url('admin/users/all');
			$response = array('type' => 'success', 'message' => $message, 'url' => $url);
		} else {
			$response = array('type' => 'error', 'message' => "Unable to save data.", 'url' => $url);
		}

		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}

	public function addUser()
	{
		//$this->load->library('upload');
		$postdata = $this->input->post();
		$this->load->model('Users_model', 'user');
		$check = $this->user->isExist($postdata['username'], $postdata['id']);
		$emailCheck = $this->user->isEmailExist($postdata['email'], $postdata['id']);
		$checkpass = true;
		if ($check) {
			$response = array('type' => 'error', 'message' => $postdata['username'] . " is already exist");
			$checkpass = false;
		}
		if ($emailCheck) {
			$response = array('type' => 'error', 'message' => $postdata['email'] . " is already exist");
			$checkpass = false;
		}


		if ($checkpass) {

			if (!empty($_FILES)) {
				$postdata = uploadFile($_FILES, $postdata);
			}

			$user_id = current_user();



			$user_basic = array(
				'updated_by' => $user_id,
				'updated_at' => current_ts()
			);
			if ($postdata['username']) {
				$user_basic['username'] = $postdata['username'];
			} 

			if ($postdata['status']) {
				$user_basic['status'] = $postdata['status'];
			}
			if ($postdata['role_id']) {
				$user_basic['role_id'] = $postdata['role_id'];
			}

			$user_details = array(
				'fname' => $postdata['fname'],
				'lname' => $postdata['lname'],
				'email' => $postdata['email'],
				'address' => $postdata['address'],
				'city' => $postdata['city'],
				'state' => $postdata['state'],
				'country' => $postdata['country'],
				'pincode' => $postdata['pincode']
			);

			if (!empty($postdata['profile_pic'])) {
				$user_details['profile_pic'] = $postdata['profile_pic'];
			}





			if (empty($postdata['id'])) {
				$user_basic['created_by'] = $user_id;
				$user_basic['created_at'] = current_ts();
				$user_basic['pass'] = md5(SALT_CONSTANT . $postdata['password']);
				$id = $this->user->add($user_basic);
				$user_details['user_id'] = $id;
				$detail_id = $this->user->addDetails($user_details);
				$message = "User Added Successfully!";
			} else {
				$where['id'] = $postdata['id'];
				$id = $this->user->updateUser($user_basic, $where);
				$where_details['user_id'] = $postdata['id'];
				$id = $this->user->updateUserDetails($user_details, $where_details);
				$message = "Data Updated Successfully!";
			}

			if ($id) {
				$url = base_url('admin/users/all');
				$response = array('type' => 'success', 'message' => $message, 'url' => $url);
			} else {
				$response = array('type' => 'error', 'message' => "Unable to save data.", 'url' => $url);
			}
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}

	public function profile()
	{

		$this->_view_data['pagetitle'] = 'Manage Profile';
		$this->load->model('Users_model', 'user'); 
		$id = current_user();
		 
		if ($id) {
			$this->_view_data['pagetitle'] = 'Edit User ';
			$this->_view_data['user_basic']   = $this->user->getUserInfo($id);
			$this->_view_data['user_details'] = $this->user->getDetail($id);
		}

		$this->_view_data['roles'] = $this->user->getAllRoles(); 
		$this->_view_data['pageCss'] = array("" => "true");
		$this->_view_data['pageJs'] = array(
			"admin/js/core/libraries/jquery_ui/core.min.js" => "false",
			"admin/js/plugins/forms/wizards/form_wizard/form_wizard.min.js" => "false",
			"admin/js/plugins/forms/selects/select2.min.js" => "false",
			"admin/js/plugins/forms/validation/validate.min.js" => "false",
			"admin/js/bootbox.min.js" => "false",
			"admin/js/user/password.js" => "false",
			"admin/js/user/add-edit.js" => "false"


		);
		$this->_view_data['id'] = $id;
		$this->_view_data['pageContent'] = 'admin/user/profile';
		$this->load->view('admin-template', $this->_view_data);
	}
}
