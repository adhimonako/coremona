<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller 
{

	//view list user in application
	public function manage_user()
	{
		$this->load->model('m_user');
		$data["user"] = $this->m_user->get();
		$data['content'] = $this->load->view('v_manage_user',$data,true);
		$this->load->view('main',$data); 
	}

}