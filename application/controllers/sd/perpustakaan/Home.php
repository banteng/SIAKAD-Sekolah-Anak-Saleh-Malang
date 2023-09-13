<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	private $_template = "template/template_siswa";
    
	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_all');
		$this->load->model('siswa/model_perpustakaan');
		$this->load->helper(['url_helper', 'form','tglindo']);
    	$this->load->library(['form_validation', 'session']);
	}

	function cek_sesi(){
	    if($this->session->userdata('isLoginSiswa') == FALSE)
	    {
	      redirect('siswa/login');
	    }else
	    {
	    
	      $this->load->model('siswa/model_login');
	      
	      $user = $this->session->userdata('USERNAME');
	             
	      $data['pengguna'] = $this->model_login->dataPengguna($user);
		}
	}

	public function index()
	{
		$this->cek_sesi();
		$data['title'] = "Dashboard - SD ANAK SALEH";

		$data['page'] = 'siswa/view_awal';
		$this->load->view($this->_template,$data);
	}

	public function absensi()
	{
		$this->cek_sesi();
		$data['title'] = "Data Absensi - SD ANAK SALEH";

		
		$data['absensi'] = $this->model_siswa->getAbsensi($this->session->userdata('USERNAME'));
		$data['page'] = 'siswa/view_absensi';
		$this->load->view($this->_template,$data);
	}

	public function pembayaranSpp()
	{
		$this->cek_sesi();
		$data['title'] = "Data SPP Sekolah - SD ANAK SALEH";

		$data['page'] = 'siswa/view_spp_sekolah';
		$this->load->view($this->_template,$data);
	}

	public function pengumuman()
	{
		$this->cek_sesi();
		$data['title'] = "Pengumuman - SD ANAK SALEH";

		$data['pengumuman'] = $this->model_all->getPengumuman();
		$data['page'] = 'siswa/view_pengumuman';
		$this->load->view($this->_template,$data);
	}

	public function pesan()
	{
		$this->cek_sesi();
		$data['title'] = "Pesan - SD ANAK SALEH";

		$data['admin'] = $this->model_siswa->getKontakAdmin();
		$data['walikelas'] = $this->model_siswa->getKontakWaliKelas();
		$data['page'] = 'siswa/view_pesan';
		$this->load->view($this->_template,$data);
	}

}
?>