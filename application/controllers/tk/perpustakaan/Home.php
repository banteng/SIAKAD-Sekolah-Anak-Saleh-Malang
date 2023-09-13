<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	private $_template = "template/template_perpus";
    
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

	public function buku()
	{
		$this->cek_sesi();
		$data['title'] = "Data Buku - SD ANAK SALEH";

		
		$data['absensi'] = $this->model_perpustakaan->getBuku();
		$data['page'] = 'siswa/view_list_buku';
		$this->load->view($this->_template,$data);
	}

	public function peminjaman()
	{
		$this->cek_sesi();
		$data['title'] = "Data Peminjam Perpustakaan - SD ANAK SALEH";

		$data['page'] = 'siswa/view_peminjaman_perpus';
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


}
?>