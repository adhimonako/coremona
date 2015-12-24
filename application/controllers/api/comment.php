<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once ( APPPATH . '/libraries/REST_Controller.php');

class Comment extends REST_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("m_ebook","",TRUE);
        $this->load->model("m_user","",TRUE);
        $this->load->model("m_comment","",TRUE);
	}

	//insert comment per id_ebook
	public function insert_comment_post()
	{
		$idUser = $this->post('idUser');
		$idEbook = $this->post('idEbook');
		$tgl_comment = date('Y-m-d H:i:s');
		$komen_ebook = $this->post('komen_ebook');     

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

     	if (empty($komen_ebook)) {
     		$this->response(array('status'=>0,'error'=>'Tolong Inputkan Komentar'));
            return;
     	}

        $data = array("ID_User"=>$idUser,"ID_Ebook"=>$idEbook,
         	"tgl_comment"=>$tgl_comment,"Komen_Ebook"=>$komen_ebook);

        if ($this->m_comment->save($data)) {
        	$this->response(array('status' => 1,'message' => 'Komentar Sukses', 'komentar' => $data));
        } else {
            $this->response(array('status'=> 0,'error'=> "Please Cek Inputan"));
        }
	}

    //get comment per id ebook
    public function get_comment_get()
    {
        $idEbook = $this->get('idEbook');
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

        $getEbookComment = $this->m_comment->getCommentByidEbook($idEbook);

        if ($getEbookComment) {
            $this->response(array('status'=>1,'message'=>'ebook ada di dalam server','komentar'=>$getEbookComment));
            return;
        }

        $this->response(array('status'=>0,'error'=>'Ebook Tidak Ada Di Server'));
        return;
    }
}