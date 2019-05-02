<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Admin_model extends CI_Model 
	{
		public function verifyLogin($username, $password)
		{
			//check username 
			$this->db->select('*');
			$this->db->where('username', $username);
			$res = $this->db->get('adminusertbl');
			$row = $res->num_rows();
			$message = "";
			if($row != 1)
			{
				$message = "No Account Found";
				return $message;
			}
			else
			{
				return $res->result();
			}
		}
		// VERIFY DOCUMENT
		public function searchDocu($docToSearch)
		{
			$this->db->select('*');
			$this->db->where('qrcode', $docToSearch);
			$res = $this->db->get('documenttbl');
			return $res->num_rows();
		}
		public function getDocumentData($code)	
		{
			$this->db->select('*');
			$this->db->where('qrcode', $code);
			$results = $this->db->get('documenttbl');
			return $results->result();
		}
		public function loadCourses($collegeid)
		{
			$this->db->select('*');
			$this->db->where('collegeid',$collegeid);
			$query = $this->db->get('coursetbl');
			return $query->result();
		}
		public function loadCoursesVerify($courseid)
		{
			$this->db->select('*');
			$this->db->where('id',$courseid);
			$query = $this->db->get('coursetbl');
			return $query->result();
		}
		public function loadCollege($collegeid)
	  {
	  	$this->db->select('*');
	  	$this->db->where('id', $collegeid);
			$que = $this->db->get('collegetbl');
			return $que->result();
	  }
	  public function loadDocumentType($docu)
	  {
	  	$this->db->select('*');
	  	$this->db->where('id', $docu);
			$que = $this->db->get('documenttypetbl');
			return $que->result();
	  }

	  //ADD DOCUMENT
	  public function verifyQR($code)
		{
			$this->db->select('*');
			$this->db->where('code', $code);
			$result = $this->db->get('qrcodestbl');
			$count = $result->num_rows();
			return $count;
		}
		public function validateQr($code)
		{
			$counter = 0;
			$this->db->select('*');
			$this->db->where('qrcode', $code);
			$result = $this->db->get('documenttbl');
			$row = $result->num_rows();
			return $row;
		}
		public function getCollege()
	  {
	  	$this->db->select('*');
			$que = $this->db->get('collegetbl');
			return $que->result();
	  }
	  public function getCourse()
		{
			$this->db->select('*');
			$query = $this->db->get('coursetbl');
			return $query->result();
		}
	  public function getDocumentType()
	  {
	  	$this->db->select('*');
			$que = $this->db->get('documenttypetbl');
			return $que->result();
	  }  

		//UPDATE DOCUMENT

		public function updateDocument($data, $mainId)
		{
			$this->db->where('qrcode', $mainId);
			$res = $this->db->update('documenttbl', $data);
			if($res)
			{
				return true;
			}
			else
			{
				return false;
			}	
		}
		public function saveAddDocument($documentData)
		{
			$res = $this->db->insert('documenttbl', $documentData); 
			if($res)
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		public function updateQrTbl($codeId)
		{
			$data = array(
				'used' => '1'
			);
			$this->db->where('code', $codeId);
			$rese = $this->db->update('qrcodestbl', $data);
			if($rese)
			{
				return true;
			}
			else
			{
				return false;
			}	
		}

		//GENERATE QR
		public function getgeneratedqr()
		{
			// select AUTO_INCREMENT as 'AI' from information_schema.TABLES WHERE TABLE_SCHEMA = '$database' AND TABLE_NAME = 'memberdetailstbl';

			$database = $this->db->database;
			$this->db->select('AUTO_INCREMENT AS `AI`');
			$whereArray = array('TABLE_SCHEMA' => $database, 'TABLE_NAME' => 'qrcodestbl');
			$this->db->where($whereArray);
			$query = $this->db->get('information_schema.TABLES');

			$result = $query->result();

			foreach ($result as $i) 
			{
				$r = $i->AI;
			}

			$used = "0";

			for($i = 1; $i <= 56; $i++)
			{
				$hashed = password_hash($r, PASSWORD_DEFAULT);
				// verify = password_verify($userinput, $hash)
				$dataOnInsert = array(
					'used' => $used,
					'code' => $hashed
				);
				
				$this->db->insert('qrcodestbl', $dataOnInsert);
				
				$r = $r + 1;
			}

			$this->db->select('*');
			$res = $this->db->get('qrcodestbl');

			return $res->result();
		}

		//DOCUMENT TYPE
		public function saveDocuType($data)
		{
			$res = $this->db->insert('documenttypetbl', $data); 
			if($res)
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		public function verifyDocuType($type, $id)
		{
			$this->db->select('*');
			$this->db->where('documenttype', $type);
			$this->db->where('id !=', $id);
			$res = $this->db->get('documenttypetbl');
			return $res->num_rows();
		}
		public function saveUpdateDocuType($data, $id)
		{
			$this->db->where('id', $id);
			$res = $this->db->update('documenttypetbl', $data);
			if($res)
			{
				return true;
			}
			else
			{
				return false;
			}
		}

		//COURSES
		
		public function saveCourse($data)
		{
			$res = $this->db->insert('coursetbl', $data); 
			if($res)
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		public function verifyCourseName($name, $id)
		{
			$this->db->select('*');
			$this->db->where('coursename', $name);
			$this->db->where('id !=', $id);
			$res = $this->db->get('coursetbl');
			return $res->num_rows();
		}
		public function saveUpdatedCourse($data, $id)
		{
			$this->db->where('id', $id);
			$res = $this->db->update('coursetbl', $data); 
			if($res)
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		public function saveCollege($data)
		{
			$res = $this->db->insert('collegetbl', $data); 
			if($res)
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		public function verifyCollegeName($name)
		{
			$this->db->select('*');
			$this->db->where('collegename', $name);
			$res = $this->db->get('collegetbl');
			return $res->num_rows();
		}

		// USERS

		public function getAdminUsers()
		{
			$this->db->select('*');
			$res = $this->db->get('adminusertbl');
			return $res->result();
		}
		public function getUserLevel()
		{
			$this->db->select('*');
			$res = $this->db->get('userleveltbl');
			return $res->result();
		}
		public function getAutoID()
		{
			$database = $this->db->database;
			$this->db->select('AUTO_INCREMENT AS `AI`');
			$whereArray = array('TABLE_SCHEMA' => $database, 'TABLE_NAME' => 'adminusertbl');
			$this->db->where($whereArray);	
			$query = $this->db->get('information_schema.TABLES');
			return $query->result();
		}
		public function saveAdminUser($data)
		{
			$res = $this->db->insert('adminusertbl', $data); 
			if($res)
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		public function loadAdminUser($id)
		{
			$this->db->select('*');
			$this->db->where('id', $id);
			$res = $this->db->get('adminusertbl');
			return $res->result();			
		}
		public function saveUpdateAdminUser($data, $mainId)
		{
			$this->db->where('employeeid', $mainId);
			$res = $this->db->update('adminusertbl', $data);
			if($res)
			{
				return true;
			}
			else
			{
				return false;
			}	
		}

		//LOGIN REQUEST
		public function getListOfRequest()
		{
			$this->db->select('*');
			$this->db->where('password', '-');
			$this->db->where('status', 'inactive');
			$res = $this->db->get('mainusertbl');
			return $res->result();
		}
		public function loadListOfRequest($id)
		{
			$this->db->select('*');
			$this->db->where('id', $id);
			$this->db->where('status', 'inactive');
			$this->db->where('password', '-');
			$res = $this->db->get('mainusertbl');
			return $res->result();
		}
		public function updateStatus($data, $id)
		{
			$this->db->where('id', $id);
			$result = $this->db->update('mainusertbl', $data);
			if($result)
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		public function getListOfUser()
		{
			$this->db->select('*');
			$this->db->where('password !=', '-');
			$return = $this->db->get('mainusertbl');
			return $return->result();
		}
		public function loadListOfUser($id)
		{
			$this->db->select('*');
			$this->db->where('id', $id);
			// $this->db->where('status', 'active');
			$res = $this->db->get('mainusertbl');
			return $res->result();
		}
		public function deactivate($id, $data)
		{
			$this->db->where('id', $id);
			$result = $this->db->update('mainusertbl',$data);
			if($result)
			{
				return true;
			}
			else
			{
				return true;
			}
		}
	}
?>