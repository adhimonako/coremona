<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller 
{

	public function __construct()
	{	
		parent::__construct();
		$this->load->library('form_validation','session');
	}

	function index() 
	{
		$this->form_validation->set_rules("nm_user","Nama User","required");
		$this->form_validation->set_rules("pass_user","Pass User","required|callback_cek_pass");
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('v_login');
		} else {
			$nm_user = $this->input->post("nm_user");
			$pass_user = $this->input->post("pass_user");
			$cek_login = $this->m_register->get_login(array("Nama_User"=>$nm_user,"Pass_User"=>md5($pass_user)), TRUE);
			$this->session->set_userdata(array("id_user"=>$cek_login['ID_User'],"nm_user"=>$cek_login['Nama_User']));
			redirect('main','refresh');
		}
	}

	function cek_pass($pass)
	{
		$this->load->model('m_register');
		$nm_user = $this->input->post("nm_user");
		$cek_login = $this->m_register->get_login(array("Nama_User"=>$nm_user,"Pass_User"=>md5($pass)));

		if (count($cek_login) > 0) {
			return true;
		} else {
			$this->form_validation->set_message("User atau PassWord Salah");
			return false;
		}
	}

	function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url()."login","refresh");
	}
}