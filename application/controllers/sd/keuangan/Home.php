<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	private $_template = "sd/template/template_keuangan";
    
	public function __construct()
	{
		parent::__construct();
		$this->load->model('sd/model_all');
		$this->load->helper(array('url_helper', 'form', 'tglindo'));
		$this->load->library(array('form_validation', 'session', 'upload'));
	}

	function cek_sesi(){
	    if($this->session->userdata('isLoginKeuanganSD') == FALSE)
	    {
	      redirect('sd/keuangan/login');
	    }else
	    {
	    
	      $this->load->model('sd/keuangan/model_login');
	      
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

		$data['page'] = 'sd/keuangan/view_awal';
		$this->load->view($this->_template,$data);
    }

    //START PEMBAYARAN
	public function pembayaranLain()
	{
		$this->cek_sesi();
		$data['lain'] = $this->model_all->getAllPembayaranLain();

		$data['title'] = "Tagihan Siswa - SD ANAK SALEH";

		$data['page'] = 'sd/keuangan/view_pembayaran_lain';
		$this->load->view($this->_template,$data);
	}

	public function tagihanSPP()
	{
		$this->cek_sesi();
		$data['spp'] = $this->model_all->getTagihanSppSD();

		$data['title'] = "Tagihan SPP - SD ANAK SALEH";

		$data['page'] = 'sd/keuangan/view_tagihan_spp';
		$this->load->view($this->_template,$data);
	}

	function detailSPP($id)
	{
		$this->cek_sesi();
		$data['spp'] = $this->model_all->getTagihanSPPByID($id);
		$data['mon'] = $this->model_all->getBulanSPP();
		
		$data['title'] = "Detail Tagihan SPP - SD ANAK SALEH";

		$data['page'] = 'sd/keuangan/view_detail_tagihan_spp';
		$this->load->view($this->_template,$data);
	}

	function bayarSPP($id, $bulan)
	{
		$this->cek_sesi();

		$nominal = $this->input->post('nominal');
		$data['tahun'] = $this->model_all->getTahunAktif();
		$tahun = 	$data['tahun']->TAHUN.$data['tahun']->SEMESTER;
		
		$data = array(
			'NIS' => $id,
			'BULAN' => $bulan,
			'NOMINAL' => $nominal,
			'TAHUNAKTIF' => $tahun,
			'STATUS' => 1
		);
		//print_r($data);die;
		$this->model_all->setBayarSPP('tb_pembayaran_spp', $data);

		$data['page'] = 'sd/keuangan/view_detail_tagihan_spp';
		$this->load->view($this->_template,$data);
		redirect("sd/keuangan/home/detailSPP/$id");
	}
	//END PEMBAYARAN
    
    //START LAPORAN
    
    function pilihLaporan()
	{
		$this->cek_sesi();
		
		$data['title'] = "Laporan Keuangan - SD ANAK SALEH";

		$data['page'] = 'sd/keuangan/view_pilih_laporan';
		$this->load->view($this->_template,$data);
	}
    
    function laporan()
	{
		$this->cek_sesi();
        $tahun         = $this->input->post("tahun");
        $semester      = $this->input->post("semester");
        $tahunsemester = $tahun.$semester;

        $data['tahuns'] = $tahunsemester;
		$data['laporan'] = $this->model_all->getPembayaranKB($tahunsemester);
		$data['bulan'] = $this->model_all->getBulanSPP();
        
        $data['title'] = "Laporan Keuangan - PAUD ANAK SALEH";
		$data['page'] = 'sd/keuangan/view_laporan';
		$this->load->view($this->_template,$data);
	}
    
    public function tambahTagihan()
	{
		$this->cek_sesi();
		$data['siswa'] = $this->model_all->getAllSiswa();
		//print_r($this->db->last_query());die;
        //print_r($data['spp']);die;
		$data['title'] = "Buat Tagihan SPP - SD Sekolah Anak Saleh Malang";

		$data['page'] = 'sd/keuangan/view_tambah_tagihan';
		$this->load->view($this->_template,$data);
	}

    
     public function setTagihan()
	{
		$this->cek_sesi();
		$data['title'] = "Tagihan Siswa - SD Sekolah Anak Saleh Malang";

		$siswa = $this->input->post('siswa');
		$nominal = $this->input->post('nominal');
		$tagihan = $this->input->post('tagihan');
		$bulan = $this->input->post('bulan');

		$data = array(
			'NIS' => $nama,
			'NOMINAL_BIAYA' => $nominal,
			'KODE_TAGIHAN' => $tagihan,
			'TAHUN_TAGIHAN' => date("Y"),
			'BULAN_TAGIHAN' => $bulan,
			'KATEGORI' => "R"
		);
        //print_r($data);die;
		$this->model_all->setPembayaranLain('tb_enroll_spp', $data);
		redirect('sd/keuangan/data-tagihan');
	}
    
    public function LaporanPembayaran($tahun)
	{
		$this->cek_sesi();
        
		$data['spp'] = $this->model_all->LaporanPembayaran($tahun);
		
		$this->load->view("sd/keuangan/laporan_pembayaran");
	}
}