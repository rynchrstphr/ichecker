<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
	}	

	public function main()
	{
		$this->load->view('admin/login');
	}

	public function login()
	{
		$this->load->model('Admin_model', 'a');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$return = $this->a->verifyLogin($username, $password);		
		if($return == "No Account Found")
		{
			$data['message'] = $return;
			redirect('Admin/main');
		}
		else
		{
			$data['loginInfo'] = $return;
			foreach ($data['loginInfo'] as $li) 
			{
				$id = $li->id;
				$user = $li->username;
				$pass = $li->password;
				$level = $li->level;
			}
			if(password_verify($password, $pass))
			{
				$data['id'] = $id;
				$data['user'] = $user;
				$data['userlevel'] = $level;
				$data['acc'] = "0";
				$this->load->view('admin/includes/setSession', $data);
			}
			else
			{
				$data['message'] = "Invalid Login Combination";
				redirect('Admin/main');
			}
		}
	}

	public function dashboard()
	{
		$this->load->view('admin/dashboard');
	}

	public function logout()
	{
		$this->session->unset_userdata('user');
		$this->session->unset_userdata('userlevel');
		redirect('Admin/main');
	}

	// VERIFY DOCUMENT

	public function verifyScanDocu()
	{
		$this->load->view('admin/verifyscanqr');
	}
	public function verifyDocument()
	{
		$this->load->model('Admin_model', 'a');
		$qrCode = $this->input->post('code');
		$res = $this->a->searchDocu($qrCode);
		if($res < 1)
		{
			$data['found'] = "0";
			$data['qrCode'] = $qrCode;
			$this->load->view('admin/verifieddocu', $data);	
		}
		else
		{
			$data['found'] = "1";
			$data['qrCode'] = $qrCode;
			$data['docuData'] = $this->a->getDocumentData($qrCode);
			$cId = "";
			foreach ($data['docuData'] as $d) 
			{
				$cId = $d->collegeid;
				$corId = $d->courseid;
				$docId = $d->documentid;
			}
			$data['coursePost'] = $this->a->loadCoursesVerify($corId);
			$data['collegePost'] = $this->a->loadCollege($cId);
			$data['documentTypePost'] = $this->a->loadDocumentType($docId);
			$this->load->view('admin/verifieddocu', $data);
		}
	}

	//ADD DOCUMENT
	public function addDocuScan()
	{
		$this->load->view('admin/scanqradd');
	}
	public function addDocument()
	{
		$this->load->model('Admin_model', 'a');
		$qrCode = $this->input->post('code');
		$checkQR = $this->a->verifyQR($qrCode);
		$validateQr = $this->a->validateQr($qrCode);
		if($checkQR == "0")
		{
			$data['invalidQR'] = "1";
			$data['qrCode'] = $qrCode;
			$this->load->view('admin/documentAdd', $data);
		}
		else if($validateQr == "1" && $checkQR == "1")
		{
			$data['invalidQR'] = "2";
			$data['qrCode'] = $qrCode;
			$this->load->view('admin/documentAdd', $data);
		}
		else
		{
			$data['qrCode'] = $qrCode;
			$data['invalidQR'] = "0";
			$data['college'] = $this->a->getCollege();
			$data['documentType'] = $this->a->getDocumentType();
			$this->load->view('admin/documentAdd', $data);
		}
	}
	public function getCourses()
	{		
		$this->load->model('Admin_model', 'a');
		$data = $this->input->post();
		$collegeid = $this->a->loadCourses($data['collegeid']);

		if(!$collegeid==null)
		{
		foreach ($collegeid as $value) 
		{
			$row = array();	
			$row[0] = $value->id;
			$row[1] = $value->coursename;
			$data2[] = $row;
		}
		echo json_encode($data2);
		}
		else
		{
			echo('0');
		}
	}
	public function saveDocument()
	{
		$this->load->model('Admin_model', 'a');
		$imageInsert = "";
		$this->load->library('upload');
    $files = $_FILES;
    $filesCount = count($_FILES['userfile']['name']);
    for($i=0; $i<$filesCount; $i++)
    {                   	
      $_FILES['userfile']['name']= $files['userfile']['name'][$i];
      $_FILES['userfile']['type']= $files['userfile']['type'][$i];
      $_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
      $_FILES['userfile']['error']= $files['userfile']['error'][$i];
      $_FILES['userfile']['size']= $files['userfile']['size'][$i];
      $this->upload->initialize($this->set_upload_options());
			
			if (!$this->upload->do_upload()) 
			{
				$error = array('error' => $this->upload->display_errors());
				print_r($error);
			} 
			else 
			{
				$arr_image= $this->upload->data();
				$image = $arr_image['file_name'];
				if($i == 0)
				{
					$imageInsert = $image;
				}
				else
				{
					$imageInsert = $imageInsert . ',' . $image;
				}
     	}	
    }

    // -----------------------------------------------------------

    $code = $_SESSION['code'];
		$studentid = $this->input->post('studentid');
		$collegeid = $this->input->post('collegeid');
		$courseid = $this->input->post('courseid');
		$fname = $this->input->post('fname');
		$lname = $this->input->post('lname');
		$mname = $this->input->post('mname');
		$documentid = $this->input->post('documentid');
		$img = $imageInsert;
		$date = date('Y-m-d');

		$documentInformation = array(

			'qrcode' => $code,
			'studentid' => $studentid,
			'collegeid' => $collegeid,
			'courseid' => $courseid,
			'fname' => $fname,
			'lname' => $lname,
			'mname' => $mname,
			'documentid' => $documentid,
			'image' => $img,
			'date' => $date
		);

		$insertRes = $this->a->saveAddDocument($documentInformation);

		$updateRes = $this->a->updateQrTbl($code);

		if($insertRes && $updateRes)
		{
			$data['message'] = "Document Saved Successfuly";
			$this->load->view('admin/scanqradd', $data);
		}
	}
	private function set_upload_options()
  {   
    $config = array();
		$config['upload_path'] = '/xampp/htdocs/ichecker/assets/uploads';
		$config['allowed_types'] = 'gif|jpg|jpeg|png';                
		$config['overwrite']     = FALSE;
    return $config;
  }

  //UPDATE DOCUMENT

  public function updateDocuScan()
	{
		$this->load->view('admin/scanqrupdate');
	}

	public function updateDocument()
	{
		$this->load->model('Admin_model', 'a');
		$qrCode = $this->input->post('code');
		$validateQr = $this->a->validateQr($qrCode);
		$counter = 1;
		if($validateQr == "0")
		{
			$verifyQR = $this->a->verifyQR($qrCode);
			if($verifyQR == "0")
			{
				$data['invalidQR'] = $validateQr;
				$data['qrCode'] = $qrCode;
				$this->load->view('admin/invalidqr', $data);
				$counter = 2;
			}
			else
			{
				$data['invalidQR'] = "1";
				$data['qrCode'] = $qrCode;
				$this->load->view('admin/invalidqr', $data);	
				$counter = 2;
			}
		}
		if($counter == 1)
		{
			$this->load->model('Admin_model', 'a');
			$data['qrCode'] = $qrCode;
			$data['invalidQR'] = "0";
			$data['college'] = $this->a->getCollege();
			$data['documentType'] = $this->a->getDocumentType();
			$data['docuData'] = $this->a->getDocumentData($qrCode);
			$cId = "";
			foreach ($data['docuData'] as $d) {
				$cId = $d->collegeid;
			}
			$data['coursePost'] = $this->a->loadCourses($cId);
			$this->load->view('admin/documentUpdate', $data);
		}
	}
	public function saveUpdateDocument()
	{
		$this->load->model('Admin_model', 'a');

		$imageInsert = "";
		$this->load->library('upload');
    $files = $_FILES;
    $filesCount = count($_FILES['userfile']['name']);
    $checkCounter = 0;
    for($i=0; $i<$filesCount; $i++)
    {                   	
      $_FILES['userfile']['name']= $files['userfile']['name'][$i];
      $_FILES['userfile']['type']= $files['userfile']['type'][$i];
      $_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
      $_FILES['userfile']['error']= $files['userfile']['error'][$i];
      $_FILES['userfile']['size']= $files['userfile']['size'][$i];
      $this->upload->initialize($this->set_upload_options());
			
			if (!$this->upload->do_upload()) 
			{
				$checkCounter = 1;
			} 
			else 
			{
				$arr_image= $this->upload->data();
				$image = $arr_image['file_name'];
				if($i == 0)
				{
					$imageInsert = $image;
				}
				else
				{
					$imageInsert = $imageInsert . ',' . $image;
				}
     	}	

     	if($checkCounter == 1) 
     	{
     		$code = $_SESSION['code'];
				$studentid = $this->input->post('studentid');
				$collegeid = $this->input->post('collegeid');
				$courseid = $this->input->post('courseid');
				$fname = $this->input->post('fname');
				$lname = $this->input->post('lname');
				$mname = $this->input->post('mname');
				$documentid = $this->input->post('documentid');
				$date = date('Y-m-d');

				$documentInformation = array(
						'qrcode' => $code,
						'studentid' => $studentid,
						'collegeid' => $collegeid,
						'courseid' => $courseid,
						'fname' => $fname,
						'lname' => $lname,
						'mname' => $mname,
						'documentid' => $documentid,
						'date' => $date
					);

				$res = $this->a->updateDocument($documentInformation, $code);

				if($res)
				{
					$data['message'] = "Document Updated Successfuly";
					$this->load->view('admin/scanqrupdate', $data);
				}
     	}
     	else
     	{
     		$code = $_SESSION['code'];
				$studentid = $this->input->post('studentid');
				$collegeid = $this->input->post('collegeid');
				$courseid = $this->input->post('courseid');
				$fname = $this->input->post('fname');
				$lname = $this->input->post('lname');
				$mname = $this->input->post('mname');
				$documentid = $this->input->post('documentid');
				$img = $imageInsert;
				$date = date('Y-m-d');

				$documentInformation = array(

					'qrcode' => $code,
					'studentid' => $studentid,
					'collegeid' => $collegeid,
					'courseid' => $courseid,
					'fname' => $fname,
					'lname' => $lname,
					'mname' => $mname,
					'documentid' => $documentid,
					'image' => $img,
					'date' => $date
				);

				$insertRes = $this->a->saveAddDocument($documentInformation);

				if($insertRes && $updateRes)
				{
					$data['message'] = "Document Updated Successfuly";
					$this->load->view('admin/scanqrupdate', $data);
				}
     	}
    }
	}

	// GENERATE QR CODE

  public function viewGenerateQr()
	{
		$this->load->model('Admin_model', 'a');
		$data['data'] = $this->a->getgeneratedqr();
		$this->load->view('admin/generateqr', $data);
	}	

	//INFO DOCUMENT

	public function documentType()
	{
		$this->load->model('Admin_model', 'a');
		$data['dType'] = $this->a->getDocumentType();
		$this->load->view('admin/documentType', $data);
	}
	public function documentTypeAdd()
	{
		$data['act'] = "Add";
		$this->load->view('admin/documentTypeInput',$data);
	}
	public function saveDocumentType()
	{
		$this->load->model('Admin_model', 'a');
		$type = $this->input->post('type');
		$docuTypeInfo = array(
			'documenttype' => $type
		);
		$res = $this->a->saveDocuType($docuTypeInfo);
		if($res)
		{
			$message = "Document Type Saved Successfuly";
			$this->session->set_userdata('message', $message);
			redirect('admin/documentType');
		}
	}
	public function documentTypeUpdate()
	{
		$this->load->model('Admin_model', 'a');
		$docId = $this->input->post('id');
		$data['docTypeInfo'] = $this->a->loadDocumentType($docId);
		$data['act'] = "Update";
		$this->load->view('admin/documentTypeInput', $data);
	}
	public function saveUpdateDocumentType()
	{
		$this->load->model('Admin_model', 'a');
		$id = $this->input->post('id');
		$type = $this->input->post('type');
		$type1 = $this->input->post('type1');
		if($type1 != $type)
		{	
			$count = $this->a->verifyDocuType($type, $id);
			if($count < 1)
			{
				$docuTypeInfo = array(
					'documenttype' => $type
				);
				$res = $this->a->saveUpdateDocuType($docuTypeInfo, $id);
				if($res)
				{
					$message = "Document Type Updated Successfuly";
					$this->session->set_userdata('message', $message);
					redirect('admin/documentType');
				}
			}
			else
			{
				$message = "Document Type Already Exists";
				$this->session->set_userdata('message', $message);
				$data['docTypeInfo'] = $this->a->loadDocumentType($id);
				$data['act'] = "Update";
				$this->load->view('admin/documentTypeInput', $data);
			}
		}
	}

	//LIST OF COURSE

	public function courseList()
	{
		$this->load->model('Admin_model', 'a');
		$data['collegeData'] = $this->a->getCollege();
		$data['courseData'] = $this->a->getCourse();
		$this->load->view('admin/courses', $data);
	}
	public function courseAdd()
	{
		$this->load->model('Admin_model', 'a');
		$id = $this->input->post('id');
		$data['collegeData'] = $this->a->getCollege();
		$data['act'] = "Add";
		$this->load->view('admin/courseInput', $data);
	}
	public function saveCourse()
	{
		$this->load->model('Admin_model', 'a');
		$collegeid = $this->input->post('collegeid');
		$course = $this->input->post('coursename');
		$courseInfo = array(
			'collegeid' => $collegeid,
			'coursename' => $course,
		);
		$res = $this->a->saveCourse($courseInfo);
		if($res)
		{
			$this->load->model('Admin_model', 'a');
			$data['collegeData'] = $this->a->getCollege();
			$data['courseData'] = $this->a->getCourse();
			$message = "Course Name Saved Successfuly";
			$this->session->set_userdata('message', $message);
			redirect('Admin/courseList');
		}
		// print_r($data);
	}
	public function courseUpdate()
	{
		$this->load->model('Admin_model', 'a');
		$id = $this->input->post('id');
		$data['collegeData'] = $this->a->getCollege();
		$data['courseData'] = $this->a->loadCoursesVerify($id);
		$data['act'] = "Update";
		$this->load->view('admin/courseInput', $data);
	}
	public function saveUpdateCourse()
	{
		$this->load->model('Admin_model', 'a');
		$collegeid = $this->input->post('collegeid');
		$courseid = $this->input->post('courseid');
		$coursename = $this->input->post('coursename');
		$res = $this->a->verifyCourseName($coursename, $courseid);
		if($res == 0)
		{
			$courseInfo = array(
				'collegeid' => $collegeid,
				'coursename' => $coursename
			);
			$res = $this->a->saveUpdatedCourse($courseInfo, $courseid);
			if($res)
			{
				$message = "Course Name Updated Successfuly";
				$this->session->set_userdata('message', $message);
				redirect('Admin/courseList');
			}
		}
		else
		{
			$this->load->model('Admin_model', 'a');
			$id = $this->input->post('id');
			$data['collegeData'] = $this->a->getCollege();
			$data['courseData'] = $this->a->loadCoursesVerify($id);
			$data['act'] = "Update";
			$message = "Course Name already Exists";
			$this->session->set_userdata('message', $message);
			$this->load->view('admin/courseInput', $data);
		}
	}

	//COLLEGE LIST 

	public function collegeList()
	{
		$this->load->model('Admin_model', 'a');
		$data['collegeData'] = $this->a->getCollege();
		$this->load->view('admin/colleges', $data);
	}
	public function collegeAdd()
	{
		$data['act'] = "Add";
		$this->load->view('admin/collegeInput', $data);
	}
	public function collegeUpdate()
	{
		$this->load->model('Admin_model', 'a');
		$id = $this->input->post('id');
		$data['collegeData'] = $this->a->loadCollege($id);
		$data['act'] = "Update";
		$this->load->view('admin/collegeInput', $data);
		// $data['collegeData'] = $this->a->getCollege();
		// $data['courseData'] = $this->a->loadCoursesVerify($id);
		// $data['act'] = "Update";
		// $this->load->view('admin/courseInput', $data);
	}
	public function saveCollege()
	{
		$this->load->model('Admin_model', 'a');
		$collegename = $this->input->post('collegename');
		$res = $this->a->verifyCollegeName($collegename);
		if($res < 1)
		{
			$collegeInfo = array(
				'collegename' => $collegename,
			);
			$res = $this->a->saveCollege($collegeInfo);
			if($res)
			{
				$message = "College Name Saved Successfuly";
				$this->session->set_userdata('message', $message);
				redirect('Admin/collegeList');
			}
		}
		else
		{
			$message = "College Name already Exists";
			$this->session->set_userdata('message', $message);
			redirect('Admin/collegeAdd');
		}	
	}
	public function saveUpdateCollege()
	{
		$this->load->model('Admin_model', 'a');
		$collegename = $this->input->post('collegename');
		$res = $this->a->verifyCollegeName($collegename);
		if($res < 1)
		{
			$collegeInfo = array(
				'collegename' => $collegename,
			);
			$res = $this->a->saveCollege($collegeInfo);
			if($res)
			{
				$message = "College Name Saved Successfuly";
				$this->session->set_userdata('message', $message);
				redirect('Admin/collegeList');
			}
		}
		else
		{
			$message = "College Name Already Exists";
			$this->session->set_userdata('message', $message);
			$this->load->model('Admin_model', 'a');
			$id = $this->input->post('id');
			$data['collegeData'] = $this->a->loadCollege($id);
			$data['act'] = "Update";
			$this->load->view('admin/collegeInput', $data);
		}	
	}

	//USERS

	public function adminuserList()
	{
		$this->load->model('Admin_model', 'a');
		$data['adminUserData'] = $this->a->getAdminUsers();
		$this->load->view('admin/adminuser', $data);
	}
	public function addAdminUser()
	{
		$this->load->model('Admin_model', 'a');
		$data['userLevel'] = $this->a->getUserLevel();
		$data['empId'] = $this->a->getAutoID();
		$data['act'] = "Add";
		$data['check'] = "0";
		$this->load->view('admin/adminUserInput', $data);
	}
	public function saveAdminUser()
	{
		$this->load->model('Admin_model', 'a');
		$empid = $this->input->post('employeeid');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$password = password_hash($password, PASSWORD_DEFAULT);
		$fname = $this->input->post('fname');
		$lname = $this->input->post('lname');
		$userlevel = $this->input->post('userlevel');
		$adminUserInfo = array(
				'employeeid' => $empid,
				'username' => $username,
				'password' => $password,
				'fname' => $fname,
				'lname' => $lname,
				'level' => $userlevel,
			);
		$res = $this->a->saveAdminUser($adminUserInfo);
		if($res)
		{
			$message = "User Data Saved Successfuly";
			$this->session->set_userdata('message', $message);
			redirect('Admin/adminuserList');
		}
	}
	public function updateAdminUser()
	{
		$this->load->model('Admin_model', 'a');
		//load all data
		$id = $this->input->post('id');
		$data['adminUserInfo'] = $this->a->loadAdminUser($id);
		//get for data
		$data['userLevel'] = $this->a->getUserLevel();
		$data['act'] = "Update";
		$this->load->view('admin/adminUserInput', $data);
	}

	public function saveUpdateAdminUser()
	{
		$this->load->model('Admin_model', 'a');
		$empid = $this->input->post('empid');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$password = password_hash($password, PASSWORD_DEFAULT);
		$fname = $this->input->post('fname');
		$lname = $this->input->post('lname');
		$userlevel = $this->input->post('userlevel');
		$stat = $this->input->post('stat');
		if($stat == "active")
		{
			$status = "active";
		}
		else
		{
			$status = "inactive";
		}
		$adminUserInfo = array(
				'employeeid' => $empid,
				'username' => $username,
				'password' => $password,
				'fname' => $fname,
				'lname' => $lname,
				'level' => $userlevel,
				'status' => $status
			);
		$res = $this->a->saveUpdateAdminUser($adminUserInfo, $empid);
		if($res)
		{
			$message = "User Data Updated Successfuly";
			$this->session->set_userdata('message', $message);
			redirect('Admin/adminuserList');
		}
	}

	//LOGIN REQUEST

	public function loginRequest()
	{
		$this->load->model('Admin_model', 'a');
		$data['requestAcc'] = $this->a->getListOfRequest();
		$data['act'] = "Add";
		$this->load->view('admin/requestLogin', $data);
	}
	public function viewRequest()
	{
		$this->load->model('Admin_model', 'a');
		$reqId = $this->input->post('id');
		$data['requestAcc'] = $this->a->loadListOfRequest($reqId);
		$data['act'] = "View";
		$this->load->view('admin/loginrequestInput', $data);
	}
	public function requestAction()
	{
		$this->load->model('Admin_model', 'a');
		$action = $this->input->post('actionForRequest');
		$id = $this->input->post('id');
		$name = $this->input->post('comname');
		$email = $this->input->post('email');
		if($action == "accept")
		{
			$pass = str_replace(' ', '', $name);
			$pass = substr($pass, 0, 5);
			$p = $pass.'123';
			$orgpass = $pass.'123';
			$hashedpass = password_hash($orgpass, PASSWORD_DEFAULT);
			$userlevel = "3";
			$status = "active";
			$update = array(
				'password' => $hashedpass,
				'userlevel' => $userlevel,
				'orgpass' => $orgpass,
				'status' => $status
			);
			$data['request'] = "Confirmed";
			$data['requestAcc'] = $this->a->loadListOfRequest($id);
			$data['act'] = "Send Mail";
			$res = $this->a->updateStatus($update, $id);

			foreach ($data['requestAcc'] as $li) 
			{
				$companyname = $li->companyname;
				$email = $li->email;
				$orgpass = $li->orgpass;
				$name = ucfirst($li->fname) . ' ' . ucfirst($li->lname);
				$position = $li->position;
				$contactnum = $li->contactnum;
				$address = $li->address;
			}
			$config = Array(
			  'protocol' => 'smtp',
			  'smtp_host' => 'ssl://smtp.googlemail.com',
			  'smtp_port' => 465,
			  'smtp_user' => 'tupichecker@gmail.com', // change it to yours
			  'smtp_pass' => 'tupregistrar', // change it to yours
			  'mailtype' => 'html',
			  'charset' => 'iso-8859-1',
			  'wordwrap' => TRUE
			);

			$message = '

			<h2>iChecker Email Verified</h4><br>
			<h4>Your Email Have been verified</h4>
			<h3>Account Details</h3>
			<h4>Company Name: '.$companyname.'</h4>
			<h4>Contact Person: '.$name.'</h4>
			<h4>Contact No: '.$contactnum.'</h4>
			<h4>Position: '.$position.'</h4>
			<h4>Email: '.$email.'</h4>
			<h4>Password: '.$p.'</h4>
			<h4>Company Address: '.$address.'</h4><br>
			<h3>To login you can click <a href="'.base_url().'User/userLogin">Here</a>.</h3><br>

			';
	    $this->load->library('email', $config);
	    $this->email->set_newline("\r\n");
	    $this->email->from('ichecker-noreply@gmail.com'); // change it to yours
	    $this->email->to($email);// change it to yours
	    $this->email->subject('iChecker - Request for Login');
	    $this->email->message($message);
	    if($this->email->send())
			{
	      $message = "User Request Accepted Successfuly";
				$this->session->set_userdata('message', $message);
				redirect(base_url().'Admin/loginRequest');
	    }
	    else
	    {
	     show_error($this->email->print_debugger());
	    }
		}
	}
	public function mainuserList()
	{
		$this->load->model('Admin_model', 'a');
		$data['listOfMainUser'] = $this->a->getListOfUser();
		$this->load->view('admin/mainUserTbl', $data);
	}
	public function viewMainUser()
	{
		$this->load->model('Admin_model', 'a');
		$id = $this->input->post('id');
		$data['act'] = "mainUser";
		$data['user'] = $this->a->loadListOfUser($id);
		$this->load->view('admin/loginrequestInput', $data);
	}
	public function statusAction()
	{
		$this->load->model('Admin_model', 'a');
		$stat = $this->input->post('stat');
		if($stat == "deactive")
		{
			$id = $this->input->post('id');
			$status = "active";
			$deac = array(
				'status' => $status
			);
			$result = $this->a->deactivate($id, $deac);
			if($result)
			{
				$this->session->set_userdata('message', $message);
				$data['message'] = "User Deactivated";
				redirect('Admin/mainuserList');
			}
		}
		if($stat == "active")
		{
			$id = $this->input->post('id');
			$status = "inactive";
			$deac = array(
				'status' => $status
			);
			$result = $this->a->deactivate($id, $deac);
			if($result)
			{
				$this->session->set_userdata('message', $message);
				$data['message'] = "User Deactivated";
				redirect('Admin/mainuserList');
			}
		}
	}
	// public function sendemail()
	// {
	// 	$config = Array(
	// 	  'protocol' => 'smtp',
	// 	  'smtp_host' => 'ssl://smtp.googlemail.com',
	// 	  'smtp_port' => 465,
	// 	  'smtp_user' => 'tupichecker@gmail.com', // change it to yours
	// 	  'smtp_pass' => 'tupregistrar', // change it to yours
	// 	  'mailtype' => 'html',
	// 	  'charset' => 'iso-8859-1',
	// 	  'wordwrap' => TRUE
	// 	);

	// 	$message = '

	// 	<h2>iChecker Email Verified</h4><br><br>
	// 	<h4>Your Email Have been verified</h4><br><br>
	// 	<h3>Account Details</h3><br><br>
	// 	<h4>Company Name: '.$companyname.'</h4><br>
	// 	<h4>Contact Person: '.$name.'</h4><br>
	// 	<h4>Contact No: '.$contactnum.'</h4><br>
	// 	<h4>Position: '.$position.'</h4><br>
	// 	<h4>Email: '.$email.'</h4><br>
	// 	<h4>Password: '.$orgpass.'</h4><br>
	// 	<h4>Company Address: '.$address.'</h4><br><br>
	// 	<h3>To login you can click <a href="'.base_url().'User/userLogin">Here</a>.</h3><br>

	// 	';
 //    $this->load->library('email', $config);
 //    $this->email->set_newline("\r\n");
 //    $this->email->from('ichecker-noreply@gmail.com'); // change it to yours
 //    $this->email->to('ryanICTII@gmail.com');// change it to yours
 //    $this->email->subject('iChecker - Request for Login');
 //    $this->email->message($message);
 //    if($this->email->send())
	// 	{
 //      echo 'Email sent.';
 //    }
 //    else
 //    {
 //     show_error($this->email->print_debugger());
 //    }
	// }







  //  		//$file_path = 'uploads/' . $file_name;
  //     $this->load->library('email', $config);
  //     $this->email->set_newline("\r\n");
  //     $this->email->from('tupichecker@gmail.com', 'iChecker TUP Document Verification System');
		//   $this->email->to("ryanICTII@gmail.com");
		//   $this->email->message("Hello World");
		//   if($this->email->send())
  //     {
  //     	$_SESSION['message'] = "Login Request Confirmed Successfully";
  // 			redirect('Admin/viewRequest');
 //  //     }
	// 	// }
	// 	if($action == "decline")
	// 	{
			
	// 	}
	// }

	

	// public function adminUserUpdate()
	// {
	// 	$this->
	// }
	// public function updateDocType()
	// {
	// 	$this->load->model('Admin_model', 'a');
	// 	$docId = $this->input->get('updateDocType');
	// 	$data['docTypeInfo'] = $this->a->loadDocumentType($docId);
	// 	$this->load->view('admin/updateDocumentType', $data);
	// }
	// public function saveUpdateDocumentType()
	// {
	// 	$this->load->model('Admin_model', 'a');
	// 	// $result = $this->a->
	// 	$data['dType'] = $this->a->getDocumentType();
	// 	$data['message'] = "Document Type Updated Successfuly";
		
	// }



}
?>