<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Campaign extends MY_Controller
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

		$this->_view_data['pagetitle'] = 'Add campaign';
		$campaign = [];
		if ($id) {
			$this->_view_data['pagetitle'] = 'Edit campaign ';
			$this->load->model('campaign_model', 'campaign');
			$campaign = $this->campaign->getDetail($id);
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
			"admin/js/plugins/editors/summernote/summernote.min.js" => "false",
			"admin/js/bootbox.min.js" => "false",
			"admin/js/campaign/add-edit.js" => "false"


		);
		$this->_view_data['id'] = $id;
		$this->_view_data['campaign'] = $campaign;
		$this->_view_data['pageContent'] = 'admin/campaign/add';
		$this->load->view('admin-template', $this->_view_data);
	}
	
	
	public function allcampaigns($postdata = null)
	{
		$allinputes = $this->input->get();

		$this->load->model('campaign_model', 'campaign');
		$sessData  = getSessionData(); 
		$allinputes['status'] = $status;
		 
		$campaigns = $this->campaign->getAllDataForAdmin($allinputes);

		$i = 0;
		foreach ($campaigns['alldata'] as $key => $val) {
			$dataArr[$i][] = $i + 1; 
			$sublink  = base_url("admin/campaign/add/" . $val->id);
			$link = '<a href="' . $sublink . '">' . $val->title . '</a>';

			$dataArr[$i][] = $link;
			$dataArr[$i][] = "Rs.". number_format($val->target);
			$dataArr[$i][] = userDateFormat($val->start_date);
			$dataArr[$i][] = userDateFormat($val->end_date);
			$dataArr[$i][] = userDateTimeFormat($val->added_on); 
			$dataArr[$i][] = $val->status; 
			 
			$action =  '<ul class="text-center icons-list"><li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu9"></i></a>';
			$action .= '<ul class="dropdown-menu dropdown-menu-right">';
			$link1 = '<li><a  href="'.$sublink.'"><i class="icon-database-edit2"></i>Update</a></li>';
			$link2 = '<li><a class="delete" data-id="' . $val->id . '" data-closed_by="' . current_user() . '" data-close_time="' . db_date_time() . '" href="javascript:void(0)"><i class="icon-database-remove"></i>Delete</a></li>';
			 
			$action .= $link1 . $link2. '</ul></li></ul>'; 
			$dataArr[$i][] = $action;

			$i++;
		}
		if (empty($dataArr)) {
			$dataArr = [];
		}
		$response = array('draw' => $allinputes['draw'], 'recordsFiltered' => $campaigns['count'], 'recordsTotal' => $campaigns['count'], 'data' => $dataArr);
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}

	public function all($status = null)
	{ 
		$this->_view_data['pagetitle'] = 'All Campaign'; 
		$this->_view_data['input'] = $this->input->get();

		$this->_view_data['pageCss'] = array("" => "true");
		$this->_view_data['pageJs'] = array(
			"admin/js/plugins/tables/datatables/datatables.min.js" => "false",
			"admin/js/plugins/tables/datatables/extensions/responsive.min.js" => "false",
			"admin/js/plugins/forms/selects/select2.min.js" => "false",
			"admin/js/campaign/list.js" => "false",
			"admin/js/bootbox.min.js" => "false"
		);
		$this->_view_data['pageContent'] = 'admin/campaign/list';
		$this->load->view('admin-template', $this->_view_data);
	}

	public function delete_campaign($id)
	{
		if (empty($id)) {
			$response = array('type' => 'error', 'message' => "Unable to delete record 'ID' meessing.", 'url' => $url);
		} else {
			$this->load->model('campaign_model', 'campaign');
			$return = $this->campaign->deleteRecord($id);
			$url = base_url('admin/campaign/all');
			if ($return) {
				$response = array('type' => 'success', 'message' => "Record deleted!", 'url' => $url);
			} else {
				$response = array('type' => 'error', 'message' => "Unable to delete record there could be a DB issue.", 'url' => $url);
			}
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}

	public function add_campaign()
	{
		$postdata = $this->input->post();
		$postdata['path_to_upload'] = "campaign";
		 
		$this->load->model('campaign_model', 'campaign');
		$check = $this->campaign->isExist($postdata['slug'], $postdata['id']);
		$user_id = current_user(); 
		$time = date("Y-m-d H:i:s");
		
		$campaign_data = array(
			'title' => $postdata['title'],
			'slug' => $postdata['slug'],
			'meta_title' => $postdata['meta_title'],
			'meta_description' => $postdata['meta_description'],
			'target' => $postdata['target'],
			'description' => $postdata['description'],
			'start_date' => $postdata['start_date'],
			'end_date' => $postdata['end_date'],
			'status' => $postdata['status'],
			'updated_on'=>$time
		);
		
		
		
		if (!$check) { 
		
			if (!empty($_FILES['image']['name'])) {
				$postdata = uploadFile($_FILES, $postdata); 
				$campaign_data['image'] = $postdata['image'];
			} 
			 
			if (empty($postdata['id'])) {
				$campaign_data['added_on'] = $time;
				$campaign_data['created_by'] = $user_id;
				$campaign_data['updated_by'] = $user_id;
				$id = $this->campaign->add($campaign_data);
				$message = "Data Added Successfully!";
			} else {
				$where['id'] = $postdata['id'];
				$campaign_data['updated_by'] = $user_id;
				$id = $this->campaign->update($campaign_data, $where);
				$message = "Data Updated Successfully!";
			} 

			if ($id) {
				$url = base_url('admin/campaign/all');
				$response = array('type' => 'success', 'message' => $message, 'url' => $url);
			} else {
				$response = array('type' => 'error', 'message' => "Unable to save data.", 'url' => $url);
			}
		} else {
			$response = array('type' => 'error', 'message' => $postdata['slug'] . " is already exist");
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}
}
