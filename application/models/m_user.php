<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 
class M_user extends CI_Model 
{
	//buat model API
	public function checkUserById($idUser) 
	{
		$this->db->select("*")->from('user');
		$this->db->where('user_id', $idUser);
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
        
	public function get_single_user($idUser) //buat manage user
	{
		$this->db->select("*")->from('user');
		//pengecekan id
		if (empty($idUser)) {
			return false;
		}
		$this->db->where('user_id', (int) $idUser);

		$query = $this->db->get();
		return $query->result_array();
	}
	//buat manage delete user
	public function delete($id)
	{
		$this->db->where('user_id', $id);
		$this->db->delete('user');
	}
        
	public function save($data, $id=FALSE) 
	{
		if ($id == FALSE) {
			$this->db->set($data)->insert('user');
			return $this->db->insert_id();
		} else { //update data
			$this->db->where('user_id', $id);
			$this->db->set($data);
			$this->db->update('user');
		}
	}}

