<?php if(!defined('BASEPATH')) exit('Hacking Attempt : Keluar dari sistem..!!');

class Login extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('tk/admin/model_login');
    $this->load->library('form_validation','session');
    $this->load->database();
    $this->load->helper('url', 'security');
    
  }  
  
  public function index()
  {
    $session = $this->session->userdata('isLoginAdminTk');
    
      if($session == FALSE)
      {
        redirect('tk/admin/login');
      }else
      {
        redirect('tk/admin/dashboard');
      }
  }
    
  function getUserIpAddr(){
	 if(!empty($_SERVER['HTTP_CLIENT_IP'])){
			//ip from share internet
		$ip = $_SERVER['HTTP_CLIENT_IP'];
	 }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
			//ip pass from proxy
		$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	 }else{
		$ip = $_SERVER['REMOTE_ADDR'];
	 }
      
	return $ip;
}


  public function do_login()
  {
    date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone
	$now = date('Y-m-d H:i:s');
      
    $this->form_validation->set_rules('username', 'Username', 'required|trim|xss_clean');
    $this->form_validation->set_rules('password', 'Password', 'required|xss_clean');
    $this->form_validation->set_error_delimiters('<span class="error">', '</span>');
    
      if($this->form_validation->run() == FALSE)
      {
        $this->load->view('tk/admin/view_login');
      }else
      {
       $username = $this->input->post('username', TRUE);
       $password = $this->input->post('password', TRUE);
       $cek = $this->model_login->ambilPengguna($username, $password);
       //print_r($cek);die;
       if($cek > 0){
            if($cek->LEVEL == 'ADMINTK'){
                if($cek->USERNAME == $username){
                      if($cek->PASSWORD == $password){
                              $this->session->set_userdata('isLoginAdminTK', TRUE);
                              $this->session->set_userdata('id',$cek->ID);
                              $this->session->set_userdata('username',$username);
                              $this->session->set_userdata('nama',$cek->NAMA_LENGKAP);
                              $this->session->set_userdata('level',$cek->LEVEL);

                              $log = array(
                                    'LOG_USER' => $username,
                                    'LOG_TIME' => $now,
                                    'LOG_USER_AGENT' => $_SERVER['HTTP_USER_AGENT'],
                                    'LOG_IP' => $this->getUserIpAddr(),
                                    'LOG_SUCCESS' => 1
                              );
                              $this->model_login->save_login('log_auth', $log);
                              redirect('tk/admin/dashboard');
                       }else{
                           $this->session->set_flashdata('status', "<strong>Username / password salah</strong>");
			               $this->session->set_flashdata('clr', 'danger');  
                           $log = array(
                                    'LOG_USER' => $username,
                                    'LOG_TIME' => $now,
                                    'LOG_USER_AGENT' => $_SERVER['HTTP_USER_AGENT'],
                                    'LOG_IP' => $this->getUserIpAddr(),
                                    'LOG_SUCCESS' => 2
                              );
                           $this->model_login->save_login('log_auth', $log);
                           redirect('tk/admin/login');
                      }
                }else{
                    $this->session->set_flashdata('status', "<strong>Username / password salah</strong>");
			        $this->session->set_flashdata('clr', 'danger');  
                    $log = array(
                             'LOG_USER' => $username,
                             'LOG_TIME' => $now,
                             'LOG_USER_AGENT' => $_SERVER['HTTP_USER_AGENT'],
                             'LOG_IP' => $this->getUserIpAddr(),
                             'LOG_SUCCESS' => 2
                    );
                    $this->model_login->save_login('log_auth', $log);
                    redirect('tk/admin/login');
                  }  
            }else{
                $this->session->set_flashdata('status', "<strong>User tidak terdaftar!</strong>");
			    $this->session->set_flashdata('clr', 'danger');  
                $log = array(
                             'LOG_USER' => $username,
                             'LOG_TIME' => $now,
                             'LOG_USER_AGENT' => $_SERVER['HTTP_USER_AGENT'],
                             'LOG_IP' => $this->getUserIpAddr(),
                             'LOG_SUCCESS' => 2
                    );
                $this->model_login->save_login('log_auth', $log);
                redirect('tk/admin/login');
            }
        }else{
            $this->session->set_flashdata('status', "<strong>User tidak terdaftar</strong>");
			$this->session->set_flashdata('clr', 'danger');  
            $log = array(
                             'LOG_USER' => $username,
                             'LOG_TIME' => $now,
                             'LOG_USER_AGENT' => $_SERVER['HTTP_USER_AGENT'],
                             'LOG_IP' => $this->getUserIpAddr(),
                             'LOG_SUCCESS' => 2
                    );
            $this->model_login->save_login('log_auth', $log);     
            redirect('tk/admin/login');
        }
        
	 }	  
  }
  
  
  public function logout()
  {
   $this->session->sess_destroy();
   redirect('tk/admin/login');
  }
}
?>