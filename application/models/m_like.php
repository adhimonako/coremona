<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_like extends CI_Controller 
{
	// save suka
	public function save($data,$id = FALSE) 
	{
		if ($id == FALSE) {
			$this->db->set($data)->insert("suka");
			return $this->db->insert_id();
		} else {
			$this->db->where('suka',$id);
			$this->db->set($data);
			$query = $this->db->update('suka');

		}
	}

	//fungsi delete suka
	public function delete()
	{
		$this->db->where('ID_Suka', $id);
		$this->db->delete('suka');
	}

	//untuk tampilkan semua suka
	public function get() 
	{
		//$this->db->select("*")->from('ebook');
		$this->db->select("*")->from('suka');
		$query = $this->db->get();
		return $query->result_array(); 
	}

	//untuk ngecount like
	public function count_like($idEbook, $idUser)
	{
		$data = $this->db->query("select count('ID_Suka') as 'jumlah_like' from suka where ID_Ebook = '$idEbook' AND ID_User = '$idUser'")->result();

		foreach ($data as $row) {
			$suka = $row->jumlah_like;
		}

		return $suka;
	}
}
///tgtssd