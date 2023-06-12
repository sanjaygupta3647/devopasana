<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ticket extends MY_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function detail($id = null)
	{

		$this->_view_data['pagetitle'] = 'Ticket Details';
		$data = array();
		if (!empty($id)) {
			$this->load->model('ticket_model', 'ticket');
			$data = $this->ticket->getDetail($id);
		} else {
			show_404();
		}

		$reply = $this->ticket->getAllReply($id);

		$this->_view_data['pageCss'] = array("" => "true");
		$this->_view_data['pageJs'] = array(
			"js/core/libraries/jquery_ui/core.min.js" => "false",
			"js/plugins/forms/wizards/form_wizard/form.min.js" => "false",
			"js/plugins/forms/wizards/form_wizard/form_wizard.min.js" => "false",
			"js/plugins/forms/selects/select2.min.js" => "false",
			"js/plugins/forms/styling/uniform.min.js" => "false",
			"js/core/libraries/jasny_bootstrap.min.js" => "false",
			"js/plugins/editors/summernote/summernote.min.js" => "false",
			"js/plugins/forms/validation/validate.min.js" => "false",
			"js/bootbox.min.js" => "false",
			"js/admin/ticket/detail.js" => "false",
			"js/admin/ticket/list.js" => "false"


		);
		$this->_view_data['id'] = $id;
		$this->_view_data['data'] = $data;
		$this->_view_data['reply'] = $reply;
		$this->_view_data['pageContent'] = 'admin/ticket/detail';
		$this->load->view('admin-template', $this->_view_data);
	}

	public function index($status = null)
	{

		$this->load->model('department_model', 'department');
		$sessData  = getSessionData();
		$user_departments = $this->department->getAll(array('status' => 'Active', 'department_ids' => $sessData['department_ids']));


		$this->_view_data['pagetitle'] = 'All Tickets';

		$this->_view_data['user_departments'] = $user_departments;

		$this->_view_data['input'] = $this->input->get();

		$this->_view_data['pageCss'] = array("" => "true");
		$this->_view_data['pageJs'] = array(
			"js/plugins/tables/datatables/datatables.min.js" => "false",
			"js/plugins/tables/datatables/extensions/responsive.min.js" => "false",
			"js/plugins/forms/selects/select2.min.js" => "false",
			"js/admin/ticket/list.js" => "false",
			"js/bootbox.min.js" => "false"
		);
		$this->_view_data['pageContent'] = 'admin/ticket/list';
		$this->load->view('admin-template', $this->_view_data);
	}

	public function alltickets($postdata = null)
	{
		$allinputes = $this->input->get();

		$this->load->model('ticket_model', 'ticket');
		$sessData  = getSessionData();

		$allinputes['status'] = $status;
		$allinputes['department_ids'] = $sessData['department_ids'];
		$tickets = $this->ticket->getAllDataForAdmin($allinputes);

		$i = 0;
		foreach ($tickets['alldata'] as $key => $val) {
			$dataArr[$i][] = $i + 1;
			$dataArr[$i][] = $val->title;
			$getClass = ($val->status == 'Closed') ? 'linethrough' : '';
			$sublink  = base_url("admin/ticket/detail/" . $val->id);
			$link = '<a href="' . $sublink . '" class="' . $getClass . '">' . $val->subject . '</a>';

			$dataArr[$i][] = $link;
			$dataArr[$i][] = $val->username;
			$dataArr[$i][] = userDateFormat($val->create_time);
			$info = "";
			if ($val->status == 'Closed') {
				$info  = ' <i class="icon-info22" data-toggle="tooltip" data-placement="top" title="Closed at ' . userDateFormat($val->close_time) . '"></i>';
			}
			$dataArr[$i][] = ($val->status == 'Closed') ? getUserName($val->closed_by) . $info : 'N/A';
			$dataArr[$i][] = $val->priority;

			 
			if($val->status == "Open"){
				$class = "success";
				$status1 = "Closed";
				$status2 = "Progress";
				$act1 = '<span class="label label-danger"><i class="icon-menu-close2"></i>Close</span>';
				$act2 = '<span class="label label-info"><i class="icon-stack"></i>In Progress</span>';
			}else if($val->status == "Closed"){
				$class = "danger";
				$status1 = "Open";
				$status2 = "Progress";
				$act1 = '<span class="label label-success"><i class="icon-menu-open"></i>Open</span>';
				$act2 = '<span class="label label-info"><i class="icon-stack"></i>In Progress</span>';
			}else{
				$class = "info"; 
				
				$status1 = "Open";
				$status2 = "Closed";
				$act1 = '<span class="label label-success"><i class="icon-menu-open"></i>Open</span>';
				$act2 = '<span class="label label-danger"><i class="icon-menu-close2"></i>Close</span>';
			}
			
			$dataArr[$i][] = '<span class="label label-' . $class . '">' . $val->status . '</span>';

			 
			

			 
			$action =  '<ul class="text-center icons-list"><li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu9"></i></a>';
			$action .= '<ul class="dropdown-menu dropdown-menu-right">';
			$link1 = '<li><a class="change_status" data-status="' . $status1 . '" data-id="' . $val->id . '" data-closed_by="' . current_user() . '" data-close_time="' . db_date_time() . '" href="javascript:void(0)">' . $act1 . '</a></li>';
			$link2 = '<li><a class="change_status" data-status="' . $status2 . '" data-id="' . $val->id . '" data-closed_by="' . current_user() . '" data-close_time="' . db_date_time() . '" href="javascript:void(0)">' . $act2 . '</a></li>';
			 
			$action .= $link1 . $link2. '</ul></li></ul>';
			
			$dataArr[$i][] = $action;

			$i++;
		}
		if (empty($dataArr)) {
			$dataArr = [];
		}
		$response = array('draw' => $allinputes['draw'], 'recordsFiltered' => $tickets['count'], 'recordsTotal' => $tickets['count'], 'data' => $dataArr);
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}

	public function update($id)
	{
		if (empty($id)) {
			$response = array('type' => 'error', 'message' => "Unable to update record 'ID' meessing.");
		} else {
			$this->load->model('ticket_model', 'ticket');
			$postdata = $this->input->post();

			$newArr = array(
				"ticket_id" => $id,
				"user_id" => $postdata['closed_by'],
				"create_time" => $postdata['close_time'],
				"message" => "Ticket " . $postdata['status']
			);

			$this->ticket->addReply($newArr);

			$where['id'] = $id;
			$return = $this->ticket->updateTicket($postdata, $where);
			$url = base_url('admin/ticket/all');
			if ($return) {
				$response = array('type' => 'success', 'message' => "Record Updated!", 'url' => $url);
			} else {
				$response = array('type' => 'success', 'error' => "Unable to update record there could be a DB issue.", 'url' => $url);
			}
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}

	public function addComment()
	{

		$this->load->model('ticket_model', 'ticket');
		$postdata = $this->input->post();
		if (!empty(strip_tags($postdata['message']))) {
			if (!empty($_FILES)) {
				$postdata = uploadFile($_FILES, $postdata);
			}
			$subject = $postdata['subject'];
			unset($postdata['subject']);
			$priority = $postdata['priority'];
			unset($postdata['priority']);
			$department_id = $postdata['department_id'];
			unset($postdata['department_id']);
			$created_by = $postdata['created_by'];
			unset($postdata['created_by']);

			unset($postdata['path_to_upload']);
			$postdata['create_time'] = db_date_time();

			$return = $this->ticket->addReply($postdata);
			if ($return) {
				$arr = array(
					'subject' => $subject,
					'priority' => $priority,
					'department_id' => $department_id,
					'message' => $postdata['message'],
					'ticket_id' => $postdata['ticket_id'],
					'created_by' => $created_by
				);
				$this->addCommentMail($arr);
				$response = array('type' => 'success', 'message' => "Thanks your reply have been added successfully!");
			} else {
				$response = array('type' => 'error', 'message' => "Unable to add reply, there could be some DB issue.");
			}
		} else {
			$response = array('type' => 'error', 'message' => "Please enter your message!");
		}

		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}

	function addCommentMail($arr = array())
	{

		//$setting = getSettings();
		if (!empty($setting->smtp)) {
			$this->load->model('Users_model', 'user');
			$this->load->model('Department_model', 'depart');
			$user_id = current_user();
			$user = $this->user->getUserData($user_id);


			$name = $user->fname;
			if (!empty($user->lname)) {
				$name .= " " . $user->lname;
			}

			$department = $this->depart->getNameById($arr['department_id']);
			$admin_emails = $this->user->getEmailForTicket($arr['department_id']);


			$subject = "New response on ticket " . $setting->title . " for " . $department;

			$maildataAdmin = array(
				'name' => $name,
				'profile_pic' => base_url("uploads/profile/" . $user->profile_pic),
				'subject' => $arr['subject'],
				'priority' => $arr['priority'],
				'message' => $arr['message'],
				'url' => base_url("admin/ticket/detail/" . $arr['ticket_id']),
				'department' => $department,
				'title' => $setting->title
			);


			$messageBodyAdmin = $this->load->view('email-template/ticket-reply', $maildataAdmin, true);
			sendmail($admin_emails, $subject, $messageBodyAdmin);

			$user_email = $this->user->getEmailByUserId($arr['created_by']);
			$maildataUser = array(
				'name' => $name,
				'profile_pic' => base_url("uploads/profile/" . $user->profile_pic),
				'subject' => $arr['subject'],
				'priority' => $arr['priority'],
				'message' => $arr['message'],
				'url' => base_url("user/ticketdetail/" . $arr['ticket_id']),
				'department' => $department,
				'title' => $setting->title
			);
			$messageBodyUser = $this->load->view('email-template/ticket-reply', $maildataUser, true);
			sendmail($user_email, $subject, $messageBodyUser);
			return true;
		}
		return true;
	}
}
