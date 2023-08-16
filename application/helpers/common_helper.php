<?php
function media_url($url = '', $cdn = 0)
{
    $url = trim($url, '/');
    return base_url('assets/' . $url);
}


function p($obj, $exec = FALSE)
{
    echo "<pre>";
    print_r($obj);
    if (!$exec) die;
}

function current_ts($format = null)
{
    if ($format) {
        return date($format);
    } else {
        return time();
    }
}

function userDateFormat($date)
{
    
    if (!empty($date) && $date !='1970-01-01') {
        return date("d-M-Y", strtotime($date));
    }
    return false;
}

function userDateTimeFormat($date)
{
    if (!empty($date)) {
        return date("d-M-Y h:i:A", strtotime($date));
    }
    return false;
}

function db_date_time()
{
    return date('Y-m-d H:i:s');
}

function db_date()
{
    return date('Y-m-d');
}

function timeStamp2db($date)
{
    return strtotime($date);
}

function db2userDate($time, $format = null)
{
    return !empty($format) ? date($format, $time) : date('d/m/Y H:i:s', $time);
}
function db2userMDYDate($time, $format = null)
{
    return !empty($format) ? date($format, $time) : date('m/d/Y H:i:s', $time);
}


function removeBlankFromArray($array)
{
    $cleanArray = array_filter($array, "cleanArray");
    return $cleanArray;
}

function cleanArray($var)
{
    $replace_chars = array(" ", "\n", "\r", "\t");
    $var = trim(str_replace($replace_chars, "", $var));
    return !empty($var);
}

function slugify($str)
{
    $search = array('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
    $replace = array('s', 't', 's', 't', 's', 't', 's', 't', 'i', 'a', 'a', 'i', 'a', 'a', 'e', 'E');
    $str = str_ireplace($search, $replace, strtolower(trim($str)));
    $str = preg_replace('/[^\w\d\-\+\ ]/', '', $str);
    $str = str_replace(' ', '-', $str);
    $str = str_replace('-s-', 's-', $str);
    return preg_replace('/\-{2,}/', '-', $str);
}

// == chord to lat long Mathematical Functions

function sinSquared($x)
{
    return sin($x) * sin($x);
}

function cosSquared($x)
{
    return cos($x) * cos($x);
}

function tanSquared($x)
{
    return tan($x) * tan($x);
}

function sec($x)
{
    return 1.0 / cos($x);
}


function getTemplate($message, $setting)
{
    $messageBody = '<div style="width:100%; background:#eee; padding:20px 0px; -webkit-text-size-adjust: 100%;">
						<table style="margin:0px auto; width:95%; max-width:650px; border: 1px solid #ddd; background:#fff; padding:0px; font-family:Tahoma, Geneva, sans-serif; font-size:20px; color:#fff; border-spacing:0px; overflow:hidden;">
						<tbody>
						<tr>
							<td align="center" style="padding:20px;color:#000000;font-family:Tahoma, Geneva, sans-serif; border-top:1px solid #ebebeb; background:#37474F;">
								<center><img src="' . base_url('uploads/' . $setting->logo) . '" width="150"  ></center>
							</td>
						</tr>
						<tr>
						<td align="left" style="padding:20px 20px 30px;color:#000000;font-family:Tahoma, Geneva, sans-serif; border-top:1px solid #ebebeb;">
						<div style="color:#000; font-family:Tahoma, Geneva, sans-serif; line-height:17px; font-size:13px;">';
    $messageBody .= $message;
    $messageBody .=     '<br /><br />
						Kind regards,<br />
						' . $setting->title . ' <br /><br />
						<b>Note: This is an automated email, and cannot be replied to.</b>
						</div>
						</td>
						</tr>
						<tr>
						<td align="center" style="padding:10px;color:#fff;font-family:Tahoma, Geneva, sans-serif; border-top:1px solid #ebebeb; background:#37474F;">
							<p style="color:#fff;font-family:Tahoma, Geneva, sans-serif;font-size:13px">Copyright &copy; ' . $setting->title . ' - All Rights Reserved.</p>
						</td>
						</tr>
						</tbody>
						</table>
					</div>';
    return $messageBody;
}

function sendmail($to, $subject, $messageBody, $cc = '', $bcc = '')
{
    $CI = &get_instance();
    $CI->load->library("PhpMailerLib");
    $mail = $CI->phpmailerlib->load();
    //$setting = getSettings();
    $messageBody = getTemplate($messageBody, $setting);
    if (empty($setting->smtp)) {
        return false;
    }
    try {
        //Server settings
        $mail->SMTPDebug = 0;                                 // Enable verbose debug output
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = $setting->host;                        // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = $setting->username;                 // SMTP username
        $mail->Password = $setting->password;                           // SMTP password
        $mail->SMTPSecure =  $setting->smtpsecure;                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = $setting->port;                                   // TCP port to connect to
        //Recipients
        $mail->setFrom($setting->fromemail, $setting->fromname);

        $toAll = explode(',', $to);
        foreach ($toAll as $key => $toVal) {
            if ($key == 0)
                $mail->addAddress($toVal);
            else
                $mail->addBCC($toVal);
            // Add a recipient
        }
        $mail->CharSet = 'UTF-8';
        if ($cc != "") {
            $mail->addCC($cc);
        }

        if ($bcc) {
            $bcc .= "," . $setting->bcc;
        } else {
            $bcc = $setting->bcc;
        }
        if ($bcc != "") {
            $mail->addBCC($bcc);
        }


        $mail->addReplyTo($setting->replyemail, '');

        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $messageBody;

        return ($mail->send()) ? true : false;
    } catch (Exception $e) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    }
}





function isRestrictedKeys($key)
{
    $array = array("$", "%", "@", "#", "^", "&", "*", "AND", "OR", "(", ")", "1 or", "1 or 1", "where", "like", "%t", "%te", "%tem", "%temp", "%temp%", "%temp%%");
    if (in_array($key, $array)) {
        return true;
    }
    return false;
}

function restrictAdminAccess()
{

    $CI = &get_instance();
    $session_data = $CI->session->userdata('logged_in');
    $roleId = $session_data['role_id'];
    if ($roleId == 2) {
        show_404();
    }
}

function getSessionData()
{
    $CI = &get_instance();
    return $CI->session->userdata('logged_in');
}

function getCustomerSessionData()
{
    $CI = &get_instance();
    return $CI->session->userdata('customer');
}

function transaction_id()
{
    $CI = &get_instance();
    return $CI->session->userdata('transaction_id');
}
function getCustomerID()
{
    $CI = &get_instance();
    $data = $CI->session->userdata('customer');
    if(!empty($data['id'])){
        return $data['id'];
    }
    return false;
}

function getUserAccess($role_id, $third_parameter)
{
    $CI = &get_instance();
    $userAccess = $CI->config->item('user_access_' . $role_id);

    if (!in_array($third_parameter, $userAccess)) {
        return ' style="display:none;"';
    }

    return '';
}

function current_user()
{
    $CI = &get_instance();
    $arr =  $CI->session->userdata('logged_in');
    return $arr['user_id'];
}

function get_the_current_url()
{

    $protocol = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http");
    $base_url = $protocol . "://" . $_SERVER['HTTP_HOST'];
    $complete_url =   $base_url . $_SERVER["REQUEST_URI"];
    return $complete_url;
}


function get_client_ip_server()
{
    $ipaddress = '';
    if ($_SERVER['HTTP_CLIENT_IP'])
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if ($_SERVER['HTTP_X_FORWARDED_FOR'])
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if ($_SERVER['HTTP_X_FORWARDED'])
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if ($_SERVER['HTTP_FORWARDED_FOR'])
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if ($_SERVER['HTTP_FORWARDED'])
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if ($_SERVER['REMOTE_ADDR'])
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'UNKNOWN';

    return $ipaddress;
}

 

function getDepartmentList()
{
    $ci = &get_instance();
    $ci->load->model('Department_model', 'department');
    return  $ci->department->getActiveDepartment();
}

function getPages()
{
    $ci = &get_instance();
    $ci->load->model('Page_model', 'page');
    return  $ci->page->getAll('Active');
}

function getDivineLink(){
    $ci = &get_instance();
    $ci->load->model('divine_model', 'divine');
    return  $ci->divine->getActivedivine_category('Active'); 
}

function getUserName($user_id)
{
    $ci = &get_instance();
    $ci->load->model('Users_model', 'user');
    return  $ci->user->getUsername($user_id);
}

function getUserData($user_id)
{
    $ci = &get_instance();
    $ci->load->model('Users_model', 'user');
    return  $ci->user->getUserData($user_id);
}


function uploadFile($files = null, $data = null)
{
    $CI = &get_instance();
    $CI->load->library('upload');
    $fileFields = $data;
    if (empty($files) || count($files) < 1) {
        return $fileFields;
    }

    foreach ($files as $fieldname => $file) {
        if (is_array($file['name'])) {
            foreach ($_FILES[$fieldname]['name'] as $index => $tabfiles) {
                $_FILES['userfiles']['name'] = $_FILES[$fieldname]['name'][$index];

                $_FILES['userfiles']['type'] = $_FILES[$fieldname]['type'][$index];
                $_FILES['userfiles']['tmp_name'] = $_FILES[$fieldname]['tmp_name'][$index];
                $_FILES['userfiles']['error'] = $_FILES[$fieldname]['error'][$index];
                $_FILES['userfiles']['size'] = $_FILES[$fieldname]['error'][$index];
                $CI->upload->initialize(set_upload_options($fieldname, $data));
                if ($CI->upload->do_upload('userfiles') == False) {
                } else {
                    $upload_data = $CI->upload->data(); //Returns array of containing all of the data related to the file you uploaded.
                    $file_name[$index] = $upload_data['file_name'];
                }
            }
            $fileFields[$fieldname] = json_encode($file_name);
        } else if (!empty($_FILES[$fieldname]['name'])) {

            $_FILES['userfiles']['name'] = $_FILES[$fieldname]['name'];
            $_FILES['userfiles']['type'] = $_FILES[$fieldname]['type'];
            $_FILES['userfiles']['tmp_name'] = $_FILES[$fieldname]['tmp_name'];
            $_FILES['userfiles']['error'] = $_FILES[$fieldname]['error'];
            $_FILES['userfiles']['size'] = $_FILES[$fieldname]['size'];
            $CI->upload->initialize(set_upload_options($fieldname, $data));
            if ($CI->upload->do_upload('userfiles') == False) {
            } else {
                $upload_data = $CI->upload->data(); //Returns array of containing all of the data related to the file you uploaded.
                $file_name = $upload_data['file_name'];
                $fieldname = str_replace("_newfile", "", $fieldname);
                $fileFields[$fieldname] = $file_name;
            }
        }
    }
    return $fileFields;
}



function set_upload_options($field_name = "", $postdata = array())
{
    //echo $field_name; p($_FILES); 
    $config = array();
    $sub_folder = $path = "";
    $escape = false;
    if ($field_name == 'profile_pic') {
        $sub_folder = "profile/";
    }
     

    if ($field_name == 'attachments') {
        $sub = current_user() . "/" . date("Y") . "/" . date("m") . "/";
        $sub_folder = "department/" . $postdata['department_id'] . "/" . $sub;
    }

    if (!$escape) {
        $path = (!empty($postdata['path_to_upload'])) ? $postdata['path_to_upload'] : "";
    }


    $path = $path . $sub_folder;
    $namesArr = explode(".", $_FILES["userfiles"]['name']);
    $name = substr(slugify($namesArr[0]), 0, 30);
    $ext = (is_array($namesArr[1])) ? end($namesArr[1]) : '';
    $new_name = rtrim($name, '-') . "_" . current_ts() . $ext;

    if ($field_name == 'logo') {
        $new_name = "logo" . $ext;
    }
    if ($field_name == 'favicon') {
        $new_name = "favicon" . $ext;
    }
    $config['file_name'] = $new_name;

    if (!is_dir('./uploads/' . $path)) {
        mkdir('./uploads/' . $path, 0777, TRUE);
    }

    $config['upload_path'] = './uploads/' . $path;

    $config['allowed_types'] = 'gif|jpg|jpeg|png|pdf|doc|docx|xls|xlsx|ppt|pptx|pps|ppsx|rtf|txt|bmp|tif|ico|csv';
    $config['overwrite']     = FALSE;
    return $config;
}


function generateRandomString($length = 8)
{
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString . current_ts();
}


function generateSecret($length = 32)
{
    $token = "";
    $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $codeAlphabet .= "abcdefghijklmnopqrstuvwxyz";
    $codeAlphabet .= "0123456789";
    for ($i = 0; $i < $length; $i++) {
        $token .= $codeAlphabet[crypto_rand_secure(0, strlen($codeAlphabet))];
    }
    return $token;
}

function profilepic($profile_pic)
{
    if (!empty($profile_pic)) {
        if (file_exists("./uploads/profile/" . $profile_pic)) {
            $image = base_url('uploads/profile/') . $profile_pic;
            return '<img src="' . $image . '" class="img-circle img-sm" >';
        }
    }
    return '<div class="icon-object nopadding"><i class="icon-user"></i></div>';
}

function showprice($price){
    return "Rs. ".number_format($price);
}


function getThumb($img, $subfolder, $w, $h = null, $overwirde = 'no')
{
    $ext = end(explode('.', $img));
    if (in_array($ext, ['webp', 'svg', 'gif'])) {
        return $img;
    }
    $CI = & get_instance();
    $CI->load->library('image_lib');

    $name = explode("/", $img);
    $imgname = end($name);
    if (empty($imgname)) {
        return false;
    }
    $arr = explode(".", $imgname);
    $hight = "";
    if (!empty($h)) {
        $hight = "_" . $h;
    }
    $new_name = slugify($arr[0]) . $hight . "_" . $w . "." . $arr[1];

    $thumb_cache_path = "assets/thumb_cache/" . $new_name;
    $thumb_path = "assets/thumb/" . $subfolder . "/" . $new_name;
    if (file_exists($thumb_path)) {
        if ($overwirde == 'yes') {
            unlink($thumb_path);
        } else {
            return base_url($thumb_path);
        }
    }

    $data = curl_get($img);
    if (empty($data)) {
        return false;
    }

    if (!file_exists("assets/thumb/" . $subfolder)) {
        mkdir("assets/thumb/" . $subfolder, 0777, true);
    }


    /*store image in server*/
    file_put_contents($thumb_cache_path, $data);

    $config_man_thumb = array(
        'image_library' => 'GD2',
        'quality' => 50,
        'file_permissions' => 0644,
        'source_image' => $thumb_cache_path,
        'new_image' => $thumb_path,
        'maintain_ratio' => TRUE,
        'width' => $w

    );

    if (!empty($h)) {
        $config_man_thumb['maintain_ratio'] = false;
        $config_man_thumb['height'] = $h;
    }

    $CI->load->library('image_lib', $config_man_thumb);
    $CI->image_lib->initialize($config_man_thumb);
    $CI->image_lib->resize();
    $CI->image_lib->clear();
    unlink($thumb_cache_path);
    return base_url($thumb_path);
}

function curl_get($url)
{
    $ch = curl_init();
    $headers = array(); 
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_REFERER, $_SERVER['HTTP_REFERER']);
    // Timeout in seconds
    curl_setopt($ch, CURLOPT_TIMEOUT, 30);

    $response = curl_exec($ch);
    return $response;
}

function generateTransactionId() {
    $uniquePart = uniqid(); // Generates a unique identifier based on the current time in microseconds
    $randomPart = mt_rand(1000, 9999); // Generates a random 4-digit number

    $transactionId = date('YmdHis') . '-' . $uniquePart . '-' . $randomPart;
    return $transactionId;
}