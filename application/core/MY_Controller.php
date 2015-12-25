<?php
class MY_Controller extends CI_Controller {
    public function __construct() {
        parent::__construct();
        
        $this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
        $this->output->set_header('Pragma: no-cache');
        
        $this->checkauth();        
 }

    private function checkauth() { 
        if (!$this->session->userdata('is_login')) {
            redirect('/login', 'refresh');
        }
    }
   
}