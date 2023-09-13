<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	private $_template = "paud/template/template_siswa";
    
	public function __construct()
	{
		parent::__construct();
		$this->load->model('paud/model_all');
		$this->load->model('paud/siswa/model_siswa');
		$this->load->helper(array('url_helper', 'form', 'tglindo'));
    	$this->load->library(array('form_validation', 'session'));
        error_reporting(0); 
	}

	function cek_sesi(){
	    if($this->session->userdata('isLoginSiswaPaud') == FALSE)
	    {
	      redirect('paud/siswa/login');
	    }else
	    {
	    
	      $this->load->model('paud/siswa/model_login');
	      
	      $user = $this->session->userdata('USERNAME');
	             
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
		$data['title'] = "Dashboard - PAUD Sekolah Anak Saleh Malang";

		$data['page'] = 'paud/siswa/view_awal';
		$this->load->view($this->_template,$data);
	}

	public function absensi()
	{
		$this->cek_sesi();
		$data['title'] = "Data Absensi - PAUD Sekolah Anak Saleh Malang";

		
		$data['absensi'] = $this->model_siswa->getAbsensi($this->session->userdata('USERNAME'));
		$data['page'] = 'paud/siswa/view_absensi';
		$this->load->view($this->_template,$data);
	}

	public function pembayaranSpp()
	{
		$this->cek_sesi();
		$data['tahun'] = $this->model_all->getTahunAktif();
		$tahun         = $data['tahun']->TAHUN.$data['tahun']->SEMESTER;

		$data['siswa'] = $this->model_siswa->getPembayaran($this->session->userdata('USERNAME'));
		$data['title'] = "Data SPP Sekolah - PAUD Sekolah Anak Saleh Malang";

		$data['page'] = 'paud/siswa/view_pembayaran';
		$this->load->view($this->_template,$data);
	}

	public function pengumuman()
	{
		$this->cek_sesi();
		$data['title'] = "Pengumuman - PAUD Sekolah Anak Saleh Malang";

		$data['cekKelas'] = $this->db->get_where('tb_siswa', array('NIS' => $this->session->userdata('kelas')))->row();
		//print_r($data['cekKelas']);die;
		$data['pengumumansiswa'] = $this->model_siswa->getPengumumanSiswa($this->session->userdata('USERNAME'));
		$data['pengumumankelas'] = $this->model_siswa->getPengumumanKelas($this->session->userdata('kelas'));
		//print_r($data['pengumumankelas']);die;
		$data['page'] = 'paud/siswa/view_pengumuman';
		$this->load->view($this->_template,$data);
	}

	public function detailPengumuman($id)
	{
		$this->cek_sesi();
		$data['title'] = "Detail Pengumuman - PAUD Sekolah Anak Saleh Malang";

		$data['pengumuman'] = $this->model_all->getDetailPengumuman($id);
		$data['page'] = 'paud/siswa/view_pengumuman';
		$this->load->view($this->_template,$data);
	}

	function Pesan(){
		//$data['teman'] = $this->model_all->getAllUser();
		$this->user = $this->db->get_where('a_user', array('ID' => $this->session->userdata('ID')), 1)->row();
		$data['teman'] = $this->db->where('USERNAME !=', $this->session->userdata('USERNAME'))->get('a_user');
		//print_r($this->db->last_query());die;
		$data['title'] = "Pesan - PAUD Sekolah Anak Saleh Malang";

		$data['page'] = 'paud/siswa/view_pesan';
		$this->load->view($this->_template,$data);
	}

	public function getChat()
    {
        header('Content-Type: application/json');
        if ($this->input->is_ajax_request()) {
            // Find friend
            $friend = $this->db->get_where('a_user', array('ID' => $this->input->post('chatWith')), 1)->row();
			$this->user = $this->db->get_where('a_user', array('ID' => $this->session->userdata('id')), 1)->row();
			//print_r($this->user);die;
            // Get Chats
            $chats = $this->db
				->select('chat.*, a_user.USERNAME')
				->from('chat')
				->join('a_user', 'chat.send_by = a_user.ID')
				->where('(send_by = '. $this->session->userdata('USERNAME') .' AND send_to = '. $friend->ID .')')
				->or_where('(send_to = '.$this->session->userdata('USERNAME') .' AND send_by = '. $friend->ID .')')
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

}
?>