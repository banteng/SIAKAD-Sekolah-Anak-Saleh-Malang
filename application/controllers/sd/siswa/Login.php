<?php if(!defined('BASEPATH')) exit('Hacking Attempt : Keluar dari sistem..!!');

class Login extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('sd/siswa/model_login');
    $this->load->library('form_validation','session');
    $this->load->database();
    $this->load->helper('url', 'security');
     error_reporting(0); 
  }  
  
  public function index()
  {
    $session = $this->session->userdata('isLoginSiswaSD');
    
      if($session == FALSE)
      {
        redirect('sd/siswa/login');
      }else
      {
        redirect('sd/siswa/dashboard');
      }
  }

  public function do_login()
  {
    $this->form_validation->set_rules('username', 'Username', 'required|trim|xss_clean');
    $this->form_validation->set_rules('password', 'Password', 'required|xss_clean');
    $this->form_validation->set_error_delimiters('<span class="error">', '</span>');
    
      if($this->form_validation->run() == FALSE)
      {
        $this->load->view('sd/siswa/view_login');
      }else
      {
       $username = $this->input->post('username', TRUE);
       $password = $this->input->post('password', TRUE);
       $cek = $this->model_login->ambilPengguna($username, $password);
       //print_r($cek->NAMA_LENGKAP);die;
        if($cek > 0){
            if($cek->NIS == $username){
              if($cek->PASSWORD == $password){
              
              $this->session->set_userdata('isLoginSiswaSD', TRUE);
              $this->session->set_userdata('username',$username);
              $this->session->set_userdata('nama',$cek->NAMA_SISWA);
              redirect('sd/siswa/dashboard');
             }else{
            echo " <script>
                    alert('Gagal Login: Username atau password salah');
                    history.go(-1);
                  </script>";        
            }
            
            }else{
              echo " <script>
                      alert('Gagal Login: Username atau password salah');
                      history.go(-1);
                    </script>";        
              }
        }else{
        echo " <script>
                    alert('Gagal Login: Akun tidak terdaftar');
                    history.go(-1);
                  </script>";        
        }
        
	    }	  
  }
  
  public function logout()
  {
   $this->session->sess_destroy();
   redirect('sd/siswa/login');
  }
}
?>