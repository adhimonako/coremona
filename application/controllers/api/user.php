<?php defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH.'/libraries/REST_Controller.php');

class User extends REST_Controller 
{
	public function __construct()
    {
        parent::__construct();
        $this->load->model("m_register","",TRUE);
    }

    public function cek_login_post()
    {
    	$nm_user = $this->post('nm_user');
        $pass_user = md5($this->post('pass_user'));
        
        if (empty($nm_user)) {
            $this->response(array('status' => 0,'error' => 'Tolong Isi Nama User'));
        }

        if (empty($pass_user)) {
            $this->response(array('status' => 0,'error' => 'Tolong Isi Password User'));
        }

        if ($this->m_register->cek_login($nm_user,$pass_user)) {
            $this->response(array('Nama User' => $nm_user,'status' => 1,'message' => 'Login Succesfull'));
        } else  {
            $this->response(array('status'=> 0,'error'=> "Data Tidak Sesuai Dengan Database"));
        }
    }

    public function cek_register_post()
    {
        $nm_user = $this->post('nm_user');
        $email_user = $this->post('email_user');
        $birth_day = date($this->post('birth_day'));
        $pass_user = md5($this->post('pass_user'));
        $pass_confrim = md5($this->post('pass_confrim'));

        if (empty($nm_user)) {
            $this->response(array('status' => 0,'error' => 'Tolong Isi Nama User'));
        }

        if ($nm_user > 0) {
            $this->response(array('status' => 0,'error' => 'User Name Sudah Ada'));
        }

        if (empty($email_user)) {
            $this->response(array('status' => 0,'error' => 'Tolong Cek Email User'));
        }

        if (empty($birth_day)) {
            $this->response(array('status' => 0,'error' => 'Tolong Isi Tanggal Lahir User'));
        }

        if (empty($pass_user) && empty($pass_confrim)) {
             $this->response(array('status' => 0,'error' => 'Tolong Cek Password Anda Lagi'));
        }

        if ($pass_user != $pass_confrim) {
             $this->response(array('status' => 0,'error' => 'Password Anda Tidak Sama '));
        }

        $cek_format_email = filter_var($email_user, FILTER_SANITIZE_EMAIL);

        // Validate e-mail
        if (!filter_var($cek_format_email, FILTER_VALIDATE_EMAIL) === false) {
            echo("Mohon Cek Format Penamaan Email");
        } 

        $data = array("Nama_User"=>$nm_user,"Pass_User"=>$pass_user,"Email_User"=>$email_user,"Tgl_Lahir_User"=>$birth_day);

        if ($this->m_register->save($data)) {
            $this->response(array('Nama_User'=>$nm_user,'Email_User'=>$email_user,'Tgl_Lahir_User'=>$birth_day,'status'=> 1,'message' => 'Register Sucessful'));
        } else {
            $this->response(array('status'=> 0,'error'=> "Please Cek Inputan"));
        }
    }

}

///asds