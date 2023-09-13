<?php if(!defined('BASEPATH')) exit('Hacking Attempt : Keluar dari sistem..!!');

class Login extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('paud/perpustakaan/model_login');
    $this->load->library('form_validation','session');
    $this->load->database();
    $this->load->helper('url', 'security');
    
  }  
  
  public function index()
  {
    $session = $this->session->userdata('isLoginGuru');
    
      if($session == FALSE)
      {
        redirect('paud/perpustakaan/login');
      }else
      {
        redirect('paud/perpustakaan/dashboard');
      }
  }

  public function do_login()
  {
    $this->form_validation->set_rules('username', 'Username', 'required|trim|xss_clean');
    $this->form_validation->set_rules('password', 'Password', 'required|xss_clean');
    $this->form_validation->set_error_delimiters('<span class="error">', '</span>');
    
      if($this->form_validation->run() == FALSE)
      {
        $this->load->view('paud/perpustakaan/view_login');
      }else
      {
       $username = $this->input->post('username', TRUE);
       $password = $this->input->post('password', TRUE);
       $cek = $this->model_login->ambilPengguna($username, $password);
     
       //print_r($cek);die;
        if($cek > 0){
          if($cek->LEVEL == 'Karyawan'){
            if($cek->NIP == $username){
              $ceks = $this->model_login->dataPengguna($username);

              $this->session->set_userdata('isLoginPerpusPaud', TRUE);
              $this->session->set_userdata('username',$username);
              $this->session->set_userdata('nama',$ceks->NAMA_LENGKAP);
              $this->session->set_userdata('level',$ceks->LEVEL);
              redirect('paud/perpustakaan/dashboard');
            }else{
            echo " <script>
                    alert('Gagal Login: Cek username , password anda!');
                    history.go(-1);
                  </script>";        
            }else{
              echo " <script>
              alert('Gagal Login: Cek username , password anda!');
                  history.go(-1);
                </script>";  
            }
            }else{
            echo " <script>
                        alert('Gagal Login: Cek username , password anda!');
                        history.go(-1);
                      </script>";        
            }
        
	    }	  
  }
  
  public function logout()
  {
   $this->session->sess_destroy();
   redirect('paud/perpustakaan/login');
  }
}
?>