<?php if(!defined('BASEPATH')) exit('Hacking Attempt : Keluar dari sistem..!!');

class Login extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('kesiswaan/model_login');
    $this->load->library('form_validation','session');
    $this->load->database();
    $this->load->helper('url', 'security');
    
  }  
  
  public function index()
  {
    $session = $this->session->userdata('isLoginKesiswaan');
    
      if($session == FALSE)
      {
        redirect('kesiswaan/login.html');
      }else
      {
        redirect('kesiswaan/dashboard.html');
      }
  }

  public function do_login()
  {
    $this->form_validation->set_rules('username', 'Username', 'required|trim|xss_clean');
    $this->form_validation->set_rules('password', 'Password', 'required|xss_clean');
    $this->form_validation->set_error_delimiters('<span class="error">', '</span>');
    
      if($this->form_validation->run() == FALSE)
      {
        $this->load->view('kesiswaan/view_login');
      }else
      {
       $username = $this->input->post('username', TRUE);
       $password = $this->input->post('password', TRUE);
       $cek = $this->model_login->ambilPengguna($username, $password);
       //print_r($cek);die;
        if($cek > 0){
            if($cek->USERNAME == $username){
              if($cek->PASSWORD == $password){
                if($cek->LEVEL == 'kesiswaan'){
              
              $this->session->set_userdata('isLoginKesiswaan', TRUE);
              $this->session->set_userdata('username',$username);
              $this->session->set_userdata('nama',$cek->NAMA_LENGKAP);
              redirect('kesiswaan/dashboard.html');
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
   redirect('kesiswaan/login.html');
  }
}
?>