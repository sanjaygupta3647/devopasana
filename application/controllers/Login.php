<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
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
	public function authlogin()
	{
		// ensure user is signed in
		$session_data = $this->session->userdata('logged_in');
		$returnUrl = ($this->input->get('nextUrl', TRUE)) ? $this->input->get('nextUrl', TRUE) : '';

		if (!empty($session_data)) {
			$roleId = $session_data['role_id'];
			if ($roleId == 1 || $roleId == 2) {
				if (!empty($returnUrl)) {
					$url = base_url($returnUrl);
				} else {
					$url = base_url("admin/dashboard");
				}
			} else {
				if (!empty($returnUrl)) {
					$url = base_url($returnUrl);
				} else {
					$url = base_url('user/dashboard');
				}
			}
			redirect($url);
		}

		$meta = array();
		$meta['meta_title'] = 'Login';
		$meta['meta_description'] = 'Login';
		$this->view_data['meta'] = $meta;

		$this->view_data['pageCss'] = array();
		$this->view_data['pageJs'] = array();

		$this->session->set_flashdata('redirect', !empty($returnUrl) ? $returnUrl : '');
		$this->session->keep_flashdata('redirect');
		$this->load->view('login/login', $this->view_data);
	}

	public function authenticate()
	{ 
		// authenticate
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		if (isset($username)) {

			$this->load->model('users_model', 'user');

			$loggedInUser = $this->user->authLogin($username, $password); 
			if ($loggedInUser) {
				if ($loggedInUser->status == 'PENDING' || $loggedInUser->status == 'INACTIVE' || $loggedInUser->status == 'DELETED') {
					$response = array('type' => 'error', 'message' => 'Your account has been deactivated. Please contact your system administrator.');
				} else {
					//$cryptedPass = $loggedInUser->password;

					$newpass = md5(SALT_CONSTANT . $password);
					if ($newpass != $loggedInUser->pass) {
						$response = array('type' => 'error', 'message' => 'Invalid username or password');
					} else {
						$data = array('updated_at' => current_ts());
						$where = array('id' => $loggedInUser->id);
						$this->user->updateUser($data, $where);
						$sess_array = array(
							'user_id' => $loggedInUser->id,
							'role_id' => $loggedInUser->role_id
						); 

						if ($this->session->flashdata('redirect')) {
							$url = base_url($this->session->flashdata('redirect'));
							$response = array('type' => 'success', 'message' => "Welcome " . $loggedInUser->username, 'url' => $url);
						} else {
							if ($loggedInUser->role_id == 1) {
								$url = base_url('admin/dashboard');
							} else if ($loggedInUser->role_id == 2) {
								$url = base_url('admin/dashboard');
							} else {
								$url = base_url('user/dashboard');
							}

							$response = array('type' => 'success', 'message' => "Welcome " . $loggedInUser->username, 'url' => $url);
						}

						$this->session->set_userdata('logged_in', $sess_array);
					}
				}
			} else {
				$response = array('type' => 'error', 'message' => 'Invalid username or password');
			}
		} else {
			$response = array('type' => 'error', 'message' => 'Invalid username or password');
		}

		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}

	public function generatepassword()
	{
		// authenticate
		$username = $this->input->post('forget-username');

		if (isset($username)) {
			$this->load->model('users_model', 'user');
			$this->load->model('clients_model', 'client');
			$user = $this->user->forgetPassword($username);

			if (!empty($user)) {
				if ($user->status == 'ACTIVE' || $user->status == 'PENDING') {
					$ClientData = $this->client->getUserClientData($user->client_id);
					$randomPassword = generateRandomString();
					$secret = generateSecret();
					$pwd = $randomPassword;
					$yum = SALT_CONSTANT . $ClientData[0]->username;
					$salt = '$2y$13$' . substr(MD5($yum), 0, 22) . '$';
					$cryptedPass = crypt($pwd, $salt);
					$insert_data = array(
						'password' => $cryptedPass,
						'status' => 'ACTIVE',
						'is_reset' => 'N'
					);

					$where = array('username' => $ClientData[0]->username, 'client_id' => $user->client_id);
					$affectRow = $this->client->createPassword($insert_data, $where);

					$owners = $this->client->getOwnersByClientId($user->client_id);
					if (empty($owners)) {
						$owners = $this->client->getDirectorByClientId($user->client_id);
					}
					if (!empty($owners)) {
						$to = ownerEmailObject($owners);
						$subject = "Your New Log-in Credentials - Tax Return";
						$message = 'Dear ' . ownerNameObject($owners) . '<br /><br />
										Please find the below credential to login:<br>
										Username: <b>' . $ClientData[0]->username . '</b><br />
										Password: <b>' . $randomPassword . '</b><br><br />
										Click the button below to log-in.<br /><br />
										<p style="text-align:center;">
											<a href="' . base_url('authlogin') . '" target="_blank" style="background-color: #001b39; color:#fff; border-radius:3px; font-family:Tahoma, Geneva, sans-serif; font-size:16px; text-decoration:none; margin-top:5px; border:8px solid #001b39; ">&nbsp;&nbsp;&nbsp;&nbsp;Login&nbsp;&nbsp;&nbsp;&nbsp;</a>
										</p>';

						//Send username password
						$mailStatus = taxreturnMailto($to, $subject, $message);
						if ($mailStatus) {
							$url = 'authlogin';
							$response = array('type' => 'success', 'message' => "Your password has now been reset.<br />Please log-in to your designated email account in order to access your new password.", 'url' => base_url('login'));
						} else {
							$response = array('type' => 'error', 'message' => 'Credential not sent. Please try again!');
						}
					}
				} else {
					$response = array('type' => 'error', 'message' => 'Your account is disabled/inactive, please contact to the administrator!');
				}
			} else {
				$response = array('type' => 'error', 'message' => 'Invalid username!');
			}
		} else {
			$response = array('type' => 'error', 'message' => 'Enter your username!');
		}

		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}

	public function createpassword($userName = "", $clientID = "")
	{
		$meta = array();
		$meta['title'] = 'Add Clients';
		$meta['description'] = 'Add Clients';
		$this->_view_data['meta'] = $meta;

		$this->_view_data['pageCss'] = array();
		$this->_view_data['pageJs'] = array();

		$this->_view_data['clientID'] = $clientID;
		$this->_view_data['username'] = $userName;
		$this->load->view('create-password', $this->_view_data);
	}



	public function createPasswordAction()
	{
		$this->load->model('clients_model', 'client');

		$postClientID = $this->input->post('client_id');
		$postUsername = $this->input->post('username');
		$postPassword = $this->input->post('password');
		$postCpassword = $this->input->post('confirmpassword');
		$username = urldecode($postUsername);
		$clientId = base64_decode(urldecode($postClientID));

		$secret = generateSecret();
		$pwd = $postPassword;
		$yum = SALT_CONSTANT . $username;
		$salt = '$2y$13$' . substr(MD5($yum), 0, 22) . '$';
		$cryptedPass = crypt($pwd, $salt);

		if ($postPassword = $postCpassword) {
			//Add client data
			$insert_data = array(
				'password' => $cryptedPass,
				'status' => 'ACTIVE'
			);

			$where = array('username' => $username, 'client_id' => $clientId);
			$affectRow = $this->client->createPassword($insert_data, $where);

			$owners = $this->client->getOwnersByClientId($clientId);
			if (!empty($owners)) {
				foreach ($owners as $index => $owner) {
					$to = $owner->email;
					$subject = "Password Created - Tax Return";
					$message = '<tr>
					            <td align="center" bgcolor="#ffffff" style="padding: 40px 20px 40px 20px; color: #555555; font-family: Arial, sans-serif; font-size: 20px; line-height: 30px; border-bottom: 1px solid #f6f6f6;">
					            	Dear ' . $owner->fname . ' ' . $owner->lname . '<br>
					            	Your password has been created. Please find the below credential to login:<br><br>
					            	Username: <b>' . $username . '</b><br>
					            	Password: <b>' . $postPassword . '</b><br><br>
					            	Click the button below to login.
					            </td>
				            </tr>
				            <tr>
				            	<td align="center" bgcolor="#f9f9f9" style="padding: 30px 20px 30px 20px; font-family: Arial, sans-serif;">
				            		<table bgcolor="#e67e22" border="0" cellspacing="0" cellpadding="0" class="buttonwrapper">
				            			<tbody>
				            				<tr>
									            <td align="center" height="50" style=" padding: 0 25px 0 25px; font-family: Arial, sans-serif; font-size: 16px; font-weight: bold;" class="button">
									            	<a href="' . base_url('login') . '" style="color: #ffffff; text-align: center; text-decoration: none;">login</a>
									            </td>
				            				</tr>
				            			</tbody>
				            		</table>
				            	</td>
				            </tr>';

					//Send username password
					taxreturnMailto($to, $subject, $message);
				}

				redirect(base_url('authlogin?success=password'));
			}
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('logged_in');
		$this->session->sess_destroy();
		$returnUrl = ($this->input->get('nextUrl', TRUE)) ? $this->input->get('nextUrl', TRUE) : '';
		if (!empty($returnUrl)) {
			redirect(base_url('authlogin?nextUrl=' . $returnUrl));
		} else {
			redirect(base_url('authlogin'));
		}
	}
}
