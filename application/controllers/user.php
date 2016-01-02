<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends MY_Controller 
{
        public function Index()
	{
		$this->load->model('m_user');
		$data["data_view"] = $this->m_user->get();
		$data["content"] = $this->load->view('v_user_all',$data, true);
		$this->load->view('main', $data);
	}
        
	public function input_user() 
	{
            	$this->load->model('m_user');

		$this->form_validation->set_rules("nm_user","Nama User","required");
		$this->form_validation->set_rules("pass_user","Password","required");
		$this->form_validation->set_rules("pass_confrim","Confrim Password","required|matches[pass_user]");
		$this->form_validation->set_rules("email_user","Email_User","required");		

                if ($this->form_validation->run() == FALSE) {
			//echo $data['error'] = validation_errors();
		} else {
			$id = $this->input->post("id_user");
			$nama_user = $this->input->post("nama_user");
			$nm_user = $this->input->post("nm_user");
			$email_user = $this->input->post("email_user");
			$role = $this->input->post("role_id");
			$pass_user = $this->input->post("pass_user");
			$data = array("user_nama"=>$nama_user,"user_username"=>$nm_user,"user_email"=>$email_user,"user_pass"=>  md5($pass_user),"role_id"=>$role);
			//var_dump($data);
			$id_user = $this->m_user->save($data,$id);
                        
			?>
                            <script type="text/javascript">
                                    alert( "User berhasil ditambahkan.");
                                    window.location = "<?php echo base_url().$this->uri->segment(1);?>";
                            </script>
			<?php
		}
		$data["content"] = $this->load->view('v_user_input','', true);		
		$this->load->view('main',$data);     
	}

	public function manage_profil()
	{
		$this->load->model('m_user');
		$idUser = $this->session->userdata('id_user');
		//Jika belum Login
		if (empty($idUser)) {
			echo "redirect";
		}

		$this->form_validation->set_rules("nm_user","Nama_User","required");
		$this->form_validation->set_rules("pass_user","Pass_User","required");
		$this->form_validation->set_rules("pass_confrim","Confrim User","required|matches[pass_user]");
		$this->form_validation->set_rules("email_user","Email_User","required");		

		if ($this->form_validation->run() == FALSE) {
			//echo $data['error'] = validation_errors();
		} else {
			$id = $this->input->post("id_user");
			$nm_user = $this->input->post("nm_user");
			$pass_user = $this->input->post("pass_user");
			$email_user = $this->input->post("email_user");
			$pass_encrypt = md5($this->input->post("pass_user"));
			$data = array("Nama_User"=>$nm_user,"Pass_User"=>$pass_encrypt,"Email_User"=>$email_user,"Tgl_Lahir_User"=>$birth_day);
			//var_dump($data);
			$id_user = $this->m_user->save($data,$idUser);
			?>
				<script type="text/javascript">
					alert( "Update Profil Sukses");
				</script>
			<?php
		}
		$data["user"] = $this->m_user->get_single_user($idUser);
		$data["content"] = $this->load->view('v_manage_profil',$data, true);		
		$this->load->view('main',$data);
	}
        
        public function edit($id){
		$this->load->model('m_user');

                $is_submited = $this->input->post('submit'); 
                if ($is_submited){
                    $this->form_validation->set_rules("nm_user","Username","required");
                    $this->form_validation->set_rules("nama_user","Nama_User","required");
                    $this->form_validation->set_rules("email_user","Email","required");
                    if ($this->form_validation->run() == FALSE) {
                            //echo $data['error'] = validation_errors();
                    } else {
                            //$id = $this->input->post("user_id");
                            $nm_user = $this->input->post("nm_user");
                            $email_user = $this->input->post("email_user");
                            $nama = $this->input->post("nama_user");
                            $data = array("user_username"=>$nm_user,"user_email"=>$email_user,"user_nama"=>$nama);
                            //var_dump($data);
                            $id_user = $this->m_user->save($data,$id);
                            ?>
                                    <script type="text/javascript">
                                            alert( "Update Profil Sukses");
                                    </script>
                            <?php
                            redirect(base_url() . $this->uri->segment(1));
                    }
                }
		$data["user"] = $this->m_user->get_single_user($id);
		$data["content"] = $this->load->view('v_user_edit',$data, true);		
		$this->load->view('main',$data);     
        }

        public function hapus($id)
	{
		$this->load->model('m_user');
		$this->m_user->delete($id);
		redirect('user');
	}
        
}