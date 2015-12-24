<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Comment extends CI_Controller 
{
	// save kkoment
	public function save($data,$id = FALSE) 
	{
		if ($id == FALSE) {
			$this->db->set($data)->insert("comment");
			return $this->db->insert_id();
		} else {
			$this->db->where('comment',$id);
			$this->db->set($data);
			$query = $this->db->update('comment');

		}
	}

	//fungsi delete comment
	public function delete()
	{
		$this->db->where('ID_Comment', $id);
		$this->db->delete('comment');
	}

	//untuk tampilkan semua comment
	public function get() 
	{
		//$this->db->select("*")->from('ebook');
		$this->db->select("*")->from('comment');
		$query = $this->db->get();
		return $query->result_array(); 
	}

	//get komment per id ebook 
	public function getCommentByidEbook($idEbook, $id_ebook_offset="", $limit = 10)
	{
		$this->db->select("Komen_Ebook")->from('comment');
		$this->db->where('ID_Ebook', $idEbook,$id_ebook_offset,$limit = 10);
		$query = $this->db->get();
		return $query->result_array();
	}

	//get jumlah komentar per id ebook
	public function getJumlahCommentByidEbook($idEbook)
	{
		$data = $this->db->query("select count('ID_Comment') as 'jumlah_comment' from comment where ID_Ebook = $idEbook")->result();

		foreach ($data as $row) {
			$jumlah_comment = $row->jumlah_comment;
		}

		return $jumlah_comment;
	}


}
/*
		$this->db->select($kolom)->get('comment');
		$this->db->join('ebook','comment.ID_Ebook = ebook.ID_Ebook','inner');*/