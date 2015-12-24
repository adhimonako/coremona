<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Register extends CI_Controller 
{

	public function index() 
	{
		redirect(base_url('register/register_user'));
	}
	
	public function register_user() 
	{
		$this->load->model('m_register');
		$this->form_validation->set_rules("nm_user","Nama_User","required");
		$this->form_validation->set_rules("pass_user","Pass_User","required");
		$this->form_validation->set_rules("pass_confirm","Confrim User","required|matches[pass_user]");
		$this->form_validation->set_rules("email_user","Email_User","required");
		$this->form_validation->set_rules("birth_day","Tgl_Lahir_User","required");

		if ($this->form_validation->run() == FALSE) {
			$data['error'] = validation_errors();
		} else {
			$nm_user = $this->input->post("nm_user");
			$pass_user = $this->input->post("pass_user");
			$email_user = $this->input->post("email_user");
			$birth_day = $this->input->post("birth_day");
			$pass_encrypt = md5($this->input->post("pass_user"));
			$data = array("Nama_User"=>$nm_user,"Pass_User"=>$pass_encrypt,"Email_User"=>$email_user,"Tgl_Lahir_User"=>$birth_day);
			$id_user = $this->m_register->save($data);
			?>
				<script type="text/javascript">
					alert( "Registration Success");
				</script>
			<?php
			
		}
		
		$this->load->view('v_register_user',$data);	
	}

	public function manage_profil()
	{
		$this->load->model('m_register');
		$idUser = $this->session->userdata('id_user');
		//Jika belum Login
		if (empty($idUser)) {
			echo "redirect";
		}

		$this->form_validation->set_rules("nm_user","Nama_User","required");
		$this->form_validation->set_rules("pass_user","Pass_User","required");
		$this->form_validation->set_rules("pass_confrim","Confrim User","required|matches[pass_user]");
		$this->form_validation->set_rules("email_user","Email_User","required");
		$this->form_validation->set_rules("birth_day","Tgl_Lahir_User","required");
		

		if ($this->form_validation->run() == FALSE) {
			echo $data['error'] = validation_errors();
		} else {
			$id = $this->input->post("id_user");
			$nm_user = $this->input->post("nm_user");
			$pass_user = $this->input->post("pass_user");
			$email_user = $this->input->post("email_user");
			$birth_day = $this->input->post("birth_day");
			$pass_encrypt = md5($this->input->post("pass_user"));
			$data = array("Nama_User"=>$nm_user,"Pass_User"=>$pass_encrypt,"Email_User"=>$email_user,"Tgl_Lahir_User"=>$birth_day);
			//var_dump($data);
			$id_user = $this->m_register->save($data,$idUser);
			?>
				<script type="text/javascript">
					alert( "Update Profil Sukses");
				</script>
			<?php
		}
		$data["user"] = $this->m_register->get_single_user($idUser);
		$data["content"] = $this->load->view('v_manage_profil',$data, true);		
		$this->load->view('main',$data);
	}
}