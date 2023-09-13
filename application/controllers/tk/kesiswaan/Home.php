<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	private $_template = "template/template_kesiswaan";
    
	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_all');
		$this->load->helper(['url_helper', 'form', 'tglindo']);
		$this->load->library(['form_validation', 'session', 'upload']);
	}

	function cek_sesi(){
	    if($this->session->userdata('isLoginKesiswaan') == FALSE)
	    {
	      redirect('kesiswaan/login');
	    }else
	    {
	    
	      $this->load->model('kesiswaan/model_login');
	      
	      $user = $this->session->userdata('USERNAME');
	      
	      $data['level'] = $this->session->userdata('LEVEL');        
	      $data['pengguna'] = $this->model_login->dataPengguna($user);
		}
	}
	
	public function tahunAktif()
	{
		$this->cek_sesi();
		$data['tahun'] = $this->model_all->getTahunAktif();
	}

	public function index()
	{
		$this->cek_sesi();
		$data['title'] = "Dashboard - SD ANAK SALEH";

		$data['page'] = 'kesiswaan/view_awal';
		$this->load->view($this->_template,$data);
    }

    
}