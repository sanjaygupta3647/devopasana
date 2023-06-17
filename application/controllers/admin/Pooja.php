<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pooja extends MY_Controller
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
		$id  = (int)$id;
		$this->_view_data['pagetitle'] = 'Add pooja';
		$pooja = [];
		if ($id) {
			$this->_view_data['pagetitle'] = 'Edit pooja ';
			$this->load->model('pooja_model', 'pooja');
			$pooja = $this->pooja->getDetail($id);
			$this->_view_data['pricelist'] = $this->pooja->getAllPriceList($id);
			 
		}
		$this->load->model('addon_model', 'addon');
		$this->_view_data['addons'] = $this->addon->getActiveAddon($id);  
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
			"admin/js/pooja/add-edit.js" => "false"


		);
		$this->_view_data['id'] = $id;
		$this->_view_data['pooja'] = $pooja;
		$this->_view_data['pageContent'] = 'admin/pooja/add';
		$this->load->view('admin-template', $this->_view_data);
	}
	
	
	public function allpoojas($postdata = null)
	{
		$allinputes = $this->input->get();

		$this->load->model('pooja_model', 'pooja');
		$sessData  = getSessionData(); 
		$allinputes['status'] = $status;
		 
		$poojas = $this->pooja->getAllDataForAdmin($allinputes);

		$i = 0;
		foreach ($poojas['alldata'] as $key => $val) {
			$dataArr[$i][] = $i + 1; 
			$sublink  = base_url("admin/pooja/add/" . $val->id);
			$link = '<a href="' . $sublink . '">' . $val->title . '</a>';

			$dataArr[$i][] = $link;
			 
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
		$response = array('draw' => $allinputes['draw'], 'recordsFiltered' => $poojas['count'], 'recordsTotal' => $poojas['count'], 'data' => $dataArr);
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}

	public function all($status = null)
	{ 
		$this->_view_data['pagetitle'] = 'All pooja'; 
		$this->_view_data['input'] = $this->input->get();

		$this->_view_data['pageCss'] = array("" => "true");
		$this->_view_data['pageJs'] = array(
			"admin/js/plugins/tables/datatables/datatables.min.js" => "false",
			"admin/js/plugins/tables/datatables/extensions/responsive.min.js" => "false",
			"admin/js/plugins/forms/selects/select2.min.js" => "false",
			"admin/js/pooja/list.js" => "false",
			"admin/js/bootbox.min.js" => "false"
		);
		$this->_view_data['pageContent'] = 'admin/pooja/list';
		$this->load->view('admin-template', $this->_view_data);
	}

	public function delete_pooja($id)
	{
		if (empty($id)) {
			$response = array('type' => 'error', 'message' => "Unable to delete record 'ID' meessing.", 'url' => $url);
		} else {
			$this->load->model('pooja_model', 'pooja');
			$return = $this->pooja->deleteRecord($id);
			$url = base_url('admin/pooja/all');
			if ($return) {
				$response = array('type' => 'success', 'message' => "Record deleted!", 'url' => $url);
			} else {
				$response = array('type' => 'error', 'message' => "Unable to delete record there could be a DB issue.", 'url' => $url);
			}
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}
	
	public function save_pooja_price(){
		$postdata = $this->input->post(); 
		$this->load->model('pooja_model', 'pooja');
		if(empty($postdata['id'])){
			unset($postdata['id']);
			$return = $this->pooja->addPoojaPrice($postdata);
		}else{
			$where["id"]= $postdata['id'];
			unset($postdata['id']);
			$return =$this->pooja->updatePoojaPrice($postdata, $where );
		}
		if ($return) {
			$response = array('type' => 'success', 'message' => "Price updated!");
		} else {
			$response = array('type' => 'error', 'message' => "Unable to delete record there could be a DB issue.");
		}
		
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}
	
	public function add_pooja()
	{
		$postdata = $this->input->post(); 
		$this->load->model('pooja_model', 'pooja');
		$check = $this->pooja->isExist($postdata['slug'], $postdata['id']);
		if (!$check) { 
			$user_id = current_user(); 
			$time = date("Y-m-d H:i:s");

			$inital_data = array(
					'title' => $postdata['title'],
					'slug' => $postdata['slug']
			);
			if (empty($postdata['id'])) {
				$inital_data['added_on'] = $time;
				$inital_data['created_by'] = $user_id;
				$inital_data['updated_by'] = $user_id;
				$id = $this->pooja->add($inital_data); 
				$postdata['id'] = $id;
			} 
			$postdata['path_to_upload'] = "pooja/".$postdata['id']; 
			
			$pooja_data = array(
				'title' => $postdata['title'],
				'slug' => $postdata['slug'],
				'meta_title' => $postdata['meta_title'],
				'meta_description' => $postdata['meta_description'], 
				'description' => $postdata['description'],
				'start_date' => ($postdata['start_date']) ? $postdata['start_date']:"1970-01-01",
				'end_date' => ($postdata['end_date']) ? $postdata['end_date']:"1970-01-01",
				'status' => $postdata['status'],
				'service_charge' => $postdata['service_charge'],
				'prasad_charge' => $postdata['prasad_charge'],
				'updated_on'=>$time
			);  

			if (!empty($postdata['addons'])) {
				$pooja_data['addons']  = implode(',', array_values($postdata['addons'])); 
			}
		
			if (!empty($_FILES['image']['name'])) {
				$postdata = uploadFile($_FILES, $postdata); 
				$pooja_data['image'] = $postdata['image'];
			} 
			 
			if (!empty($postdata['id'])){
				$where['id'] = $postdata['id'];
				$pooja_data['updated_by'] = $user_id;
				$id = $this->pooja->update($pooja_data, $where);
				$message = "Data Added/Updated Successfully!";
			} 

			if ($id) {
				$url = base_url('admin/pooja/all');
				$response = array('type' => 'success', 'message' => $message, 'url' => $url);
			} else {
				$response = array('type' => 'error', 'message' => "Unable to save data.", 'url' => $url);
			}
		} else {
			$response = array('type' => 'error', 'message' => $postdata['slug'] . " is already exist");
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}
	
	public function deleteprice($id)
	{
		if (empty($id)) {
			$response = array('type' => 'error', 'message' => "Unable to delete record 'ID' meessing.", 'url' => $url);
		} else {
			$this->load->model('pooja_model', 'pooja');
			$return = $this->pooja->deletePoojaPrice($id);
			$url = base_url('admin/pooja/all');
			if ($return) {
				$response = array('type' => 'success', 'message' => "Record deleted!", 'url' => $url);
			} else {
				$response = array('type' => 'error', 'message' => "Unable to delete record there could be a DB issue.", 'url' => $url);
			}
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}
}
