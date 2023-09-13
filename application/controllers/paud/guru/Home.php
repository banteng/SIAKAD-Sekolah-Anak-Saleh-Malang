<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	private $_template = "paud/template/template_guru";
    
	public function __construct()
	{
		parent::__construct();
		$this->load->model('paud/model_all');
		$this->load->model('paud/guru/model_guru');
		$this->load->helper(array('url_helper', 'form', 'tglindo'));
		$this->load->library(array('form_validation', 'session', 'upload'));
	}

	function cek_sesi(){
	    if($this->session->userdata('isLoginGuruPaud') == FALSE)
	    {
	      redirect('paud/guru/login');
	    }else
	    {
	    
	      $this->load->model('paud/guru/model_login');
	      
	      $user = $this->session->userdata('username');
	      
	      $data['level'] = $this->session->userdata('level');        
	      $data['pengguna'] = $this->model_login->dataPengguna($user);
		}
	}

	public function uploadPengumuman(){
		$config['upload_path'] = './upload/pengumuman';
		$config['allowed_types'] = 'xls|pdf|xlsx|doc|docs';
		$config['max_size']  = '2048';
		$config['remove_space'] = TRUE;
	  
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
		if($this->upload->do_upload('file')){ 
		  $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
		  return $return;
		}else{
		  $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
		  return $return;
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
        $data['kelas'] = $this->model_guru->countAllKelas($this->session->userdata('username'));
        $data['siswa'] = $this->model_guru->countAllSiswaKelas($this->session->userdata('username'));
		$data['title'] = "Dashboard - PAUD Sekolah Anak Saleh Malang";

		$data['page'] = 'paud/guru/view_awal';
		$this->load->view($this->_template,$data);
	}
	
	public function penilaian()
	{
		$this->cek_sesi();
		$data['tahun'] = $this->model_all->getTahunAktif();
		$tahun 		   = $data['tahun']->TAHUN.$data['tahun']->SEMESTER;
		$data['siswa'] = $this->model_guru->getEnrollKelas($this->session->userdata('username'));
		//$data['kelas'] = $this->model_guru->getMatpel($tahun, $this->session->userdata('nip'));
		//$data['kelas'] = $this->db->query('select * from tb_mata_pelajaran where PENGAJAR='.$this->session->userdata('nip').' AND TAHUN_AKTIF='.$tahun);
		//print_r($this->db->last_query());die;
		//print_r($data['siswa']);die;
		$data['title'] = "Penilaian - PAUD Sekolah Anak Saleh Malang";

		$data['page'] = 'paud/guru/view_penilaian';
		$this->load->view($this->_template,$data);
	}
	
	public function siswa()
	{
		$this->cek_sesi();
		$data['tahun'] = $this->model_all->getTahunAktif();
		$tahun = 	$data['tahun']->TAHUN.$data['tahun']->SEMESTER;

		$data['siswa'] = $this->model_guru->getSiswa($this->session->userdata('username'));
		$data['title'] = "Penilaian - PAUD Sekolah Anak Saleh Malang";
		
		$data['page'] = 'paud/guru/view_siswa';
		$this->load->view($this->_template,$data);
	}
	
	public function raportsiswa($id)
	{
		$this->cek_sesi();
		$data['siswa'] = $this->model_guru->getSiswaID($id);

		$data['title'] = "Raport Siswa - PAUD Sekolah Anak Saleh Malang";

		$data['page'] = 'paud/guru/view_tambah_pengumuman_siswa';
		$this->load->view($this->_template,$data);
	}
    
    public function penilaiansiswa($id)
	{
		$this->cek_sesi();
		$data['siswa'] = $this->model_guru->getSiswaID($id);

		$data['title'] = "Penilaian Siswa - PAUD Sekolah Anak Saleh Malang";

		$data['page'] = 'paud/guru/view_tambah_pengumuman_penilaian_siswa';
		$this->load->view($this->_template,$data);
	}

	public function prosesRaport()
	{
		$this->cek_sesi();
		
		$data['title'] = "Pengumuman - PAUD Sekolah Anak Saleh Malang";

		$logo 	= $this->uploadPengumuman();
		$judul 	= $this->input->post('judul');
		$isi 	= $this->input->post('isi');
		$kelas 	= $this->input->post('kelas');
		$siswa 	= $this->input->post('siswa');

			$data = array(
				'JUDUL' => $judul,
				'PENGUMUMAN' => $isi,
				'SISWA' => $siswa,
				'TANGGAL_TERBIT' => date("Y-m-d H:i:s"),
				'LAMPIRAN1' => $logo['file']['file_name'],
				'ID_PENGIRIM' => $this->session->userdata('username')
			);
		$this->model_all->setPengumuman('pengumuman', $data);
		redirect('paud/guru/siswa');
	}
    
    public function prosesPengumuman()
	{
		$this->cek_sesi();
		
		$data['title'] = "Pengumuman - PAUD Sekolah Anak Saleh Malang";

		$logo 	= $this->uploadPengumuman();
		$judul 	= $this->input->post('judul');
		$isi 	= $this->input->post('isi');
		$kelas 	= $this->input->post('kelas');
		$siswa 	= $this->input->post('siswa');

			$data = array(
				'JUDUL' => $judul,
				'PENGUMUMAN' => $isi,
				'SISWA' => $siswa,
				'TANGGAL_TERBIT' => date("Y-m-d H:i:s"),
				'LAMPIRAN1' => $logo['file']['file_name'],
				'ID_PENGIRIM' => $this->session->userdata('username')
			);
		$this->model_all->setPengumuman('pengumuman', $data);
		redirect('paud/guru/home/pengumuman');
	}
    
    public function prosesPenilaian()
	{
		$this->cek_sesi();
		
		$data['title'] = "Pengumuman - PAUD Sekolah Anak Saleh Malang";

		$logo 	= $this->uploadPengumuman();
		$judul 	= $this->input->post('judul');
		$isi 	= $this->input->post('isi');
		$kelas 	= $this->input->post('kelas');
		$siswa 	= $this->input->post('siswa');

			$data = array(
				'JUDUL' => $judul,
				'PENGUMUMAN' => $isi,
				'SISWA' => $siswa,
				'TANGGAL_TERBIT' => date("Y-m-d H:i:s"),
				'LAMPIRAN2' => $logo['file']['file_name'],
				'ID_PENGIRIM' => $this->session->userdata('username')
			);
		$this->model_all->setPengumuman('pengumuman', $data);
		redirect('paud/guru/home/penilaian');
	}

	public function pengumuman()
	{
		$this->cek_sesi();
		//$data['pengumuman'] = $this->model_guru->getPengumumanByUser($this->session->userdata('nip'));
		$data['pengumuman'] = $this->model_guru->getAllPengumuman();
		$data['title'] = "Pengumuman - PAUD Sekolah Anak Saleh Malang";

		$data['page'] = 'paud/guru/view_pengumuman';
		$this->load->view($this->_template,$data);
	}
 
	public function setPengumuman()
	{
		
		$this->cek_sesi();
		$data['siswa'] = $this->model_guru->getSiswa($this->session->userdata('username'));
        //print_r($data['siswa']);die;
		$data['kelas'] = $this->model_all->getAllKelas();
	
		$data['title'] = "Tambah Pengumuman - PAUD Sekolah Anak Saleh Malang";

		$data['page'] = 'paud/guru/view_tambah_pengumuman';
		$this->load->view($this->_template,$data);
	}

	function hapusPengumuman($id){
		$this->cek_sesi();
		$where = array('ID' => $id);
		$this->model_all->deleteSiswa($where,'pengumuman');
		redirect('paud/guru/pengumuman');
	}

	function Pesan(){
		//$data['teman'] = $this->model_all->getAllUser();
		$this->user = $this->db->get_where('a_user', array('ID' => $this->session->userdata('ID')), 1)->row();
		$data['teman'] = $this->db->where('ID !=', $this->user)->get('a_user');
		$data['title'] = "Pesan - PAUD Sekolah Anak Saleh Malang";

		$data['page'] = 'paud/admin/view_chat2';
		$this->load->view($this->_template,$data);
	}

	public function getChat()
    {
        header('Content-Type: application/json');
        if ($this->input->is_ajax_request()) {
            // Find friend
            $friend = $this->db->get_where('a_user', array('ID' => $this->input->post('chatWith')), 1)->row();
			$this->user = $this->db->get_where('a_user', array('ID' => $this->session->userdata('username')), 1)->row();
			//print_r($this->user);die;
            // Get Chats
            $chats = $this->db
				->select('chat.*, a_user.USERNAME')
				->from('chat')
				->join('a_user', 'chat.send_by = a_user.ID')
				->where('(send_by = '. $this->session->userdata('username') .' AND send_to = '. $friend->ID .')')
				->or_where('(send_to = '.$this->session->userdata('username') .' AND send_by = '. $friend->ID .')')
				->order_by('chat.time', 'desc')
				->limit(100)
				->get()
				->result();
			//print_r($this->db->last_query());die;
            $result = array(
                'USERNAME' => $friend->USERNAME,
                'chats' => $chats
            );
            echo json_encode($result);
        }
    }

    public function sendMessage()
    {
		$data['user'] = $this->db->get_where('a_user', array('ID' => $this->session->userdata('ID')), 1)->row();
		//print_r($data['user']);die;
        $this->db->insert('chat', array(
            'message' => htmlentities($this->input->post('message', true)),
            'send_to' => $this->input->post('chatWith'),
            'send_by' => $this->session->userdata('id')
        ));
    }

    public function unduhRaport($id)
	{
		$this->cek_sesi();
		//$data['pengumuman'] = $this->model_guru->getPengumumanByUser($this->session->userdata('nip'));
		$data['pengumuman'] = $this->model_guru->getPengumumanSiswa($id);
		//print_r($data['pengumuman']);die();
        $data['title'] = "Unduh Raport - PAUD Sekolah Anak Saleh Malang";

		$data['page'] = 'paud/guru/view_data_raport';
		$this->load->view($this->_template,$data);
	}
    
     public function unduhPenilaian($id)
	{
		$this->cek_sesi();
		//$data['pengumuman'] = $this->model_guru->getPengumumanByUser($this->session->userdata('nip'));
		$data['pengumuman'] = $this->model_guru->getPengumumanSiswa($id);
		$data['title'] = "Unduh Penilaian - PAUD Sekolah Anak Saleh Malang";

		$data['page'] = 'paud/guru/view_data_penilaian';
		$this->load->view($this->_template,$data);
	}
    
    function showResetPassword()
	{
		$this->cek_sesi();
		$data['title'] = "Reset Password - PAUD Sekolah Anak Saleh Malang";

		$data['page'] = 'paud/guru/view_reset_password';
		$this->load->view($this->_template,$data);
	}

	function resetPassword()
	{
		$this->cek_sesi();
		//$passlama 	   	   = $this->input->post('passlama');
		$passbaru 	   	   = $this->input->post('passbaru');
		$verpassbaru 	   = $this->input->post('verpassbaru');
		$data = array(
			'PASSWORD' => $passbaru
		);
		$where = array(
			'USERNAME' => $this->session->userdata('username')
		);
		$this->model_guru->updatePassword($where, $data, 'a_user');
		
		//print_r($this->db->last_query());die;
		redirect("paud/guru/reset-password");
	}


    
}