<?php
defined('BASEPATH') or exit('No direct script access allowed');

class divine extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		$session_data = $this->session->userdata('logged_in');
		$roleId = $session_data['role_id'];
		if ($roleId == 2) {
			show_404();
		}
	}

	public function add($id = null)
	{

		$this->_view_data['pagetitle'] = 'Add Category';
		$divine = [];
		if ($id) {
			$this->_view_data['pagetitle'] = 'Edit Category ';
			$this->load->model('divine_model', 'divine');
			$divine = $this->divine->getDetail($id);
		}
		$this->_view_data['pageCss'] = array("" => "true");
		$this->_view_data['pageJs'] = array(
			"admin/js/core/libraries/jquery_ui/core.min.js" => "false",
			"admin/js/plugins/forms/wizards/form_wizard/form.min.js" => "false",
			"admin/js/plugins/forms/wizards/form_wizard/form_wizard.min.js" => "false",
			"admin/js/plugins/forms/selects/select2.min.js" => "false",
			"admin/js/plugins/forms/styling/uniform.min.js" => "false",
			"admin/js/core/libraries/jasny_bootstrap.min.js" => "false",
			"admin/js/plugins/forms/validation/validate.min.js" => "false",
			"admin/js/bootbox.min.js" => "false",
			"admin/js/divine/add-edit.js" => "false"


		);
		$this->_view_data['id'] = $id;
		$this->_view_data['divine'] = $divine;
		$this->_view_data['pageContent'] = 'admin/divine/add';
		$this->load->view('admin-template', $this->_view_data);
	}

	public function all()
	{
		$this->load->model('divine_model', 'divine');

		$divines = $this->divine->getAll();
		 
		$this->_view_data['divines'] = $divines;

		$this->_view_data['pagetitle'] = 'Divine list';
		$this->_view_data['pageCss'] = array("" => "true");
		$this->_view_data['pageJs'] = array(
			"admin/js/plugins/tables/datatables/datatables.min.js" => "false",
			"admin/js/plugins/tables/datatables/extensions/responsive.min.js" => "false",
			"admin/js/plugins/forms/selects/select2.min.js" => "false",
			"admin/js/divine/datatables_responsive.js" => "false",
			"admin/js/bootbox.min.js" => "false",
			"admin/js/divine/delete.js" => "false"
		);
		$this->_view_data['pageContent'] = 'admin/divine/list';
		$this->load->view('admin-template', $this->_view_data);
	}

	public function delete_divine($id)
	{
		if (empty($id)) {
			$response = array('type' => 'error', 'message' => "Unable to delete record 'ID' meessing.", 'url' => $url);
		} else {
			$this->load->model('divine_model', 'divine');
			$return = $this->divine->deleteRecord($id);
			$url = base_url('admin/divine/all');
			if ($return) {
				$response = array('type' => 'success', 'message' => "Record deleted!", 'url' => $url);
			} else {
				$response = array('type' => 'error', 'message' => "Unable to delete record there could be a DB issue.", 'url' => $url);
			}
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}

	public function add_divine()
	{
		$postdata = $this->input->post();
		$this->load->model('divine_model', 'divine');
		$check = $this->divine->isExist($postdata['title'], $postdata['id']);
		$user_id = current_user();
		$postdata['slug'] = slugify($postdata['title']);
		if (!$check) {
			 
			if (!empty($_FILES)) {
				$postdata = uploadFile($_FILES, $postdata);
				//echo "in files"; p($postdata);
			}
			//p($postdata);
			unset($postdata['path_to_upload']);
			if (empty($postdata['id'])) {
				$postdata['created_by'] = $user_id;
				$postdata['updated_by'] = $user_id;
				$id = $this->divine->add($postdata);
				$message = "Data Added Successfully!";
			} else {
				$where['id'] = $postdata['id'];
				$postdata['updated_by'] = $user_id;
				$id = $this->divine->update($postdata, $where);
				$message = "Data Updated Successfully!";
			}

			if ($id) {
				$url = base_url('admin/divine/all');
				$response = array('type' => 'success', 'message' => $message, 'url' => $url);
			} else {
				$response = array('type' => 'error', 'message' => "Unable to save data.", 'url' => $url);
			}
		} else {
			$response = array('type' => 'error', 'message' => $postdata['title'] . " is already exist");
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}
}
