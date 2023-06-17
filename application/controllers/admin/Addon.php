<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Addon extends MY_Controller
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
		ini_set('display_errors', '1');
		ini_set('display_startup_errors', '1');
		error_reporting(E_ALL);
		$id  = (int)$id;
		$this->_view_data['pagetitle'] = 'Add addon';
		$addon = [];
		if ($id) {
			$this->_view_data['pagetitle'] = 'Edit addon ';
			$this->load->model('addon_model', 'addon');
			$addon = $this->addon->getDetail($id); 
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
			"admin/js/addon/add-edit.js" => "false"
		);
		$this->_view_data['id'] = $id;
		$this->_view_data['addon'] = $addon;
		$this->_view_data['pageContent'] = 'admin/addon/add'; 
		$this->load->view('admin-template', $this->_view_data);
	}
	
	
	public function alldata($postdata = null)
	{
		$allinputes = $this->input->get();

		$this->load->model('addon_model', 'addon');
		$sessData  = getSessionData(); 
		$allinputes['status'] = $status;
		 
		$addons = $this->addon->getAllDataForAdmin($allinputes);

		$i = 0;
		foreach ($addons['alldata'] as $key => $val) {
			$dataArr[$i][] = $i + 1; 
			$sublink  = base_url("admin/addon/add/" . $val->id);
			$link = '<a href="' . $sublink . '">' . $val->title . '</a>';

			$dataArr[$i][] = $link; 
			$dataArr[$i][] = showprice($val->price); 
			$dataArr[$i][] = userDateTimeFormat($val->added_on); 
			$dataArr[$i][] = $val->status; 
			 
			$action =  '<ul class="text-center icons-list"><li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu9"></i></a>';
			$action .= '<ul class="dropdown-menu dropdown-menu-right">';
			$link1 = '<li><a  href="'.$sublink.'"><i class="icon-database-edit2"></i>Update</a></li>';
			$link2 = '<li><a class="delete" data-id="' . $val->id . '"   href="javascript:void(0)"><i class="icon-database-remove"></i>Delete</a></li>';
			 
			$action .= $link1 . $link2. '</ul></li></ul>'; 
			$dataArr[$i][] = $action;

			$i++;
		}
		if (empty($dataArr)) {
			$dataArr = [];
		}
		$response = array('draw' => $allinputes['draw'], 'recordsFiltered' => $addons['count'], 'recordsTotal' => $addons['count'], 'data' => $dataArr);
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}

	public function all($status = null)
	{ 
		$this->_view_data['pagetitle'] = 'All addon'; 
		$this->_view_data['input'] = $this->input->get();

		$this->_view_data['pageCss'] = array("" => "true");
		$this->_view_data['pageJs'] = array(
			"admin/js/plugins/tables/datatables/datatables.min.js" => "false",
			"admin/js/plugins/tables/datatables/extensions/responsive.min.js" => "false",
			"admin/js/plugins/forms/selects/select2.min.js" => "false",
			"admin/js/bootbox.min.js" => "false",
			"admin/js/addon/list.js" => "false"
			
		);
		$this->_view_data['pageContent'] = 'admin/addon/list';
		$this->load->view('admin-template', $this->_view_data);
	}

	public function delete_addon($id)
	{
		if (empty($id)) {
			$response = array('type' => 'error', 'message' => "Unable to delete record 'ID' meessing.", 'url' => $url);
		} else {
			$this->load->model('addon_model', 'addon');
			$return = $this->addon->deleteRecord($id);
			$url = base_url('admin/addon/all');
			if ($return) {
				$response = array('type' => 'success', 'message' => "Record deleted!", 'url' => $url);
			} else {
				$response = array('type' => 'error', 'message' => "Unable to delete record there could be a DB issue.", 'url' => $url);
			}
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}
	
	 
	
	public function add_addon()
	{
		$postdata = $this->input->post(); 
		$this->load->model('addon_model', 'addon');
		$check = $this->addon->isExist($postdata['title'], $postdata['id']);
		if (!$check) { 
			$user_id = current_user(); 
			$time = date("Y-m-d H:i:s");

			$inital_data = array(
					'title' => $postdata['title']					 
			);
			if (empty($postdata['id'])) {
				$inital_data['added_on'] = $time;
				$inital_data['created_by'] = $user_id;
				$inital_data['updated_by'] = $user_id;
				$id = $this->addon->add($inital_data); 
				$postdata['id'] = $id;
			} 
			$postdata['path_to_upload'] = "addon/".$postdata['id']; 
			$addon_data = array(
				'title' => $postdata['title'], 
				'status' => $postdata['status'],
				'price' => $postdata['price'],				 
				'updated_on'=>$time
			);  
		
			if (!empty($_FILES['image']['name'])) {
				$postdata = uploadFile($_FILES, $postdata); 
				$addon_data['image'] = $postdata['image'];
			} 
			 
			if (!empty($postdata['id'])){
				$where['id'] = $postdata['id'];
				$addon_data['updated_by'] = $user_id;
				$id = $this->addon->update($addon_data, $where);
				$message = "Data Added/Updated Successfully!";
			} 

			if ($id) {
				$url = base_url('admin/addon/all');
				$response = array('type' => 'success', 'message' => $message, 'url' => $url);
			} else {
				$response = array('type' => 'error', 'message' => "Unable to save data.", 'url' => $url);
			}
		} else {
			$response = array('type' => 'error', 'message' => $postdata['title'] . " is already exist");
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}
	
	public function delete($id)
	{
		if (empty($id)) {
			$response = array('type' => 'error', 'message' => "Unable to delete record 'ID' meessing.", 'url' => $url);
		} else {
			$this->load->model('addon_model', 'addon');
			$return = $this->addon->deleteaddon($id);
			$url = base_url('admin/addon/all');
			if ($return) {
				$response = array('type' => 'success', 'message' => "Record deleted!", 'url' => $url);
			} else {
				$response = array('type' => 'error', 'message' => "Unable to delete record there could be a DB issue.", 'url' => $url);
			}
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}
}
