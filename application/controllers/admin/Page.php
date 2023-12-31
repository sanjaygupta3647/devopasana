<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Page extends MY_Controller
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

		$this->_view_data['pagetitle'] = 'Add Page';
		$this->load->model('divine_model', 'divine');
		$this->_view_data['category'] = $this->divine->getActivedivine_category(); 
		$page = array();
		if ($id) {
			$this->load->model('page_model', 'page');
			$page = $this->page->getDetail($id);
			$this->_view_data['pagetitle'] = 'Edit page';
		}

		$this->_view_data['pageCss'] = array("" => "true");
		$this->_view_data['pageJs'] = array(
			"admin/js/core/libraries/jquery_ui/core.min.js" => "false",
			"admin/js/plugins/forms/wizards/form_wizard/form.min.js" => "false",
			"admin/js/plugins/forms/wizards/form_wizard/form_wizard.min.js" => "false",
			"admin/js/plugins/forms/selects/select2.min.js" => "false",
			"admin/js/plugins/forms/styling/uniform.min.js" => "false",
			"admin/js/core/libraries/jasny_bootstrap.min.js" => "false",
			"admin/js/plugins/editors/summernote/summernote.min.js" => "false",
			"admin/js/plugins/forms/validation/validate.min.js" => "false",
			"admin/js/bootbox.min.js" => "false",
			"admin/js/page/add-edit.js" => "false"


		);
		$this->_view_data['id'] = $id;

		$this->_view_data['page'] = $page;
		$this->_view_data['pageContent'] = 'admin/page/add';
		$this->load->view('admin-template', $this->_view_data);
	}

	public function all()
	{
		$this->load->model('page_model', 'page');

		$pages = $this->page->getAll();
		$this->_view_data['pages'] = $pages;

		$this->_view_data['pagetitle'] = 'Page list';
		$this->_view_data['pageCss'] = array("" => "true");
		$this->_view_data['pageJs'] = array(
			"admin/js/plugins/tables/datatables/datatables.min.js" => "false",
			"admin/js/plugins/tables/datatables/extensions/responsive.min.js" => "false",
			"admin/js/plugins/forms/selects/select2.min.js" => "false",
			"admin/js/page/list.js" => "false",
			"admin/js/bootbox.min.js" => "false",
			"admin/js/page/delete.js" => "false"
		);
		$this->_view_data['pageContent'] = 'admin/page/list';
		$this->load->view('admin-template', $this->_view_data);
	}

	public function delete_page($id)
	{
		if (empty($id)) {
			$response = array('type' => 'error', 'message' => "Unable to delete record 'ID' meessing.", 'url' => $url);
		} else {
			$this->load->model('page_model', 'page');
			$return = $this->page->deleteRecord($id);
			$url = base_url('admin/page/all');
			if ($return) {
				$response = array('type' => 'success', 'message' => "Record deleted!", 'url' => $url);
			} else {
				$response = array('type' => 'success', 'message' => "Unable to delete record there could be a DB issue.", 'url' => $url);
			}
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}

	public function add_page()
	{
		$postdata = $this->input->post();
		$this->load->model('page_model', 'page');

		$user_id = current_user();
		$currrent_ts = current_ts();
		$postdata['slug'] = slugify($postdata['title']);

		if (!empty($_FILES)) {
			$subpath = date("Y")."/".date("m");
			$postdata['path_to_upload'] = "divine_post/".$subpath;
			$postdata = uploadFile($_FILES, $postdata); 
			if(!empty($postdata['img'])){
				$postdata['img'] = $subpath."/".$postdata['img'];
			}
			
			unset($postdata['path_to_upload']);
		}
		if (empty($postdata['id'])) {
			$postdata['created_by'] = $user_id;
			$postdata['created_at'] = $currrent_ts;
			$postdata['updated_by'] = $user_id;
			$postdata['updated_at'] = $currrent_ts;
			$id = $this->page->add($postdata);
			$message = "Data Added Successfully!";
		} else {
			$where['id'] = $postdata['id'];
			$postdata['updated_by'] = $user_id;
			$postdata['updated_at'] = $currrent_ts;
			$id = $this->page->update($postdata, $where);
			$message = "Data Updated Successfully!";
		}

		if ($id) {
			$url = base_url('admin/page/all');
			$response = array('type' => 'success', 'message' => $message, 'url' => $url);
		} else {
			$response = array('type' => 'error', 'message' => "Unable to save data.", 'url' => $url);
		}

		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}
}
