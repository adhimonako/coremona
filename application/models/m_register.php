<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_register extends CI_Model 
{

	public function save($data, $id=FALSE) 
	{
		if ($id == FALSE) {
			$this->db->set($data)->insert('user');
			return $this->db->insert_id();
		} else { //update data
			$this->db->where('ID_User', $id);
			$this->db->set($data);
			$this->db->update('user');
		}
	}

	public function get() //buat tampilkan semua data
	{
		$this->db->select("*")->from('user');
		$query = $this->db->get();
		return $query->result_array(); 
	}

	public function get_login($val, $single=FALSE) // buat cek login di web
	{
		$this->db->select("*")->from('user');
		$this->db->where($val);
		if ($single == true) {
			$this->db->limit(1);
		}
		$query= $this->db->get();
		if ($single == true) {
			return $query->row_array();
		} else {
			return $query->result_array();
		}
	}

	public function get_single_user($idUser) //buat manage user
	{
		$this->db->select("*")->from('user');
		//pengecekan id
		if (empty($idUser)) {
			return false;
		}
		$this->db->where('ID_User', (int) $idUser);

		$query = $this->db->get();
		return $query->result_array();
	}

	//buat ngecek user di API
	public function cek_login($nm_user,$pass_user) { 
		$query = $this->db->get_where("user",array("Nama_User"=>$nm_user,"Pass_User"=>$pass_user));
		$result = $query->row_array();
		return $result;
	}
}