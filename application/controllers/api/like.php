<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once ( APPPATH . '/libraries/REST_Controller.php');

class Like extends REST_Controller 
{
	public function __construct()
    {
        parent::__construct();
        $this->load->model("m_ebook","",TRUE);
        $this->load->model("m_user","",TRUE);
        $this->load->model("m_like","",TRUE);
    }

	//insert like to ebook
	public function insert_like_post()
	{
        $idEbook = $this->post('idEbook');
		$idUser = $this->post('idUser');
		
		// cek inputan user
        if (empty($idUser) || !isset($idUser)) {
            $this->response(array('status'=>0,'error'=>'Tolong Inputan ID User'));
            return;
        }

        //cek id user
        if (!is_numeric($idUser)) {
            $this->response(array('status'=>0,'error'=>'Tolong Cek Format ID User'));
            return;
        }

        $checkUser = $this->m_user->checkUserById($idUser);

        //cek user id apakah ada di database
        if (!$checkUser) {
            $this->response(array('status'=>0,'error'=>'User Tidak Terdaftar'));
            return;
        }

        if (empty($idEbook) || !isset($idEbook)) {
            $this->response(array('status'=>0,'error'=>'Tolong Inputan ID Ebook'));
            return;
        }

        //cek id ebook
        if (!is_numeric($idEbook)) {
            $this->response(array('status'=>0,'error'=>'Tolong Cek Format ID Ebook'));
            return;
        }
	    
	    $checkIdEbook = $this->m_ebook->checkEbookById($idEbook);

        //cek id ebook  apakah ada di database
        if (!$checkIdEbook) {
            $this->response(array('status'=>0,'error'=>'Ebook Tidak Ada Di Dalam Server'));
            return;
        }

        $count_like = $this->m_like->count_like($idEbook,$idUser);
        if ($count_like == 0) {
            $data = array(
                        'ID_Ebook' => $idEbook,
                        'ID_User' => $idUser,
                    );
            $this->m_like->save($data);
            $this->response(array('status' => '1', 'message' => 'Like Sukses'));
        } else {
            $this->response(array('status' => '0', 'message' => 'Sudah Melakukan Like pada ID Ebook Yang Sama'));
        }
        

	}
}