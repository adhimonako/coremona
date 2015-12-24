<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_ebook extends CI_Model 
{
	//save data
	public function save($data,$id=FALSE) 
	{
		if ($id == FALSE) {
			$this->db->set($data)->insert('ebook');
			return $this->db->insert_id();
		} else { //update data
			$this->db->where('ID_Ebook', $id);
			$this->db->set($data);
			$this->db->update('ebook');
		}
	}

	//untuk tampilkan semua ebook
	public function get() 
	{
		
		$this->db->select("*")->from('ebook');
		$query = $this->db->get();
		return $query->result_array(); 
	}

	//untuk tampilkan ebook per user, id untuk parameter id dlm database, 
	public function get_single_ebook_by_id_ebook($idEbook)
	{
		$this->db->select("*")->from('ebook');
		//pengecekan id
		if (empty($idEbook)) {
			return false;
		}
		$this->db->where('ID_Ebook', (int) $idEbook);

		$query = $this->db->get();
		return $query->row();
	}

	/*
	* @param idUser integer ID User
	* @return Object Ebook
	*/
	public function get_all_ebook_by_id_user($idUser, $limit=20, $offset=0)
	{
		$this->db->select("*")->from('ebook');
		//pengecekan id
		if (empty($idUser)) {
			return false;
		}
		$this->db->where('ID_User', (int)$idUser);

		$query = $this->db->get();
		return $query->result_array();
	}

	//fungsi buat delete ebook per id
	public function delete($id)
	{
		$this->db->where('ID_Ebook', $id);
		$this->db->delete('ebook');
	}

	// searching ebook
	public function get_all_ebook_by_search($params, $limit=20, $offset=0)
	{
		$this->db->select("Judul_Ebook")->from('ebook');

		$this->db->like('Judul_Ebook',$params); 

		$query = $this->db->get();
		return $query->result_array();
	}

	// cek API ID Ebook
	public function checkEbookById($idEbook) 
	{
		$this->db->select("*")->from('ebook');
		$this->db->where('ID_Ebook', $idEbook);
		$query = $this->db->get();
		return $query->row();
	}

	//cek API list ebook
	public function listEbook($idUser, $limit=20, $offset=0)
	{
		$data = $this->db->query("select ebook.Judul_Ebook AS 'jdl_ebook', ebook.Upload_Image_Ebook AS 'Cover_Ebook',
								(select count(suka.ID_Suka) from suka where suka.ID_Ebook = ebook.ID_Ebook) as 'jumlah_suka',
        						(select count(comment.ID_Comment) from comment where comment.ID_Ebook = ebook.ID_Ebook) as 'jumlah_comment'
								FROM ebook
								where ebook.ID_Ebook in(
    								select ebook.ID_Ebook
   									FROM ebook
    								where ebook.ID_User = '$idUser'
								)")->result();
		return $data;
	}

	//cek API list ebook
	public function getListEbook($idEbook,$limit=20, $offset=0)
	{
		$data = $this->db->query("select * FROM ebook where ID_Ebook = '$idEbook' and Active ='1'")->result();

		return $data;
	}

	//get permisson for download
	public function getPermisson($idEbook)
	{
		$data = array('Active'=>1);
		$this->db->where('ID_Ebook', $idEbook);
		$this->db->update('ebook',$data);
	}
	
}

