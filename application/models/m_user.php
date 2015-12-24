<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 
class M_user extends CI_Model 
{
	//buat model API
	public function checkUserById($idUser) 
	{
		$this->db->select("*")->from('user');
		$this->db->where('ID_User', $idUser);
		$query = $this->db->get();
		return $query->row();
	}

	//untuk tampilkan semua user
	public function get() 
	{
		$this->db->select("*")->from('user');
		$query = $this->db->get();
		return $query->result_array(); 
	}

	//buat manage delete user
	public function delete($id)
	{
		$this->db->where('ID_User', $id);
		$this->db->delete('user');
	}
}

