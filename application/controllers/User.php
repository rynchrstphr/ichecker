<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
	}	
	public function userHome()
	{
		$this->load->view('home');
	}
	public function userLogin()
	{
		$this->load->view('login');
	}
	public function userVerifyLogin()
	{
		$this->load->model('User_model', 'u');
		$email = $this->input->post('email');
		$mainpass = $this->input->post('password');
		//check email
		$check = $this->u->checkEmail($email);
		if($check)
		{
			//check password
			$data['userDetails'] = $this->u->checkPassword($email);
			foreach($data['userDetails'] as $d)
			{
				$pass = $d->password;
				$id = $d->id;
				$companyname = $d->companyname;
			}
			if(password_verify($mainpass, $pass))
			{
				$this->session->set_userdata('id', $id);
				$this->session->set_userdata('mainUser', $companyname);			
				redirect('User/loadMainUI');
			}
			else
			{
				$message = "Wrong Login Details Combination";
				$this->session->set_userdata('message', $message);
				redirect('User/userLogin');
			}	
		}
		else
		{
			$message = "Account Not Found.";
			$this->session->set_userdata('message', $message);
			redirect('User/userLogin');
		}
	}
	public function userLogout()
	{
		$this->session->set_userdata('mainUser');
		redirect('User/userHome');
	}
	public function userRequest()
	{
		$this->load->view('requestlogin');
	}
	public function userRequestLogin()
	{
		$this->load->model('User_model', 'u');
		$companyname = $this->input->post('companyname');
		$email = $this->input->post('email');
		$fname = $this->input->post('fname');
		$lname = $this->input->post('lname');
		$position = $this->input->post('position');
		$contactnum = $this->input->post('contactnum');
		$companyaddress = $this->input->post('companyaddress');

		$requestData = array(
			'companyname' => $companyname,
			'email' => $email,
			'fname' => $fname,
			'lname' => $lname,
			'position' => $position,
			'contactnum' => $contactnum,
			'address' => $companyaddress
		);

		$insertRes = $this->u->saveRequestLogin($requestData);
		if($insertRes)
		{
			$message = "Request for Login Details have been submitted. Please wait for your confirmation email after we verify the information you submitted.";
			$this->session->set_userdata('message', $message);
			$this->load->view('requestVerify');
		}
	}
	public function userVerifyMessage()
	{
		$this->load->view('requestVerify');
	}
	public function loadMainUI()
	{
		$this->load->model('User_model', 'u');
		$id = $this->session->userdata('id');
		$data['info'] = $this->u->loadUserInfo($id);
		$data['scannedDocu'] = $this->u->loadScannedDocument($id);
		$this->load->view('mainUserUI', $data);
	}

	// SCAN DOCUMENT

	public function userVerifyScan()
	{
		$this->load->view('verifydocuscan');
	}

	public function verifyDocuScan()
	{
		$this->load->model('Admin_model', 'a');
		$this->load->model('User_model', 'u');
		$qrCode = $this->input->post('code');
		$res = $this->a->searchDocu($qrCode);
		if($res < 1)
		{
			$data['found'] = "0";
			$data['qrCode'] = $qrCode;
			$this->load->view('scanned', $data);	
		}
		else
		{
			$comId = $this->session->userdata('id');
			$data['found'] = "1";
			$data['qrCode'] = $qrCode;
			$data['docuData'] = $this->a->getDocumentData($qrCode);
			$cId = "";
			foreach ($data['docuData'] as $d) 
			{
				$documentid = $d->id;
				$cId = $d->collegeid;
				$corId = $d->courseid;
				$docId = $d->documentid;
				$name = ucfirst($d->fname).' '.ucfirst($d->lname);
			}
			$data['coursePost'] = $this->a->loadCoursesVerify($corId);
			$data['collegePost'] = $this->a->loadCollege($cId);
			$data['documentTypePost'] = $this->a->loadDocumentType($docId);
			$res = $this->u->insertScanned($documentid, $name, $docId,$comId);
			$this->load->view('scanned', $data);
		}
	}
	public function viewScanned()
	{
		$this->load->model('User_model', 'u');
		$this->load->model('Admin_model', 'a');
		$data['found'] = "1";
		$id = $this->input->post('id');
		$data['docuId'] = $id;
		$data['docuData'] = $this->u->getDocuData($id);
		$cId = "";
		foreach ($data['docuData'] as $d) 
		{
			$documentid = $d->id;
			$cId = $d->collegeid;
			$corId = $d->courseid;
			$docId = $d->documentid;
			$name = ucfirst($d->fname).' '.ucfirst($d->lname);
		}
		$data['coursePost'] = $this->a->loadCoursesVerify($corId);
		$data['collegePost'] = $this->a->loadCollege($cId);
		$data['documentTypePost'] = $this->a->loadDocumentType($docId);
		$this->load->view('scannedview', $data);
	}
	// public function printDocument()
	// {
	// 	$this->load->model('User_model', 'u');
	// 	$this->load->library('fpdf');
	// 	$id = $this->input->get('id');
	// 	$data['mainId'] = $id;
	// 	$data['documentData'] = $this->u->getDocuToScan($id);
	// 	$this->load->view('printScanned', $data);
	// }
}
?>













