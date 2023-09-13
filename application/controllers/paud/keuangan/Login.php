<?php if(!defined('BASEPATH')) exit('Hacking Attempt : Keluar dari sistem..!!');

class Login extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('paud/keuangan/model_login');
    $this->load->library('form_validation','session');
    $this->load->database();
    $this->load->helper('url', 'security');
    
  }  
  
  public function index()
  {
    $session = $this->session->userdata('isLoginkeuanganPaud');
    
      if($session == FALSE)
      {
        redirect('paud/keuangan/login');
      }else
      {
        redirect('paud/keuangan/dashboard');
      }
  }

  public function do_login()
  {
    $this->form_validation->set_rules('username', 'Username', 'required|trim|xss_clean');
    $this->form_validation->set_rules('password', 'Password', 'required|xss_clean');
    $this->form_validation->set_error_delimiters('<span class="error">', '</span>');
    
      if($this->form_validation->run() == FALSE)
      {
        $this->load->view('paud/keuangan/view_login');
      }else
      {
       $username = $this->input->post('username', TRUE);
       $password = $this->input->post('password', TRUE);
       $cek = $this->model_login->ambilPengguna($username, $password);
       //print_r($cek);die;
        if($cek > 0){
          if($cek->LEVEL == 'KEUPAUD'){
            if($cek->USERNAME == $username){
              if($cek->PASSWORD == $password){
              
              $this->session->set_userdata('isLoginKeuanganPaud', TRUE);
              $this->session->set_userdata('username',$username);
              $this->session->set_userdata('nama',$cek->NAMA_LENGKAP);
              redirect('paud/keuangan/dashboard');
             }else{
            echo " <script>
                    alert('Gagal Login: Password salah');
                    history.go(-1);
                  </script>";        
            }
          }else{
            echo " <script>
              alert('Gagal Login: Username tidak terdaftar');
              history.go(-1);
            </script>";        
            }
          }else{
            echo " <script>
                    alert('Gagal Login: Akun tidak terdaftar');
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
   redirect('paud/keuangan/login');
  }
}
?>