<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class User_model extends CI_Model 
	{
		public function saveRequestLogin($data)
		{
			$res = $this->db->insert('mainusertbl', $data); 
			if($res)
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		public function checkEmail($email)
		{
			$this->db->select('*');
			$this->db->where('email', $email);
			$result = $this->db->get('mainusertbl');
			return $result->result();
		}
		public function checkPassword($email)
		{
			$this->db->select('*');
			$this->db->where('email', $email);
			$res = $this->db->get('mainusertbl');
			return $res->result();
		}
		public function loadUserInfo($id)
		{
			$this->db->select('*');
			$this->db->where('id', $id);
			$res = $this->db->get('mainusertbl');
			return $res->result();
		}
		public function loadScannedDocument($id)
		{
			$this->db->select('*');
			$this->db->where('companyid', $id);
			$result = $this->db->get('scanneddocu');
			return $result->result();
		}
		public function insertScanned($documentid, $name, $docId,$comId)
		{
			$date = date('Y-m-d');
			$data = array(

				'docuid'=>$documentid,
				'name'=>$name,
				'documenttype'=>$docId,
				'companyid'=> $comId,
				'date'=>$date

			);
			$res = $this->db->insert('scanneddocu', $data);
			return $res;
		}	
		public function getDocuData($id)	
		{
			$this->db->select('*');
			$this->db->where('id', $id);
			$results = $this->db->get('documenttbl');
			return $results->result();
		}
		public function getDocuToScan($id)
		{
			$this->db->select('*');
			$this->db->where('id', $id);
			$result = $this->db->get('documenttbl');
			return $result->result();
		}
	}
?>