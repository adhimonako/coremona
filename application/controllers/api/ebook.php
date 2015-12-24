<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once ( APPPATH . '/libraries/REST_Controller.php');

class Ebook extends REST_Controller 
{
	public function __construct()
    {
        parent::__construct();
        $this->load->model("m_ebook","",TRUE);
        $this->load->model("m_user","",TRUE);
        $this->load->model("m_comment","",TRUE);
    }

     //inputan detail ebook yang di miliki user
    public function detail_ebook_get()
    {
        $idUser = $this->get('id_user');     

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

        //get data id ebook
        $getEbooksUser = $this->m_ebook->get_all_ebook_by_id_user($idUser);

        if ($getEbooksUser) {
            $this->response(array('status'=>1,'message'=>'ebook ada di server','data'=>$getEbooksUser));
            return;
        }

        $this->response(array('status'=>0,'error'=>'User Tidak Memiliki Ebook'));
        return;
    }

    // searhing by judul ebook
    public function search_ebooks_get()
    {
        $searchTitle = $this->get('search');     

        // cek bila inputan kosong
        if (empty($searchTitle) || !isset($searchTitle)) {
            $this->response(array('status'=>0,'error'=>'Tolong Input Judul Ebook'));
            return;
        }

        $getEbookSearch = $this->m_ebook->get_all_ebook_by_search($searchTitle);

        //bila hasil seacrhing ketemu
        if ($getEbookSearch) {
            $this->response(array('status'=>1,'message'=>'Ebook Ada Di Dalam Server','nama ebook'=>$getEbookSearch));
            return;
        }

        $this->response(array('status'=>0,'error'=>'Ebook Tidak Ada Di Server'));
        return;
    }

   
    // Ambil get list data ebboks yang di miliki user
    public function get_list_ebooks_get()
    {
        $idUser = $this->get('idUser');     

        // cek inputan usersi
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

        $getEbooksUser = $this->m_ebook->get_all_ebook_by_id_user($idUser);

        if (!$getEbooksUser) {
            $this->response(array('status'=>0,'message'=>'Ebook Tidak Ada Di Server'));
            return;
        }

        $getListEbook = $this->m_ebook->listEbook($idUser);
    
        //get list ebook with array push
        $arrData = array();
        foreach ($getListEbook as $datas) {
            $tmp['judul_ebook'] = $datas->jdl_ebook;
            $tmp['jumlah_suka'] = $datas->jumlah_suka;
            $tmp['jumlah_comment'] = $datas->jumlah_comment;
            $tmp['cover_ebook'] = base_url('pdfimage/'.$datas->Cover_Ebook);
            array_push($arrData, $tmp);
        }

        if ($getListEbook) {
            $this->response(array('status'=>1,'message'=>'Ebook Ada Di Server','data' => $arrData));
            return;
        } else {
            $this->response(array('status'=>0,'message'=>'Tolong Cek Parameter'));
            return;
        }  
    }

    public function download_ebook_post()
    {
        $idUser = $this->post('idUser');
        $idEbook = $this->post('idEbook');     

        // cek inputan usersi
        if (empty($idUser) || !isset($idUser)) {
            $this->response(array('status'=>0,'error'=>'Tolong Inputan ID User'));
            return;
        }

        // cek inputan usersi
        if (empty($idEbook) || !isset($idEbook)) {
            $this->response(array('status'=>0,'error'=>'Tolong Inputan ID Ebook'));
            return;
        }

        //cek id user
        if (!is_numeric($idUser)) {
            $this->response(array('status'=>0,'error'=>'Tolong Cek Format ID User'));
            return;
        }

        if (!is_numeric($idEbook)) {
            $this->response(array('status'=>0,'error'=>'Tolong Cek Format ID Ebook'));
            return;
        }


        $checkUser = $this->m_user->checkUserById($idUser);

        //cek user id apakah ada di database
        if (!$checkUser) {
            $this->response(array('status'=>0,'error'=>'User Tidak Terdaftar'));
            return;
        }

        $checkEbook = $this->m_ebook->checkEbookById($idEbook);

        //cek ebook id apakah ada di database
        if (!$checkEbook) {
            $this->response(array('status'=>0,'error'=>'Ebook Tidak Ada Dalam Server'));
            return;
        }
        
        $listEbook = $this->m_ebook->getListEbook($idEbook);
        if ($listEbook) {
            $response = array();
            foreach ($listEbook as $k => $v) {
                $response[] = array(
                    'message' => 'Ebook Bisa Di Download',
                    'judul' => $v->Judul_Ebook,
                    'url' => base_url() .'pdf/'.$v->Upload_Pdf_Ebook,
                    );
            }
        } else {
            $this->response(array('status'=>0,'error'=>'Ebook Tidak Bisa Di Download'));
        }
        
        if ($listEbook) {
            $this->response(array('status'=>1,'data'=>$response));
            return;
        }

    }

}

//lallala