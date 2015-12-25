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
        
	//view list user in application
	public function manage_user()
	{
		$this->load->model('m_user');
		$data["user"] = $this->m_user->get();
		$data['content'] = $this->load->view('v_manage_user',$data,true);
		$this->load->view('main',$data); 
	}
        
	public function input_user() 
	{
		$this->load->model('m_ebook');
		$this->form_validation->set_rules("jdl_ebook", "Judul Ebook", "required");
		$this->form_validation->set_rules("desk_ebook", "Deskripsi Ebook ", "required");
		$this->form_validation->set_rules("jml_hal_ebook", "Jumlah Halaman Ebook", "required|numeric");
		$this->form_validation->set_rules("thn_terbit_ebook", "Tahun Terbit Ebook", "required|numeric");
		$this->form_validation->set_rules("kategori_ebook", "Kategori Ebook", "required");
		$this->form_validation->set_rules("penulis_ebook", "Penulis Ebook", "required");
		$this->form_validation->set_rules("harga_ebook", "Harga Ebook", "required|numeric");
		if (empty($_FILES['upload_ebook']['name']))
		{
    		$this->form_validation->set_rules('upload_ebook', 'Pdf', 'required');
		}
		
		if (empty($_FILES['upload_image_ebook']['name']))
		{
    		$this->form_validation->set_rules('upload_image_ebook', 'Image pdf', 'required');
		}	

		//pengecekan kondisi
		if ($this->form_validation->run() == FALSE) {
			$this->load->model('m_ebook');
			$data['ebook'] = $this->m_ebook->get();
			$data['content'] = $this->load->view('v_upload_ebook',$data,true);
			$this->load->view('main',$data);
		} else {
			if ($this->input->post('id') == '') {
				// konfig upload pdf
				$config = array();
				$nama_asli= $_FILES['upload_ebook']['name'];
				$config['upload_path'] = 'pdf/';
				$config['allowed_types'] = 'pdf';
				$config['file_name'] = $nama_asli;
				$config['max_size'] = '2048';
				$config['overwrite'] = true;
				$this->load->library('upload', $config,'pdfupload');
				$this->pdfupload->initialize($config);
				$pdf_upload = $this->pdfupload->do_upload('upload_ebook');


				//konfig upload image
				$config = array();
				$nama_asli= $_FILES['upload_image_ebook']['name'];
				$config['upload_path'] = 'pdfimage/';
				$config['allowed_types'] = 'jpg|png|bmp';
				$config['file_name'] = $nama_asli;
				$config['max_size'] = '512';
				$config['max_width'] = '320';
				$config['max_height'] = '240';
				$config['overwrite'] = true;
				$this->load->library('upload', $config,'coverpdf');
				$this->coverpdf->initialize($config);	
				$pdf_cover = $this->coverpdf->do_upload('upload_image_ebook');
				
				if ( !$pdf_upload && !$pdf_cover)  {
					echo  $this->pdfupload->display_errors();
					echo  $this->coverpdf->display_errors();
				} else {
					$id_user = $this->session->userdata("id_user");
					$upload = array($pdf_upload,$pdf_cover);
					$jdl_ebook = $this->input->post("jdl_ebook"); //inputan judul ebook
					$desk_ebook = $this->input->post("desk_ebook"); //inputan deskripsi ebook
					$jml_hal_ebook = $this->input->post("jml_hal_ebook"); //inputan jumlah halaman ebook
					$penulis_ebook = $this->input->post("penulis_ebook"); //inputan penulis ebook
					$kategori_ebook = $this->input->post("kategori_ebook"); //inputan kategori ebook
					$thn_terbit_ebook = $this->input->post("thn_terbit_ebook"); //inputan tahun terbit ebook
					$harga_ebook = $this->input->post("harga_ebook");
					$get_nm_ebook = $this->pdfupload->data(); // get ebook untuk menyimpan data
					$nm_ebook = $get_nm_ebook['file_name']; //get name ebook untuk simpan di database
					$get_cover_ebook = $this->coverpdf->data(); // get ebook untuk menyimpan data
					$nm_cover_ebook = $get_cover_ebook['file_name']; //get name ebook untuk simpan di database
					$tgl_upload = date("Y-m-d H:i:s"); // input tanggal & jam upload
					$data = array("Judul_Ebook"=>$jdl_ebook, "Deskripsi_Ebook"=>$desk_ebook, "Jml_Hal_Ebook"=>$jml_hal_ebook,
						"Tgl_Upload"=>$tgl_upload,"Penulis_Ebook"=>$penulis_ebook,"Thn_Terbit"=>$thn_terbit_ebook,"Kategori_Ebook"=>$kategori_ebook,
						"Price"=>$harga_ebook,"Upload_Pdf_Ebook"=>$nm_ebook,"Upload_Image_Ebook"=>$nm_cover_ebook,"ID_User"=>$id_user);
					//var_dump($data);
					$id_ebook = $this->m_ebook->save($data);
					?>
						<script type="text/javascript">
							alert( "Data Ebook Berhasil Di Tambahkan");
							document.location.href = "<?php echo base_url();?>ebook/input_ebook";
						</script>
					<?php
				}		
			}
		}
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
		$this->form_validation->set_rules("birth_day","Tgl_Lahir_User","required");
		

		if ($this->form_validation->run() == FALSE) {
			//echo $data['error'] = validation_errors();
		} else {
			$id = $this->input->post("id_user");
			$nm_user = $this->input->post("nm_user");
			$pass_user = $this->input->post("pass_user");
			$email_user = $this->input->post("email_user");
			$birth_day = $this->input->post("birth_day");
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
}