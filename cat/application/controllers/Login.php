<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
		$this->load->model('m_user');
		$this->load->model('log_model');
		
    }

    //index
    public function index(){
        if($this->session->userdata('isLoginSiswaSD')){
            redirect('');
        }
        $this->load->view('_template_login/login');
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
	
	function actlogin(){
		date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone
		$now = date('Y-m-d H:i:s');
		$nis = $this->input->post('nis');
		$nis = preg_replace("/[^0-9]/", "", $nis);
		$password = $this->input->post('password');
		$data = array('NIS' => $nis, 'PASSWORD' => $password);
        

           // print_r($data);die;
		$siswa = $this->m_user->login($data);
		if($siswa->num_rows() > 0) {
			$s = $siswa->row_array();
			$data = array(
				'nama' => $s['NAMA_LENGKAP'],
				'nis' => $s['NIS'],
				'kelas' => $s['ID_KELAS'],
				'isLoginSiswaSD' => true
			);
			
			redirect('dashboard');
		}else{
			$this->session->set_flashdata('flash', 'NIS atau Password salah !');
			redirect('login');
		}

	}

	function logout(){
		$data = array(
			'id' => '',
			'nama' => '',
			'nis' => '',
			'kelas' => '',
			'login' => false
		);
		$this->session->set_userdata($data);

		// $this->session->sess_destroy();
		redirect('login');
	}


	//Lupa Password
	//cek NIS
	function ceknis(){
		//preg_replace("/[^0-9]/", "", $var)
		$n = $this->input->post('nis');
		$nis = preg_replace("/[^0-9]/", "", $n);
		$whr = array(
			'nis' => $nis
		);
		$cek = $this->m_user->ceknis($whr)->row_array();
		if (empty($cek['nis'])){
			# code...
			echo 0;
		}
		elseif (empty($cek['pertanyaan'])){
			# code...
			//echo "Anda belum mengatur pertanyaan, silahkan hubungi administrator";
			$err = array('error' => 'Anda belum mengatur pertanyaan untuk mereset password, silahkan hubungi Administrator');
			echo json_encode($err);
		}
		else{
			echo json_encode($cek);
		}
	}
	//cek jawaban
	function cekjawab(){
		$jawaban = $this->input->post('jawaban');
		$nis = $this->input->post('nis');
		$whr = array('nis' => $nis);
		$cek = $this->m_user->cekjawab($whr)->row_array();
		if ($jawaban != $cek['jawaban']) {
			# code...
			echo 0;
		}
		else{
			echo json_encode($cek);
		}
	}
	//Reset password
	function resetpasswd(){
		$nis = $this->input->post('nis');
		$password = $this->input->post('password');
		$where =  array('nis' => $nis);
		$data = array('password' => $password);
		if($this->m_user->resetpasswd('siswa', $where, $data)){
			echo 1;
		}
		$this->session->set_flashdata('flash', 'Password berhasil diubah, silahkan login !');
		redirect('login');
	}
}