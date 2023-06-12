<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Faq extends MY_Controller
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

		$this->_view_data['pagetitle'] = 'Add faq';
		$this->load->model('campaign_model', 'campaign'); 
		$campaigns = $this->campaign->getActiveCampaign(); 
		$faq = array();
		if ($id) {
			$this->load->model('Faq_model', 'faq');
			$faq = $this->faq->getDetail($id);
			$this->_view_data['pagetitle'] = 'Edit faq';
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
			"admin/js/faq/add-edit.js" => "false"


		);
		$this->_view_data['id'] = $id;
		$this->_view_data['campaigns'] = $campaigns;
		$this->_view_data['faq'] = $faq;
		$this->_view_data['pageContent'] = 'admin/faq/add';
		$this->load->view('admin-template', $this->_view_data);
	}

	public function all()
	{
		$this->load->model('faq_model', 'faq');

		$faqs = $this->faq->getAll();
		$this->_view_data['faqs'] = $faqs;

		$this->_view_data['pagetitle'] = 'Faq list';
		$this->_view_data['pageCss'] = array("" => "true");
		$this->_view_data['pageJs'] = array(
			"admin/js/plugins/tables/datatables/datatables.min.js" => "false",
			"admin/js/plugins/tables/datatables/extensions/responsive.min.js" => "false",
			"admin/js/plugins/forms/selects/select2.min.js" => "false",
			"admin/js/faq/list.js" => "false",
			"admin/js/bootbox.min.js" => "false",
			"admin/js/faq/delete.js" => "false"
		);
		$this->_view_data['pageContent'] = 'admin/faq/list';
		$this->load->view('admin-template', $this->_view_data);
	}

	public function delete_faq($id)
	{
		if (empty($id)) {
			$response = array('type' => 'error', 'message' => "Unable to delete record 'ID' meessing.", 'url' => $url);
		} else {
			$this->load->model('faq_model', 'faq');
			$return = $this->faq->deleteRecord($id);
			$url = base_url('admin/faq/all');
			if ($return) {
				$response = array('type' => 'success', 'message' => "Record deleted!", 'url' => $url);
			} else {
				$response = array('type' => 'success', 'message' => "Unable to delete record there could be a DB issue.", 'url' => $url);
			}
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}

	public function add_faq()
	{
		$postdata = $this->input->post();
		$this->load->model('faq_model', 'faq');

		$user_id = current_user();
		$currrent_ts = current_ts();
		$postdata['slug'] = slugify($postdata['subject']);
		if (empty($postdata['id'])) {
			$postdata['created_by'] = $user_id;
			$postdata['created_at'] = $currrent_ts;
			$postdata['updated_by'] = $user_id;
			$postdata['updated_at'] = $currrent_ts;
			$id = $this->faq->add($postdata);
			$message = "Data Added Successfully!";
		} else {
			$where['id'] = $postdata['id'];
			$postdata['updated_by'] = $user_id;
			$postdata['updated_at'] = $currrent_ts;
			$id = $this->faq->update($postdata, $where);
			$message = "Data Updated Successfully!";
		}

		if ($id) {
			$url = base_url('admin/faq/all');
			$response = array('type' => 'success', 'message' => $message, 'url' => $url);
		} else {
			$response = array('type' => 'error', 'message' => "Unable to save data.", 'url' => $url);
		}

		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}
}
