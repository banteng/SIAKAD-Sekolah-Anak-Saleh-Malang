<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	private $_template = "sd/template_admin";
    
	public function __construct()
	{
		parent::__construct();
		$this->load->model('sd/model_all');
		$this->load->model('sd/admin/model_admin');
		$this->load->helper(['url_helper', 'form', 'tglindo', 'currency']);
		$this->load->library(['form_validation', 'session', 'upload', 'email']);
        error_reporting(0); 
	}

	function cek_sesi(){
	    if($this->session->userdata('isLoginAdminSD') == FALSE)
	    {
	      redirect('sd/admin/login');
	    }else
	    {
	    
	      $this->load->model('sd/admin/model_login');
	      
	      $user = $this->session->userdata('username');
	      
	      $data['level'] = $this->session->userdata('level');        
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
        $data['siswa'] = $this->model_all->countAllSiswa();
        $data['kelas'] = $this->model_all->countAllKelas();
        $data['pegawai'] = $this->model_all->countAllPegawai();
        $data['matpel'] = $this->model_all->countAllMatpel();
        
         
        $data['tidakadakelas'] = $this->model_all->countAllKelasKosong();
        $data['datatidaklengkap'] = $this->model_all->countAllDataCek();
        
        $data['trans'] = $this->model_all->LaporanPembayaranSPPLimit();
        $data['log'] = $this->model_all->LogAuth($this->session->userdata('username'));
        
		$data['title'] = "Dashboard - SD Anak Saleh Malang";

		$data['page'] = 'sd/admin/view_awal';
		$this->load->view($this->_template,$data);
	}

	function showResetPassword()
	{
		$this->cek_sesi();
		$data['title'] = "Reset Password - SD Anak Saleh Malang";

		$data['page'] = 'sd/admin/view_reset_password';
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
		$this->model_admin->updatePassword($where, $data, 'a_admin');
		
		//print_r($this->db->last_query());die;
		redirect("sd/admin/reset-password");
	}

	public function tahunAjaran()
	{
		$this->cek_sesi();
		$data['title'] = "Tahun Ajaran - SD Anak Saleh Malang";

		$data['tahun'] = $this->model_all->getTahunAktif();
		
		$data['page'] = 'sd/admin/view_tahun_ajaran';
		$this->load->view($this->_template,$data);
	}

	function prosesTahunAjaran()
	{ 
		$this->cek_sesi();
		$tahun 	   	   = $this->input->post('tahun');
		$semester 	   = $this->input->post('semester');

		$data = array(
			'TAHUN' => $tahun,
			'SEMESTER' => $semester,
			'STATUS' => 1
		);

		$where = array(
				'ID' => 1
		);
		//print_r($data);die;
		$this->model_all->updateTahunAjaran($where, $data, 'tb_tahun_aktif');
		//$this->model_all->updateTahunAjaran($tahun, $semester);
		//print_r($this->db->last_query());die;
		redirect("sd/admin/tahun-ajaran");
	}

	public function chat()
	{
		$this->cek_sesi();
		$data['title'] = "Chat - SD Anak Saleh Malang";

		$data['siswa'] = $this->model_all->getAllSiswa();
		$data['page'] = 'sd/admin/view_chat';
		$this->load->view($this->_template,$data);
	}

	public function cms()
	{
		$this->cek_sesi();
		$data['title'] = "CMS - SD Anak Saleh Malang";

		$data['cms'] = $this->model_all->getCMS();
		$data['ip'] = $this->model_all->getSettingIP();
		$data['page'] = 'sd/admin/view_cms';
		$this->load->view($this->_template,$data);
	}


	public function uploadCMS(){
    $config['upload_path'] = './upload/cms';
    $config['allowed_types'] = 'jpg|png|jpeg';
    $config['max_size']  = '2048';
    $config['remove_space'] = TRUE;
  
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
    if($this->upload->do_upload('logo')){ 
      $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
      return $return;
    }else{
      $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
      return $return;
    }
	}
	
	public function uploadSiswa(){
    $config['upload_path'] = './upload/siswa';
    $config['allowed_types'] = 'jpg|png|jpeg';
    $config['max_size']  = '2048';
    $config['remove_space'] = TRUE;
  
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
    if($this->upload->do_upload('fotosiswa')){ 
      $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
      return $return;
    }else{
      $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
      return $return;
    }
	}

	public function uploadPegawai(){
		$config['upload_path'] = './upload/guru';
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['max_size']  = '2048';
		$config['remove_space'] = TRUE;
	  
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		
		if($this->upload->do_upload('fotopegawai')){ 
		  $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
		  return $return;
		}else{
		  $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
		  return $return;
		}
		}
    
    public function uploadPengumuman(){
    $config['upload_path'] = './upload/pengumuman';
    $config['allowed_types'] = 'jpg|png|jpeg|pdf|word|xls';
    $config['max_size']  = '2048';
    $config['remove_space'] = TRUE;
  
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
    if($this->upload->do_upload('lampiran')){ 
      $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
      return $return;
    }else{
      $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
      return $return;
    }
	}

	public function prosesCMS()
	{
		$this->cek_sesi();
		$logo 						 = $this->uploadCMS();
		$yayasan  				 	 = $this->input->post('yayasan');
		$sekolah  				 	 = $this->input->post('sekolah');
		$telp  						 = $this->input->post('notelp');
		$fax  					 	 = $this->input->post('nofax');
		$alamat  					 = $this->input->post('alamat');
		$website  		 		 	 = $this->input->post('website');
		$fingerprint  		 		 = $this->input->post('fingerprint');

		if($this->input->post('logo') == NULL){
		$data = array(
			'NAMA_LENGKAP' => $sekolah,
			'NAMA_YAYASAN' => $yayasan,
			'NO_TELP' => $telp,
			'NO_FAX' => $fax,
			'ALAMAT' => $alamat,
			'WEBSITE' => $website
		);
		}else{
			$data = array(
				'NAMA_LENGKAP' => $sekolah,
				'NAMA_YAYASAN' => $yayasan,
				'NO_TELP' => $telp,
				'NO_FAX' => $fax,
				'ALAMAT' => $alamat,
				'WEBSITE' => $website,
				'LOGO' => $logo['file']['file_name']
			);
		}
		//print_r($data);die;
		$data1 = array(
			'ALAMAT_IP' => $fingerprint
		);
		$this->model_all->setCMS('1', $data, 'cms');
		$this->model_all->setIP('1', $data1, 'tb_setting_fingerprint');

		redirect('sd/admin/cms');
	}

	//START DATA SISWA
	public function dataSiswa()
	{
		$this->cek_sesi();
        $kelas = $this->uri->segment(4);
        
        if($kelas == "semua"){
			$data['siswa'] = $this->model_all->getAllSiswa();
            //echo $this->db->last_query();die;
		}else if($kelas) {
		 	$data['siswa'] = $this->model_all->getSiswaByKelas($kelas);
        }
        
        //$data['siswa'] = $this->model_all->getAllSiswa();
        $data['kelas'] = $this->model_all->getAllKelasSD();
		$data['title'] = "Data Siswa - SD Anak Saleh Malang";

		$data['page'] = 'sd/admin/view_siswa';
		$this->load->view($this->_template,$data);
	}
    
    public function ajaxListSiswa()
	{
		$list = $this->model_all->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $siswa) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $siswa->NIS;
			$row[] = $siswa->NISN;
			$row[] = $siswa->NAMA_LENGKAP;
			$row[] = $siswa->NAMA_KELAS;
			$row[] = $siswa->JENIS_KELAMIN;

			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->model_all->count_all(),
						"recordsFiltered" => $this->model_all->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}
    
	public function tambahSiswa()
	{
		$this->cek_sesi();
		$data['title'] = "Tambah Data Siswa | SD Anak Saleh Malang";
		$data['kelas'] =  $this->model_all->getAllKelas();

		$data['page'] = 'sd/admin/view_tambah_siswa';
		$this->load->view($this->_template,$data);
	}

	public function prosesSiswa()
	{
		$this->cek_sesi();
		$logo 						 = $this->uploadSiswa();
		$data['tahun']               = $this->model_all->getTahunAktif();
		$tahun                       = $data['tahun']->TAHUN.$data['tahun']->SEMESTER;

		$nis  		      = $this->input->post('nis');
		$nisn 		      = $this->input->post('nisn');
		$nama 	 	      = $this->input->post('nama');
		$panggilan 	      = $this->input->post('panggilan');
		$email 		      = $this->input->post('email');
		$jk 		      = $this->input->post('jk');
		$golongandarah    = $this->input->post('golongandarah');
		$agama            = $this->input->post('agama');
		$statuskeluarga   = $this->input->post('statuskeluarga');
		$norumah          = $this->input->post('norumah');
		$alamat           = $this->input->post('alamat');
		$rt               = $this->input->post('rt');
		$rw               = $this->input->post('rw');
		$kelurahan        = $this->input->post('kelurahan');
		$kecamatan        = $this->input->post('kecamatan');
		$kota             = $this->input->post('kota');
		$provinsi         = $this->input->post('provinsi');
		$kodepos          = $this->input->post('kodepos');
		$anakke           = $this->input->post('anakke');
		$jmlsaudara       = $this->input->post('jmlsaudara');
		$bb               = $this->input->post('bb');
		$tb               = $this->input->post('tb');
		$jarak            = $this->input->post('jarak');
		$waktu            = $this->input->post('waktu');
		$noakta           = $this->input->post('noakta');
		$noakta           = $this->input->post('nik');
        $alamatkk         = $this->input->post('alamatkk');
		$rtkk             = $this->input->post('rtkk');
		$rwkk             = $this->input->post('rwkk');
		$kelurahankk      = $this->input->post('kelurahankk');
		$kecamatankk      = $this->input->post('kecamatankk');
		$kotakk           = $this->input->post('kotakk');
		$provinsikk       = $this->input->post('provinsikk');
		$kodeposkk        = $this->input->post('kodeposkk');
		$kewarganegaraan  = $this->input->post('kewarganegaraan');
		$kelas 		      = $this->input->post('kelas');
		$tempat 	      = $this->input->post('tempatlahir');
		$tanggal 	      = $this->input->post('tanggallahir');
		$nikayah 	      = $this->input->post('nikayah');
		$namaayah 	      = $this->input->post('namaayah');
		$tmplahirayah     = $this->input->post('tmplahirayah');
		$tgllahirayah     = $this->input->post('tgllahirayah');
		$nohpayah 	      = $this->input->post('nohpayah');
		$pendidikanayah   = $this->input->post('pendidikanayah');
		$pekerjaanayah    = $this->input->post('pekerjaanayah');
		$insayah 	      = $this->input->post('instansiayah');
		$alamatinsayah    = $this->input->post('alamatinstansiayah');
		$noinstansiayah   = $this->input->post('noinstansiayah');
		$penghasilanayah  = $this->input->post('penghasilanayah');
		$emailayah 	      = $this->input->post('emailayah');
		$nikibu 	      = $this->input->post('nikibu');
		$namaibu 	      = $this->input->post('namaibu');
		$tmplahiribu      = $this->input->post('tmplahiribu');
		$tgllahiribu      = $this->input->post('tgllahiribu');
		$nohpibu 	      = $this->input->post('nohpibu');
		$pendidikanibu    = $this->input->post('pendidikanibu');
		$pekerjaanibu     = $this->input->post('pekerjaanibu');
		$insibu 	      = $this->input->post('instansiibu');
		$alamatinsibu     = $this->input->post('alamatinstansiibu');
		$noinstansiibu    = $this->input->post('noinstansiibu');
		$penghasilanibu   = $this->input->post('penghasilanibu');
		$emailibu 	      = $this->input->post('emailibu');
        $nikwali 	      = $this->input->post('nikwali');
		$namawali 	      = $this->input->post('namawali');
		$tmplahirwali     = $this->input->post('tmplahirwali');
		$tgllahirwali     = $this->input->post('tgllahirwali');
		$nohpwali 	      = $this->input->post('nohpwali');
		$pendidikanwali   = $this->input->post('pendidikanwali');
		$pekerjaanwali    = $this->input->post('pekerjaanwali');
		$inswali 	      = $this->input->post('instansiwali');
		$alamatinswali    = $this->input->post('alamatinstansiwali');
		$noinstansiwali   = $this->input->post('noinstansiwali');
		$penghasilanwali  = $this->input->post('penghasilanwali');
		$emailwali 	      = $this->input->post('emailwali');
		$tahunmasuk 	  = $this->input->post('tahunmasuk');
		$nodaftarulang 	  = $this->input->post('nodaftarulang');

        $cek = $this->model_all->getSiswaById($nis);
        if($cek > 0){
            
        }else{
		$data = array(
			'NIS' => $nis,
			'NISN' => $nisn,
			'NAMA_SISWA' => $nama,
			'PANGGILAN' => $panggilan,
			'EMAIL' => $email,
			'JENIS_KELAMIN' => $jk,
			'GOLONGAN_DARAH' => $golongandarah,
			'AGAMA' => $agama,
			'STATUS_DALAM_KELUARGA' => $statuskeluarga,
			'NOMOR_TELEPON_RUMAH' => $norumah,
			'ALAMAT_RUMAH' => $alamatrumah,
			'RT' => $rtrumah,
			'RW' => $rwrumah,
			'KELURAHAN' => $kelurahan,
			'KECAMATAN' => $kecamatan,
			'KOTA' => $kota,
			'PROVINSI' => $provinsi,
			'KODE_POS' => $kodepos,
			'ANAK_KE' => $anakke,
			'JUMLAH_SAUDARA' => $jmlsaudara,
			'BERAT_BADAN' => $bb,
			'TINGGI_BADAN' => $tb,
			'JARAK_RUMAH' => $jarak,
			'WAKTU_TEMPUH' => $waktu,
			'NO_AKTA' => $noakta,
			'NIK' => $nik,
            'ALAMAT_RUMAH_KK' => $alamatrumahkk,
			'RT_KK' => $rtrumahkk,
			'RW_KK' => $rwrumahkk,
			'KELURAHAN_KK' => $kelurahankk,
			'KECAMATAN_KK' => $kecamatankk,
			'KOTA_KK' => $kotakk,
			'PROVINSI_KK' => $provinsikk,
			'KODE_POS_KK' => $kodeposkk,
			'KEWARGANEGARAAN' => $kewarganegaraan,
			'KELAS' => $kelas,
			'TEMPAT_LAHIR' => $tempat,
			'TANGGAL_LAHIR' => $tanggal,
			'NAMA_AYAH' => $namaayah,
			'NIK_AYAH' => $nikayah,
			'TEMPAT_LAHIR_AYAH' => $tmplahirayah,
			'TANGGAL_LAHIR_AYAH' => $tgllahirayah,
			'NOMOR_HANDPHONE_AYAH' => $nohpayah,
			'PENDIDIKAN_AYAH' => $pendidikanayah,
			'PEKERJAAN_AYAH' => $pekerjaanayah,
			'INSTANSI_AYAH' => $instansiayah,
			'ALAMAT_INSTANSI_AYAH' => $alamatinstansiayah,
			'NOMOR_TELEPON_INSTANSI_AYAH' => $noinstansiayah,
			'PENGHASILAN_AYAH' => $penghasilanayah,
			'EMAIL_AYAH' => $emailayah,
            'NAMA_IBU' => $namaibu,
			'NIK_IBU' => $nikibu,
			'TEMPAT_LAHIR_IBU' => $tmplahiribu,
			'TANGGAL_LAHIR_IBU' => $tgllahiribu,
			'NOMOR_HANDPHONE_IBU' => $nohpibu,
			'PENDIDIKAN_IBU' => $pendidikanibu,
			'PEKERJAAN_IBU' => $pekerjaanibu,
			'INSTANSI_IBU' => $instansiibu,
			'ALAMAT_INSTANSI_IBU' => $alamatinstansiibu,
			'NOMOR_TELEPON_INSTANSI_IBU' => $noinstansiibu,
			'PENGHASILAN_IBU' => $penghasilanibu,
			'EMAIL_IBU' => $emailibu,
            'NAMA_WALI' => $namawali,
			'NIK_WALI' => $nikwali,
			'TEMPAT_LAHIR_WALI' => $tmplahirwali,
			'TANGGAL_LAHIR_WALI' => $tgllahirwali,
			'NOMOR_HANDPHONE_WALI' => $nohpwali,
			'PENDIDIKAN_WALI' => $pendidikanwali,
			'PEKERJAAN_WALI' => $pekerjaanwali,
			'INSTANSI_WALI' => $instansiwali,
			'ALAMAT_INSTANSI_WALI' => $alamatinstansiwali,
			'NOMOR_TELEPON_INSTANSI_WALI' => $noinstansiwali,
			'PENGHASILAN_WALI' => $penghasilanwali,
			'EMAIL_WALI' => $emailwali,
            'TAHUN_MASUK' => $tahunmasuk,
            'NOMOR_DAFTAR_ULANG' => $nodaftarulang,
			'FOTO' => $foto['file']['file_name']
		);
		
		$data1 = array(
			'SISWA' => $nis,
			'ID_KELAS' => $kelas,
			'TAHUN_AKTIF' => $tahun
		);

		$data2 = array(
			'NIS' => $nis,
			'PASSWORD' => $nis,
			'LEVEL' => "siswa"
		);
		$this->model_all->setSiswa('tb_siswa', $data);
		$this->model_all->setEnrollKelasSiswa('tb_enroll_kelas', $data1);

		$data['page'] = 'admin/view_tambah_siswa';
		$this->load->view($this->_template,$data);
		redirect('sd/admin/home/dataSiswa');
        }
	}
	

	public function editSiswa($id)
	{
		$this->cek_sesi();
		if($id==""){
			redirect('admin/home/dataSiswa');
		}
		$data['title'] = "Edit Data Siswa | SD Anak Saleh Malang";
		$data['siswa'] =  $this->model_all->getSiswaById($id);
		$data['kelas'] =  $this->model_all->getAllKelas();

		$data['page']  = 'sd/admin/view_edit_siswa';
		$this->load->view($this->_template,$data);
	}

	public function updateSiswa()
	{
		$this->cek_sesi();
		$logo 			  = $this->uploadSiswa();
		$id  		 	  = $this->input->post('idnis');
		$nis  		      = $this->input->post('nis');
		$nisn 		      = $this->input->post('nisn');
		$nama 	 	      = $this->input->post('nama');
		$panggilan 	      = $this->input->post('panggilan');
		$email 		      = $this->input->post('email');
		$jk 		      = $this->input->post('jk');
		$golongandarah    = $this->input->post('golongandarah');
		$agama            = $this->input->post('agama');
		$statuskeluarga   = $this->input->post('statuskeluarga');
		$norumah          = $this->input->post('norumah');
		$alamat           = $this->input->post('alamat');
		$rt               = $this->input->post('rt');
		$rw               = $this->input->post('rw');
		$kelurahan        = $this->input->post('kelurahan');
		$kecamatan        = $this->input->post('kecamatan');
		$kota             = $this->input->post('kota');
		$provinsi         = $this->input->post('provinsi');
		$kodepos          = $this->input->post('kodepos');
		$anakke           = $this->input->post('anakke');
		$jmlsaudara       = $this->input->post('jmlsaudara');
		$bb               = $this->input->post('bb');
		$tb               = $this->input->post('tb');
		$jarak            = $this->input->post('jarak');
		$waktu            = $this->input->post('waktu');
		$noakta           = $this->input->post('noakta');
		$noakta           = $this->input->post('nik');
        $alamatkk         = $this->input->post('alamatkk');
		$rtkk             = $this->input->post('rtkk');
		$rwkk             = $this->input->post('rwkk');
		$kelurahankk      = $this->input->post('kelurahankk');
		$kecamatankk      = $this->input->post('kecamatankk');
		$kotakk           = $this->input->post('kotakk');
		$provinsikk       = $this->input->post('provinsikk');
		$kodeposkk        = $this->input->post('kodeposkk');
		$kewarganegaraan  = $this->input->post('kewarganegaraan');
		$kelas 		      = $this->input->post('kelas');
		$tempat 	      = $this->input->post('tempatlahir');
		$tanggal 	      = $this->input->post('tanggallahir');
		$nikayah 	      = $this->input->post('nikayah');
		$namaayah 	      = $this->input->post('namaayah');
		$tmplahirayah     = $this->input->post('tmplahirayah');
		$tgllahirayah     = $this->input->post('tgllahirayah');
		$nohpayah 	      = $this->input->post('nohpayah');
		$pendidikanayah   = $this->input->post('pendidikanayah');
		$pekerjaanayah    = $this->input->post('pekerjaanayah');
		$insayah 	      = $this->input->post('instansiayah');
		$alamatinsayah    = $this->input->post('alamatinstansiayah');
		$noinstansiayah   = $this->input->post('noinstansiayah');
		$penghasilanayah  = $this->input->post('penghasilanayah');
		$emailayah 	      = $this->input->post('emailayah');
		$nikibu 	      = $this->input->post('nikibu');
		$namaibu 	      = $this->input->post('namaibu');
		$tmplahiribu      = $this->input->post('tmplahiribu');
		$tgllahiribu      = $this->input->post('tgllahiribu');
		$nohpibu 	      = $this->input->post('nohpibu');
		$pendidikanibu    = $this->input->post('pendidikanibu');
		$pekerjaanibu     = $this->input->post('pekerjaanibu');
		$insibu 	      = $this->input->post('instansiibu');
		$alamatinsibu     = $this->input->post('alamatinstansiibu');
		$noinstansiibu    = $this->input->post('noinstansiibu');
		$penghasilanibu   = $this->input->post('penghasilanibu');
		$emailibu 	      = $this->input->post('emailibu');
        $nikwali 	      = $this->input->post('nikwali');
		$namawali 	      = $this->input->post('namawali');
		$tmplahirwali     = $this->input->post('tmplahirwali');
		$tgllahirwali     = $this->input->post('tgllahirwali');
		$nohpwali 	      = $this->input->post('nohpwali');
		$pendidikanwali   = $this->input->post('pendidikanwali');
		$pekerjaanwali    = $this->input->post('pekerjaanwali');
		$inswali 	      = $this->input->post('instansiwali');
		$alamatinswali    = $this->input->post('alamatinstansiwali');
		$noinstansiwali   = $this->input->post('noinstansiwali');
		$penghasilanwali  = $this->input->post('penghasilanwali');
		$emailwali 	      = $this->input->post('emailwali');

		$where = array(
			'NIS' => $id
		);
	 
		if($this->input->post('fotosiswa') == ""){
		$data = array(
			'NIS' => $nis,
			'NISN' => $nisn,
			'NAMA_SISWA' => $nama,
			'PANGGILAN' => $panggilan,
			'EMAIL' => $email,
			'JENIS_KELAMIN' => $jk,
			'GOLONGAN_DARAH' => $golongandarah,
			'AGAMA' => $agama,
			'STATUS_DALAM_KELUARGA' => $statuskeluarga,
			'NOMOR_TELEPON_RUMAH' => $norumah,
			'ALAMAT_RUMAH' => $alamatrumah,
			'RT' => $rtrumah,
			'RW' => $rwrumah,
			'KELURAHAN' => $kelurahan,
			'KECAMATAN' => $kecamatan,
			'KOTA' => $kota,
			'PROVINSI' => $provinsi,
			'KODE_POS' => $kodepos,
			'ANAK_KE' => $anakke,
			'JUMLAH_SAUDARA' => $jmlsaudara,
			'BERAT_BADAN' => $bb,
			'TINGGI_BADAN' => $tb,
			'JARAK_RUMAH' => $jarak,
			'WAKTU_TEMPUH' => $waktu,
			'NO_AKTA' => $noakta,
			'NIK' => $nik,
            'ALAMAT_RUMAH_KK' => $alamatrumahkk,
			'RT_KK' => $rtrumahkk,
			'RW_KK' => $rwrumahkk,
			'KELURAHAN_KK' => $kelurahankk,
			'KECAMATAN_KK' => $kecamatankk,
			'KOTA_KK' => $kotakk,
			'PROVINSI_KK' => $provinsikk,
			'KODE_POS_KK' => $kodeposkk,
			'KEWARGANEGARAAN' => $kewarganegaraan,
			'KELAS' => $kelas,
			'TEMPAT_LAHIR' => $tempat,
			'TANGGAL_LAHIR' => $tanggal,
			'NAMA_AYAH' => $namaayah,
			'NIK_AYAH' => $nikayah,
			'TEMPAT_LAHIR_AYAH' => $tmplahirayah,
			'TANGGAL_LAHIR_AYAH' => $tgllahirayah,
			'NOMOR_HANDPHONE_AYAH' => $nohpayah,
			'PENDIDIKAN_AYAH' => $pendidikanayah,
			'PEKERJAAN_AYAH' => $pekerjaanayah,
			'INSTANSI_AYAH' => $instansiayah,
			'ALAMAT_INSTANSI_AYAH' => $alamatinstansiayah,
			'NOMOR_TELEPON_INSTANSI_AYAH' => $noinstansiayah,
			'PENGHASILAN_AYAH' => $penghasilanayah,
			'EMAIL_AYAH' => $emailayah,
            'NAMA_IBU' => $namaibu,
			'NIK_IBU' => $nikibu,
			'TEMPAT_LAHIR_IBU' => $tmplahiribu,
			'TANGGAL_LAHIR_IBU' => $tgllahiribu,
			'NOMOR_HANDPHONE_IBU' => $nohpibu,
			'PENDIDIKAN_IBU' => $pendidikanibu,
			'PEKERJAAN_IBU' => $pekerjaanibu,
			'INSTANSI_IBU' => $instansiibu,
			'ALAMAT_INSTANSI_IBU' => $alamatinstansiibu,
			'NOMOR_TELEPON_INSTANSI_IBU' => $noinstansiibu,
			'PENGHASILAN_IBU' => $penghasilanibu,
			'EMAIL_IBU' => $emailibu,
            'NAMA_WALI' => $namawali,
			'NIK_WALI' => $nikwali,
			'TEMPAT_LAHIR_WALI' => $tmplahirwali,
			'TANGGAL_LAHIR_WALI' => $tgllahirwali,
			'NOMOR_HANDPHONE_WALI' => $nohpwali,
			'PENDIDIKAN_WALI' => $pendidikanwali,
			'PEKERJAAN_WALI' => $pekerjaanwali,
			'INSTANSI_WALI' => $instansiwali,
			'ALAMAT_INSTANSI_WALI' => $alamatinstansiwali,
			'NOMOR_TELEPON_INSTANSI_WALI' => $noinstansiwali,
			'PENGHASILAN_WALI' => $penghasilanwali,
			'EMAIL_WALI' => $emailwali,
            'TAHUN_MASUK' => $tahunmasuk,
            'NOMOR_DAFTAR_ULANG' => $nodaftarulang
		);
		}else{
		$data = array(
			'NIS' => $nis,
			'NISN' => $nisn,
			'NAMA_LENGKAP' => $nama,
			'PANGGILAN' => $panggilan,
			'EMAIL' => $email,
			'JENIS_KELAMIN' => $jk,
			'GOLONGAN_DARAH' => $golongandarah,
			'AGAMA' => $agama,
			'STATUS_DALAM_KELUARGA' => $statuskeluarga,
			'NOMOR_TELEPON_RUMAH' => $norumah,
			'ALAMAT_RUMAH' => $alamatrumah,
			'RT' => $rtrumah,
			'RW' => $rwrumah,
			'KELURAHAN' => $kelurahan,
			'KECAMATAN' => $kecamatan,
			'KOTA' => $kota,
			'PROVINSI' => $provinsi,
			'KODE_POS' => $kodepos,
			'ANAK_KE' => $anakke,
			'JUMLAH_SAUDARA' => $jmlsaudara,
			'BERAT_BADAN' => $bb,
			'TINGGI_BADAN' => $tb,
			'JARAK_RUMAH' => $jarak,
			'WAKTU_TEMPUH' => $waktu,
			'NO_AKTA' => $noakta,
			'NIK' => $nik,
            'ALAMAT_RUMAH_KK' => $alamatrumahkk,
			'RT_KK' => $rtrumahkk,
			'RW_KK' => $rwrumahkk,
			'KELURAHAN_KK' => $kelurahankk,
			'KECAMATAN_KK' => $kecamatankk,
			'KOTA_KK' => $kotakk,
			'PROVINSI_KK' => $provinsikk,
			'KODE_POS_KK' => $kodeposkk,
			'KEWARGANEGARAAN' => $kewarganegaraan,
			'KELAS' => $kelas,
			'TEMPAT_LAHIR' => $tempat,
			'TANGGAL_LAHIR' => $tanggal,
			'NAMA_AYAH' => $namaayah,
			'NIK_AYAH' => $nikayah,
			'TEMPAT_LAHIR_AYAH' => $tmplahirayah,
			'TANGGAL_LAHIR_AYAH' => $tgllahirayah,
			'NOMOR_HANDPHONE_AYAH' => $nohpayah,
			'PENDIDIKAN_AYAH' => $pendidikanayah,
			'PEKERJAAN_AYAH' => $pekerjaanayah,
			'INSTANSI_AYAH' => $instansiayah,
			'ALAMAT_INSTANSI_AYAH' => $alamatinstansiayah,
			'NOMOR_TELEPON_INSTANSI_AYAH' => $noinstansiayah,
			'PENGHASILAN_AYAH' => $penghasilanayah,
			'EMAIL_AYAH' => $emailayah,
            'NAMA_IBU' => $namaibu,
			'NIK_IBU' => $nikibu,
			'TEMPAT_LAHIR_IBU' => $tmplahiribu,
			'TANGGAL_LAHIR_IBU' => $tgllahiribu,
			'NOMOR_HANDPHONE_IBU' => $nohpibu,
			'PENDIDIKAN_IBU' => $pendidikanibu,
			'PEKERJAAN_IBU' => $pekerjaanibu,
			'INSTANSI_IBU' => $instansiibu,
			'ALAMAT_INSTANSI_IBU' => $alamatinstansiibu,
			'NOMOR_TELEPON_INSTANSI_IBU' => $noinstansiibu,
			'PENGHASILAN_IBU' => $penghasilanibu,
			'EMAIL_IBU' => $emailibu,
            'NAMA_WALI' => $namawali,
			'NIK_WALI' => $nikwali,
			'TEMPAT_LAHIR_WALI' => $tmplahirwali,
			'TANGGAL_LAHIR_WALI' => $tgllahirwali,
			'NOMOR_HANDPHONE_WALI' => $nohpwali,
			'PENDIDIKAN_WALI' => $pendidikanwali,
			'PEKERJAAN_WALI' => $pekerjaanwali,
			'INSTANSI_WALI' => $instansiwali,
			'ALAMAT_INSTANSI_WALI' => $alamatinstansiwali,
			'NOMOR_TELEPON_INSTANSI_WALI' => $noinstansiwali,
			'PENGHASILAN_WALI' => $penghasilanwali,
			'EMAIL_WALI' => $emailwali,
            'TAHUN_MASUK' => $tahunmasuk,
            'NOMOR_DAFTAR_ULANG' => $nodaftarulang,
			'FOTO' => $foto['file']['file_name']
		);
		}
		$this->model_all->updateSiswa($where, $data, 'tb_siswa');
		redirect('sd/admin/home/dataSiswa');

	}
	
	function hapusSiswa($id){
		$this->cek_sesi();
		$where = array('NIS' => $id);
		$where1 = array('SISWA' => $id);
		$this->model_all->deleteSiswa($where,'tb_siswa');
		$this->model_all->deleteEnrollSiswa($where,'tb_enroll_siswa');
		$this->model_all->deleteEnrollKelas($where1,'tb_enroll_kelas');
		$this->model_all->deleteEnrollSPP($where,'tb_enroll_spp');
		redirect('sd/admin/home/dataSiswa');
	}
	function importSiswa(){
		$this->cek_sesi();
        $data['title']  = 'Import Data Siswa';
        $data['page']  = 'sd/admin/view_import_siswa';
		$this->load->view($this->_template,$data);
    }
    
  
	//END DATA SISWA

	//START DATA PEGAWAI
    function importPegawai(){
		$this->cek_sesi();
        $data['title']  = 'Import Data Pegawai';
        $data['page']  = 'sd/admin/view_import_pegawai';
		$this->load->view($this->_template,$data);
    }
	public function dataPegawai()
	{
		$this->cek_sesi();
		$data['pegawai'] = $this->model_all->getAllPegawai();

		$data['title'] = "Data Pegawai - SD Anak Saleh Malang";

		$data['page']  = 'sd/admin/view_pegawai';
		$this->load->view($this->_template,$data);
	}

	public function tambahPegawai()
	{
		$this->cek_sesi();
		$data['title'] 	= "Tambah Data Siswa | SD Anak Saleh Malang";
		$data['status'] =  $this->model_all->getAllStatusPeg();
		$data['kelas'] =  $this->model_all->getAllKelas();

		$data['page']	= 'sd/admin/view_tambah_pegawai';
		$this->load->view($this->_template,$data);
	}
    
    public function prosesStatusPeg()
	{
		$this->cek_sesi();
		$status  = $this->input->post('status');

		$data = array(
			'STATUS_KEPEGAWAIAN' => $status
		);

        $this->model_all->setStatusPeg('tb_status_kepegawaian', $data);
            
        if($this->db->affected_rows() > 0){
            $this->session->set_flashdata('status', "<strong>Data berhasil diinput!</strong>");
            $this->session->set_flashdata('clr', 'success');
        }else{
            $this->session->set_flashdata('status', "<strong>Error!</strong>");
            $this->session->set_flashdata('clr', 'danger');
        }
		redirect('sd/admin/status-pegawai');
	}

	public function prosesPegawai()
	{
		$this->cek_sesi();
		$this->uploadPegawai();
		$nip  		  = $this->input->post('nip');
		$nuptk 		  = $this->input->post('nuptk');
		$nama 	 	  = $this->input->post('nama');
		$tempat	 	  = $this->input->post('tempat');
		$tanggal	  = $this->input->post('tanggal');
		$alamat	 	  = $this->input->post('alamat');
		$notelp	 	  = $this->input->post('notelp');
		$nohp 	 	  = $this->input->post('nohp');
		$email 		  = $this->input->post('email');
		$jk 		  = $this->input->post('jk');
		$status 	  = $this->input->post('status');
		$mulaikerja   = $this->input->post('mulaikerja');
		$fingerprint  = $this->input->post('fingerprint');
		$foto         = $this->input->post('foto');

		$data = array(
			'NIP' => $nip,
			'NUPTK' => $nuptk,
			'NAMA_LENGKAP' => $nama,
			'TEMPAT_LAHIR' => $tempat,
			'TANGGAL_LAHIR' => $tanggal,
			'ALAMAT' => $alamat,
			'NAMA_LENGKAP' => $nama,
			'EMAIL' => $email,
			'JENIS_KELAMIN' => $jk,
			'STATUS_PEGAWAI' => $status,
			'NOMOR_TELEPON' => $notelp,
			'NOMOR_HANDPHONE' => $nohp,
			'NO_FINGERPRINT' => $fingerprint,
			'MULAI_BEKERJA' => $mulaikerja,
			'FOTO' => $foto['file']['file_name']
		);

		//print_r($data);die;
		$this->model_all->setPegawai('tb_pegawai', $data);

		$data['page'] = 'sd/admin/view_tambah_pegawai';
		$this->load->view($this->_template,$data);
		redirect('sd/admin/home/dataPegawai');
	}
	

	public function editPegawai($id)
	{
		$this->cek_sesi();
		$data['title'] 		= "Edit Data Pegawai | SD Anak Saleh Malang";
		$data['pegawai'] 	=  $this->model_all->getPegawaiById($id);
		$data['status'] 	=  $this->model_all->getAllStatusPeg();

		$data['page'] = 'sd/admin/view_edit_pegawai';
		$this->load->view($this->_template,$data);
	}

	public function updatePegawai($id)
	{
		$this->cek_sesi();
		$this->uploadPegawai();
		$nip  		 = $this->input->post('nip');
		$nuptk 		 = $this->input->post('nuptk');
		$nama 	 	 = $this->input->post('nama');
		$tempat	 	 = $this->input->post('tempat');
		$tanggal	 = $this->input->post('tanggal');
		$alamat	 	 = $this->input->post('alamat');
		$notelp	 	 = $this->input->post('notelp');
		$nohp 	 	 = $this->input->post('nohp');
		$email 		 = $this->input->post('email');
		$jk 		 = $this->input->post('jk');
		$status 	 = $this->input->post('status');
		$mulaikerja  = $this->input->post('mulaikerja');
		$fingerprint  = $this->input->post('fingerprint');


		$where = array(
			'NIP' => $id
		);

		if($this->input->post('fotopegawai') == ""){
		$data = array(
			'NIP' => $nip,
			'NUPTK' => $nuptk,
			'NAMA_LENGKAP' => $nama,
			'TEMPAT_LAHIR' => $tempat,
			'TANGGAL_LAHIR' => $tanggal,
			'ALAMAT' => $alamat,
			'NAMA_LENGKAP' => $nama,
			'EMAIL' => $email,
			'JENIS_KELAMIN' => $jk,
			'STATUS_PEGAWAI' => $status,
			'NOMOR_TELEPON' => $notelp,
			'NOMOR_HANDPHONE' => $nohp,
			'NO_FINGERPRINT' => $fingerprint,
			'MULAI_BEKERJA' => $mulaikerja,
		);	
		}else{
		$data = array(
			'NIP' => $nip,
			'NUPTK' => $nuptk,
			'NAMA_LENGKAP' => $nama,
			'TEMPAT_LAHIR' => $tempat,
			'TANGGAL_LAHIR' => $tanggal,
			'ALAMAT' => $alamat,
			'NAMA_LENGKAP' => $nama,
			'EMAIL' => $email,
			'JENIS_KELAMIN' => $jk,
			'STATUS_PEGAWAI' => $status,
			'NOMOR_TELEPON' => $notelp,
			'NOMOR_HANDPHONE' => $nohp,
			'NO_FINGERPRINT' => $fingerprint,
			'MULAI_BEKERJA' => $mulaikerja,
			'FOTO' => $foto['file']['file_name']
		);
	}
		$this->model_all->updatePegawai($where, $data, 'tb_pegawai');
		redirect('sd/admin/home/dataPegawai');

	}
	
	function hapusPegawai($id){
		$this->cek_sesi();
		$where = array('NIP' => $id);
		$this->model_all->deletePegawai($where,'tb_pegawai');
		redirect('sd/admin/home/dataPegawai');
	}

	function detailPegawai(){    
		$getcode= $this->input->post('reportCode');
		$data['showdetail'] = $this->model_all->getPegawaiById($getcode);
 
		print_r($data);die;
		$this->output->set_content_type('application/json');
		$this->output->set_output(json_encode($data));
	 }

	 public function statusPegawai()
	 {
		 $this->cek_sesi();
		 $data['title'] 	= "Status Kepegawaian | SD Anak Saleh Malang";
		 $data['status'] =  $this->model_all->getAllStatusPeg();
 
		 $data['page']	= 'sd/admin/view_status_kepegawaian';
		 $this->load->view($this->_template,$data);
	 }

	 
	 public function tambahStatusPegawai()
	 {
		 $this->cek_sesi();
		 $data['title'] 	= "Tambah Status Siswa | SD Anak Saleh Malang";
		 $data['status'] =  $this->model_all->getAllStatusPeg();
 
		 $data['page']	= 'sd/admin/view_tambah_status_pegawai';
		 $this->load->view($this->_template,$data);
	 }

	 public function prosesStatusPegawai()
	{
		$this->cek_sesi();
		$status  	 = $this->input->post('status');

		$data = array(
			'STATUS_KEPEGAWAIAN' => $status
		);
		//print_r($data);die;
		$this->model_all->setStatusPeg('tb_status_kepegawaian', $data);

		redirect('sd/admin/dataPegawai');
	}

	public function updateStatusPeg($id)
	{
		$this->cek_sesi();
		$this->uploadPegawai();
		$status		 = $this->input->post('status');

		$where = array(
			'ID' => $id
		);

		
		$data = array(
			'STATUS' => $status
		);
		
		$this->model_all->updateStatusPeg($where, $data, 'tb_status_kepegawaian');
		redirect('sd/admin/home/dataPegawai');

	}
	
	function hapusStatusPeg($id){
		$this->cek_sesi();
		$where = array('ID' => $id);
		$this->model_all->deletePegawai($where,'tb_status_kepegawaian');
		redirect('sd/admin/home/dataPegawai');
	}

	//END DATA PEGAWAI

	//START DATA KELAS
	public function dataKelas()
	{
		$this->cek_sesi();
		$data['siswa'] = $this->model_all->getViewAllKelas();

		$data['title'] = "Data Kelas - SD Anak Saleh Malang";

		$data['page']  = 'sd/admin/view_kelas';
		$this->load->view($this->_template,$data);
	}

	public function tambahKelas()
	{
		$this->cek_sesi();
		$data['title'] 	= "Tambah Data kelas | SD Anak Saleh Malang";
		$data['wali'] =  $this->model_all->getAllPegawai();

		$data['page']	= 'sd/admin/view_tambah_kelas';
		$this->load->view($this->_template,$data);
	}

	public function prosesKelas()
	{
		$this->cek_sesi();
		$namakelas 		 = $this->input->post('namakelas');
		$walikelas 	 	 = $this->input->post('walikelas');
		$nominal 		 = $this->input->post('nominal');

		$data = array(
			'NAMA_KELAS' => $namakelas,
			'WALI_KELAS' => $walikelas,
			'NOMINAL_SPP' => $nominal
		);

		$this->model_all->setKelas('tb_kelas', $data);
		//print_r($this->db->last_query());die;
		redirect('sd/admin/home/dataKelas');
	}
	

	public function editKelas($id)
	{
		$this->cek_sesi();
        $data['tahun'] = $this->model_all->getTahunAktif();
		$tahun 		   = $data['tahun']->TAHUN.$data['tahun']->SEMESTER;
        //print_r($tahun);die;
		$data['title'] 		= "Edit Data Kelas | SD Anak Saleh Malang";
		$data['kelas'] 	=  $this->model_all->getKelasById($id);
        //print_r($kelas);die;
		$data['wali'] 	=  $this->model_all->getAllPegawai();

		$data['page'] = 'sd/admin/view_edit_kelas';
		$this->load->view($this->_template,$data);
	}

	public function updateKelas()
	{
		$this->cek_sesi();
		$namakelas 		 = $this->input->post('namakelas');
		$walikelas 	 	 = $this->input->post('walikelas');
		$nominal 		 = $this->input->post('nominal');

		$data = array(
			'NAMA_KELAS' => $namakelas,
			'WALI_KELAS' => $walikelas,
			'NOMINAL_SPP' => $nominal
		);

		$this->model_all->updateKelas($where, $data, 'tb_kelas');
		redirect('sd/admin/home/datakelas');
	}
	
	function hapusKelas($id){
		$this->cek_sesi();
		$where = array('ID' => $id);
		$this->model_all->deleteKelas($where,'tb_kelas');
		redirect('sd/admin/home/dataKelas');
	}

	public function detailKelas($id)
	{
		$this->cek_sesi();
		
		$data['tahun'] = $this->model_all->getTahunAktif();
		$tahun 		   = $data['tahun']->TAHUN.$data['tahun']->SEMESTER;

		$data['title'] 		= "Detail Data Kelas | SD Anak Saleh Malang";
		$data['kelas'] 	=  $this->model_all->getEnrollKelas($id, $tahun);
		$data['page'] = 'sd/admin/view_detail_kelas';
		$this->load->view($this->_template,$data);
	}

	public function tambahDetailKelas($id)
	{
		$this->cek_sesi();
		$data['tahun'] = $this->model_all->getTahunAktif();
		$tahun 		   = $data['tahun']->TAHUN.$data['tahun']->SEMESTER;

		$data['title'] 		= "Tambah Data Siswa | SD Anak Saleh Malang";
		$data['siswa'] 	=  $this->model_all->getEnrollKelas($id, $tahun);
		$data['page'] = 'sd/admin/view_tambah_detail_kelas';
		$this->load->view($this->_template,$data);
	}
	//END DATA KELAS

	//START DATA PRESENSI

	public function dataPresensiSiswa()
	{
		$this->cek_sesi();
		$data['siswa'] = $this->model_all->getViewAllPresensiSiswa();

		$data['title'] = "Data Presensi Siswa - SD Anak Saleh Malang";

		$data['page'] = 'sd/admin/view_presensi_siswa';
		$this->load->view($this->_template,$data);
	}

	public function tambahPresensiSiswa()
	{
		$this->cek_sesi();
		$data['siswa'] = $this->model_all->getAllSiswa();

		$data['title'] = "Data Presensi Siswa - SD Anak Saleh Malang";

		$data['page'] = 'sd/admin/view_tambah_presensi_siswa';
		$this->load->view($this->_template,$data);
	}

	public function setPresensiSiswa()
	{
		$this->cek_sesi();
		$data['siswa'] = $this->model_all->getAllSiswa();

		$data['title'] = "Data Presensi Siswa - SD Anak Saleh Malang";

		$data['page'] = 'sd/admin/view_tambah_presensi_siswa';
		$this->load->view($this->_template,$data);
	}

	public function dataPresensiManualSiswa()
	{
		$this->cek_sesi();
		$data['siswa'] = $this->model_all->getAllSiswa();

		$data['title'] = "Data Presensi Siswa - SD Anak Saleh Malang";

		$data['page'] = 'sd/admin/view_presensi_manual_siswa';
		$this->load->view($this->_template,$data);
	}

	public function dataPresensiPegawai()
	{
		$this->cek_sesi();
		$data['pegawai'] = $this->model_all->getViewAllPresensiPegawai();

		$data['title'] = "Data Presensi Pegawai - SD Anak Saleh Malang";

		$data['page'] = 'sd/admin/view_presensi_pegawai';
		$this->load->view($this->_template,$data);
	}

	public function presensiMasuk($id)
	{
		$this->cek_sesi();
		
		$datetime = new DateTime();
		$timezone = new DateTimeZone('Asia/Jakarta');
		$datetime->setTimezone($timezone);

		$data = array(
			'TANGGAL' => date("Y-m-d"),
			'NIS' => $id,
			'KETERANGAN' => 'MASUK',
			'STATUS_PRESENSI' => 1,
			'JAM_MASUK' => $datetime->format("H:i")
		);
		$this->model_all->setKelas('tb_presensi_siswa', $data);

		redirect('sd/admin/home/dataPresensiManualSiswa');
	}

	public function presensiPulang($id)
	{
		$this->cek_sesi();

		$where = array(
			'NIS' => $id
		);

		
		$data = array(
			'JAM_KELUAR' => date("H:i:s")
		);
		
		$this->model_all->updatePresensiManual($where, $data, 'tb_presensi_siswa');
		redirect('sd/admin/home/dataPresensiManualSiswa');

	}

	public function presensiIzin($id)
	{
		$this->cek_sesi();

		$data = array(
			'TANGGAL' => date("Y-m-d"),
			'NIS' => $id,
			'KETERANGAN' => 'IZIN',
			'STATUS_PRESENSI' => 2,
		);
		$this->model_all->setKelas('tb_presensi_siswa', $data);

		$data['page'] = 'sd/admin/view_presensi_siswa';
		$this->load->view($this->_template,$data);
		redirect('sd/admin/home/dataPresensiManualSiswa');
	}

	public function presensiSakit($id)
	{
		$this->cek_sesi();

		$data = array(
			'TANGGAL' => date("Y-m-d"),
			'NIS' => $id,
			'KETERANGAN' => 'SAKIT',
			'STATUS_PRESENSI' => 3,
		);
		$this->model_all->setKelas('tb_presensi_siswa', $data);

		$data['page'] = 'sd/admin/view_presensi_siswa';
		$this->load->view($this->_template,$data);
		redirect('sd/admin/home/dataPresensiManualSiswa');
	}

	public function prosesPresensiSiswa()
	{
		$this->cek_sesi();
		$this->form_validation->set_rules('siswa', 'Siswa', 'required|callback_select_validate');

		if ($this->form_validation->run() == TRUE) {
		$siswa = $this->input->post('siswa');
		$tanggal = $this->input->post('tanggal');
		$status = $this->input->post('status');
		$keterangan = $this->input->post('keterangan');
		$masuk = $this->input->post('masuk');
		$keluar = $this->input->post('keluar');

		$data = array(
			'NIS' => $siswa,
			'TANGGAL' => $tanggal,
			'JAM_MASUK' => $masuk,
			'JAM_KELUAR' => $keluar,
			'STATUS' => $status,
			'KETERANGAN' => $keterangan
		);
		$this->model_all->setPresensi('tb_presensi_siswa', $data);
		redirect('sd/admin/presensi-siswa');
		}else{
			$this->session->set_flashdata('status', "<strong>Data tidak lengkap!</strong>");
			$this->session->set_flashdata('clr', 'danger');
			redirect('sd/admin/tambah-presensi-siswa');
		}
	}
    
    public function tambahPresensiPegawai()
	{
		$this->cek_sesi();
		$data['pegawai'] = $this->model_all->getAllPegawai();

		$data['title'] = "Data Presensi Pegawai - SD Anak Saleh Malang";

		$data['page'] = 'sd/admin/view_tambah_presensi_pegawai';
		$this->load->view($this->_template,$data);
	}
    
    public function prosesPresensiPegawai()
	{
		$this->cek_sesi();
		$this->form_validation->set_rules('siswa', 'Siswa', 'required|callback_select_validate');

		if ($this->form_validation->run() == TRUE) {
		$siswa = $this->input->post('siswa');
		$tanggal = $this->input->post('tanggal');
		$status = $this->input->post('status');
		$keterangan = $this->input->post('keterangan');
		$masuk = $this->input->post('masuk');
		$keluar = $this->input->post('keluar');

		$data = array(
			'NIP' => $siswa,
			'TANGGAL' => $tanggal,
			'JAM_MASUK' => $masuk,
			'JAM_KELUAR' => $keluar,
			'STATUS' => $status,
			'KETERANGAN' => $keterangan
		);
		$this->model_all->setPresensi('tb_presensi_pegawai', $data);
		redirect('sd/admin/presensi-siswa');
		}else{
			$this->session->set_flashdata('status', "<strong>Data tidak lengkap!</strong>");
			$this->session->set_flashdata('clr', 'danger');
			redirect('sd/admin/tambah-presensi-pegawai');
		}
	}

	//END DATA PRESENSI

	//START SETTING
	public function pengumuman()
	{
		$this->cek_sesi();
		$data['pengumuman'] = $this->model_all->getPengumuman();

		$data['title'] = "Pengumuman - SD Anak Saleh Malang";

		$data['page'] = 'sd/admin/view_pengumuman';
		$this->load->view($this->_template,$data);
	}

	public function setPengumuman()
	{
		
		$this->cek_sesi();
		$data['siswa'] = $this->model_all->getAllSiswa();
		$data['kelas'] = $this->model_all->getAllKelasSD();
	
		$data['title'] = "Tambah Pengumuman - SD Anak Saleh Malang";
        
		$data['page'] = 'sd/admin/view_tambah_pengumuman';
		$this->load->view($this->_template,$data);
	}

	function hapusPengumuman($id){
		$this->cek_sesi();
		$where = array('ID' => $id);
		$this->model_all->deleteSiswa($where,'pengumuman');
		redirect('sd/admin/pengumuman');
	}

	public function prosesPengumuman()
	{
		$this->cek_sesi();
		
		$data['title'] = "Pengumuman - SD Anak Saleh Malang";

		$judul = $this->input->post('judul');
		$isi = $this->input->post('isi');
		$kelas = $this->input->post('kelas');
		$siswa = $this->input->post('siswa');

	   foreach($kelas as $data){
			$this->model_all->setPengumuman('pengumuman', $data
			= array(
				'JUDUL' => $judul,
				'PENGUMUMAN' => $isi,
				'LAMPIRAN1' => $logo['file']['file_name'],
				'KELAS' => $data,
				'SISWA' => $siswa,
				'TANGGAL_TERBIT' => date("Y-m-d H:i:s")
			));
		}
        
        /*$ci = get_instance();
        $config['protocol'] = "smtp";
        $config['smtp_host'] = "smtp.gmail.com";
        $config['smtp_port'] = "465";
        $config['smtp_user'] = "xxxx@gmail.com";
        $config['smtp_pass'] = "xxxxx";
        $config['charset'] = "utf-8";
        $config['mailtype'] = "html";
        $config['newline'] = "\r\n";
        $ci->email->initialize($config);
        $ci->email->from('xxx@gmail.com', 'Rumahweb');
        $list = array('xxx@xxxx.com');
        $ci->email->to($list);
        $ci->email->subject('judul email');
        $ci->email->message('isi email');
        if ($this->email->send()) {
        echo 'Email sent.';
        } else {
        show_error($this->email->print_debugger());
        }
		/*$data = array(
			'JUDUL' => $judul,
			'PENGUMUMAN' => $isi,
			'KELAS' => $kelas,
			'SISWA' => $siswa,
			'TANGGAL_TERBIT' => date("Y-m-d H:i:s")
		);
		$this->model_all->setPengumuman('pengumuman', $data);*/
		redirect('sd/admin/home/pengumuman');
	}

	public function detailPengumuman($id)
	{
		
		$this->cek_sesi();
		$data['pengumuman'] = $this->model_all->getPengumumanById($id);
	
		$data['title'] = "Pengumuman - SD Anak Saleh Malang";

		$data['page'] = 'sd/admin/view_detail_pengumuman';
		$this->load->view($this->_template,$data);
	}

	public function pengguna()
	{
		$this->cek_sesi();
		$data['user'] = $this->model_all->getAllUser();
		$data['siswa'] = $this->model_all->getAllSiswa();
		$data['pegawai'] = $this->model_all->getAllPegawai();

		$data['title'] = "Pengguna - SD Anak Saleh Malang";

		$data['page'] = 'sd/admin/view_pengguna';
		$this->load->view($this->_template,$data);
	}

	//END SETTING

	//START PEMBAYARAN
	public function pembayaranLain()
	{
		$this->cek_sesi();
		$data['lain'] = $this->model_all->getAllPembayaranLain();

		$data['title'] = "Tagihan Siswa - SD Anak Saleh Malang";

		$data['page'] = 'sd/admin/view_pembayaran_lain';
		$this->load->view($this->_template,$data);
	}
	
	public function tambahPembayaranLain()
	{
		$this->cek_sesi();
		$data['title'] = "Tagihan Siswa - SD Anak Saleh Malang";

		$data['page'] = 'sd/admin/view_tambah_pembayaran_lain';
		$this->load->view($this->_template,$data);
	}

	public function prosesBayarLain()
	{
		$this->cek_sesi();
		$data['title'] = "Tagihan Siswa - SD Anak Saleh Malang";

		$nama = $this->input->post('nama');
		$nominal = $this->input->post('nominal');
		$batas = $this->input->post('batastgl');
		$keterangan = $this->input->post('keterangan');

		$data = array(
			'NAMA_KEGIATAN' => $nama,
			'JUMLAH_BIAYA' => $nominal,
			'BATAS_BAYAR' => $batas,
			'KETERANGAN' => $keterangan
		);
		$this->model_all->setPembayaranLain('tb_pembayaran_lain', $data);
		redirect('sd/admin/home/pembayaranLain');
	}

	public function detailBayarLain()
	{
		$this->cek_sesi();
		$data['spp'] = $this->model_all->getAllSiswa();

		$data['title'] = "Tagihan SPP - SD Anak Saleh Malang";

		$data['page'] = 'sd/admin/view_detail_pembayaran_lain';
		$this->load->view($this->_template,$data);
	}
	
	public function tagihanSPP()
	{
		$this->cek_sesi();
		$data['spp'] = $this->model_all->getTagihanSppTk();
		//print_r($this->db->last_query());die;
        //print_r($data['spp']);die;
		$data['title'] = "Tagihan SPP - SD Anak Saleh Malang";

		$data['page'] = 'sd/admin/view_tagihan_spp';
		$this->load->view($this->_template,$data);
	}

	function detailSPP($id)
	{
		$this->cek_sesi();
		$data['spp'] = $this->model_all->getTagihanSPPByID($id);
		$data['mon'] = $this->model_all->getBulanSPP();
		$data['tahun'] = $this->model_all->getTahunAktif();
		//print_r($data['spp']);die;
		$data['title'] = "Detail Tagihan SPP - SD Anak Saleh Malang";

		$data['page'] = 'sd/admin/view_detail_tagihan_spp';
		$this->load->view($this->_template,$data);
	}
    
    public function tambahTagihan()
	{
		$this->cek_sesi();
		$data['siswa'] = $this->model_all->getAllSiswa();
		//print_r($this->db->last_query());die;
        //print_r($data['spp']);die;
		$data['title'] = "Buat Tagihan SPP - SD Sekolah Anak Saleh Malang";

		$data['page'] = 'sd/admin/view_tambah_tagihan';
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
		redirect('sd/admin/data-tagihan');
	}

	function bayarSPP($id, $bulan)
	{
        //echo $bulan;die;
		$this->cek_sesi();

		$nominal = $this->input->post('nominal');
		$tahuntagihan = $this->input->post('tahun');
		$data['tahun'] = $this->model_all->getTahunAktif();
		$tahun = 	$data['tahun']->TAHUN.$data['tahun']->SEMESTER;
		
        if($bulan == "7" || $bulan == "8" || $bulan == "9" || $bulan == "10" || $bulan == "11" || $bulan == "12" ){
		$data = array(
			'NIS' => $id,
			'BULAN' => $bulan,
			'TAHUN' => $data['tahun']->TAHUN,
			'NOMINAL' => $nominal,
			'TAHUNAKTIF' => $tahun,
			'TANGGAL' => date("Y-m-d"),
			'STATUS' => 1
		);
            
		//print_r($data);die;
        $this->model_all->setBayarSPP('tb_pembayaran_spp', $data);
        }else{
		
            $data = array(
			'NIS' => $id,
			'BULAN' => $bulan,
			'TAHUN' => $data['tahun']->TAHUN+1,
			'NOMINAL' => $nominal,
			'TAHUNAKTIF' => $tahun,
			'TANGGAL' => date("Y-m-d"),
			'STATUS' => 1
		);
            
		//print_r($data);die;
        $this->model_all->setBayarSPP('tb_pembayaran_spp', $data);
        }

		redirect("sd/admin/home/detailSPP/$id");
	}

	function kustomSPP()
	{
		$this->cek_sesi();
		$data['spp'] = $this->model_all->getEnrollSPP();
		
		$data['title'] = "Detail Tagihan SPP - SD Anak Saleh Malang";

		$data['page'] = 'sd/admin/view_custom_spp';
		$this->load->view($this->_template,$data);
	}

	function editSPP($id)
	{
		$this->cek_sesi();
		$nominal 	   = $this->input->post('nominal');
		$data['tahun'] = $this->model_all->getTahunAktif();
		$tahun 		   = $data['tahun']->TAHUN.$data['tahun']->SEMESTER;
		
		$data = array(
			'NOMINAL_SPP' => $nominal
		);
		//print_r($data);die;
		$this->model_all->updateKustomSPP($id, $nominal);
		redirect("sd/admin/home/kustomSPP");
	}

	function dataTagihan()
	{
		$this->cek_sesi();
		$data['spp'] = $this->model_all->getEnrollSPP();
		
		$data['title'] = "Data Tagihan - SD Anak Saleh Malang";

		$data['page'] = 'sd/admin/view_data_tagihan';
		$this->load->view($this->_template,$data);
	}

	function historiTagihan()
	{
		$this->cek_sesi();
		$data['spp'] = $this->model_all->getEnrollSPP();
		
		$data['title'] = "Data Tagihan - SD Anak Saleh Malang";

		$data['page'] = 'sd/admin/view_history_tagihan';
		$this->load->view($this->_template,$data);
	}
    
	//END PEMBAYARAN

	//START MATKUL
	function mataKuliah()
	{
		$this->cek_sesi();
		$data['matkul'] = $this->model_all->getMatkul();
		
		$data['title'] = "Data Mata Pelajaran - SD Anak Saleh Malang";

		$data['page'] = 'sd/admin/view_mata_pelajaran';
		$this->load->view($this->_template,$data);
	}

	function tambahMataKuliah()
	{
		$this->cek_sesi();
		$data['kelas'] = $this->model_all->getViewAllKelas();
		$data['guru'] = $this->model_all->getAllPegawai();
		
		$data['title'] = "Tambah Mata Pelajaran - SD Anak Saleh Malang";

		$data['page'] = 'sd/admin/view_tambah_mata_pelajaran';
		$this->load->view($this->_template,$data);
	}

	public function prosesMatkul()
	{
		$this->cek_sesi();
		
		$data['tahun'] = $this->model_all->getTahunAktif();
		$tahun = 	$data['tahun']->TAHUN.$data['tahun']->SEMESTER;

		$idmatkul  	 = $this->input->post('idmatpel');
		$matkul  	 = $this->input->post('matpel');
		$kkm  		 = $this->input->post('kkm');
		$kelas  	 = $this->input->post('kelas');
		$pengajar  	 = $this->input->post('pengajar');

		$data = array(
			'ID_MATA_PELAJARAN' => $idmatkul,
			'NAMA_MATA_PELAJARAN' => $matkul,
			'KKM' => $kkm,
			'KELAS' => $kelas,
			'PENGAJAR' => $pengajar,
			'TAHUN_AKTIF' => $tahun
		);
		//print_r($data);die;
		$this->model_all->setMatkul('tb_mata_pelajaran', $data);

		redirect('sd/admin/mata-pelajaran');
	}

	//END MATKUL

	//START LAPORAN
	public function laporanAbsensiSiswa(){
		$data['title'] = "Laporan Absensi Siswa";
		$data ['absensi'] = $this->model_all->getViewAllPresensiSiswa();

		$this->load->view('sd/admin/laporan_absensi_siswa',$data);
   }
	//END LAPORAN

	//START PESAN

    function Pesan(){
		$data['teman'] = $this->model_all->getAllUser();
		$data['title'] = "Pesan - SD Anak Saleh Malang";

		$data['page'] = 'sd/admin/view_chat';
		$this->load->view($this->_template,$data);
	}
    
	/*function Pesan(){
		//$data['teman'] = $this->model_all->getAllUser();
		$this->user = $this->db->get_where('a_user', array('ID' => $this->session->userdata('ID')), 1)->row();
		$data['teman'] = $this->db->where('ID !=', $this->user)->get('a_user');
		$data['title'] = "Pesan - SD Anak Saleh Malang";

		$data['page'] = 'admin/view_chat';
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
				->where('(send_by = '. $this->session->userdata('id') .' AND send_to = '. $friend->ID .')')
				->or_where('(send_to = '.$this->session->userdata('id') .' AND send_by = '. $friend->ID .')')
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
	//END PESAN
	/* 

	function tambahPesan($id){
		//$data['teman'] = $this->model_all->getPesanUserById($id);
		//$data['pribadi'] = $this->model_all->getPesanPribadi($this->session->userdata('username'));
		$data['pesan'] = $this->model_all->getPesan();
		//print_r($data['pesan']);die;
		$data['title'] = "Tambah Pesan - SD Anak Saleh Malang";

		$data['page'] = 'admin/view_tambah_chat';
		$this->load->view($this->_template,$data);
	}

	public function prosesPesan($id)
	{
		$this->cek_sesi();
		$data['penerima'] = $this->model_all->getUserById($id);
		//print_r($data['penerima']);die;
		
		$isi  	 = $this->input->post('isi');
		$data = array(
			'ID_PENGIRIM' => $this->session->userdata('username'),
			'ID_PENERIMA' => $data['penerima']->USERNAME,
			'PESAN' => $isi,
			'TANGGAL_KIRIM' => date("Y-m-d")
		);
		//print_r($data);die;
		$this->model_all->setMatkul('pesan', $data);

		redirect('admin/home/tambahPesan/'.$id);
	}

	*/
    
    //LAPORAN
    
    function pilihLaporan()
	{
		$this->cek_sesi();
		$data['title'] = "Laporan Keuangan - SD ANAK SALEH";

		$data['page'] = 'sd/admin/view_pilih_laporan';
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
		$data['page'] = 'sd/admin/view_laporan';
		$this->load->view($this->_template,$data);
	}
    
     public function LaporanPembayaran()
	{
		$this->cek_sesi();
        $data['tahun'] = $this->model_all->getTahunAktif();
		$tahun         = $data['tahun']->TAHUN.$data['tahun']->SEMESTER;
        
		$data['spp'] = $this->model_all->getPembayaranSD($tahun);
		
		$this->load->view("sd/admin/laporan_pembayaran", $data);
	}
    
        // START IMPORT DATA
	
	public function doImportSiswa()
    {
		$this->cek_sesi();
        // Load plugin PHPExcel nya
        include APPPATH.'third_party/PHPExcel/PHPExcel.php';

        $config['upload_path']      = './upload/excel/excel-siswa';
        $config['allowed_types']    = 'xlsx|xls|csv';
        $config['max_size']         = '100';
        $config['encrypt_name']     = true;

        $this->load->library('upload', $config);
		$this->upload->initialize($config);
        
        
        if (!$this->upload->do_upload()) {

            //upload gagal
            $this->session->set_flashdata('notif', '<div class="alert alert-danger"><b>PROSES IMPORT GAGAL!</b> '.$this->upload->display_errors().'</div>');

            redirect('paud/admin/import-siswa/');
        } else {

            $data_upload = $this->upload->data();

            $excelreader     = new PHPExcel_Reader_Excel2007();
            $loadexcel         = $excelreader->load('upload/excel/excel-siswa/'.$data_upload['file_name'].'- PAUD'); // Load file yang telah diupload ke folder excel
            $sheet             = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);

            $data = array();

            $numrow = 1;
            foreach($sheet as $row){
                            if($numrow > 1){
                                array_push($data, array(
                                    'NIS'                           => $row['A'],
                                    'NISN'                          => $row['B'],
                                    'NAMA_SISWA'                    => $row['C'],
                                    'PANGGILAN'                     => $row['D'],
                                    'EMAIL'                         => $row['E'],
                                    'JENIS_KELAMIN'                 => $row['F'],
                                    'GOLONGAN_DARAH'                => $row['G'],
                                    'AGAMA'                         => $row['H'],
                                    'STATUS_DALAM_KELUARGA'         => $row['I'],
                                    'NOMOR_TELEPON_RUMAH'           => $row['J'],
                                    'ALAMAT_RUMAH'                  => $row['K'],
                                    'RT'                            => $row['L'],
                                    'RW'                            => $row['M'],
                                    'KELURAHAN'                     => $row['N'],
                                    'KECAMATAN'                     => $row['O'],
                                    'KOTA'                          => $row['P'],
                                    'PROVINSI'                      => $row['Q'],
                                    'KODE_POS'                      => $row['R'],
                                    'ANAK_KE'                       => $row['S'],
                                    'JUMLAH_SAUDARA'                => $row['T'],
                                    'BERAT_BADAN'                   => $row['U'],
                                    'TINGGI_BADAN'                  => $row['V'],
                                    'JARAK_RUMAH'                   => $row['W'],
                                    'WAKTU_TEMPUH'                  => $row['X'],
                                    'NO_AKTA'                       => $row['Y'],
                                    'NIK'                           => $row['Z'],
                                    'ALAMAT_RUMAH_KK'               => $row['AA'],
                                    'RT_KK'                         => $row['AB'],
                                    'RW_KK'                         => $row['AC'],
                                    'KELURAHAN_KK'                  => $row['AD'],
                                    'KECAMATAN_KK'                  => $row['AE'],
                                    'KOTA_KK'                       => $row['AF'],
                                    'PROVINSI_KK'                   => $row['AG'],
                                    'KODE_POS_KK'                   => $row['AH'],
                                    'KEWARGANEGARAAN'               => $row['AI'],
                                    'KELAS'                         => $row['AJ'],
                                    'TEMPAT_LAHIR'                  => $row['AK'],
                                    'TANGGAL_LAHIR'                 => $row['AL'],
                                    'NAMA_AYAH'                     => $row['AM'],
                                    'NIK_AYAH'                      => $row['AN'],
                                    'TEMPAT_LAHIR_AYAH'             => $row['AO'],
                                    'TANGGAL_LAHIR_AYAH'            => $row['AP'],
                                    'NOMOR_HANDPHONE_AYAH'          => $row['AQ'],
                                    'PENDIDIKAN_AYAH'               => $row['AR'],
                                    'PEKERJAAN_AYAH'                => $row['AS'],
                                    'INSTANSI_AYAH'                 => $row['AT'],
                                    'ALAMAT_INSTANSI_AYAH'          => $row['AU'],
                                    'NOMOR_TELEPON_INSTANSI_AYAH'   => $row['AV'],
                                    'PENGHASILAN_AYAH'              => $row['AW'],
                                    'EMAIL_AYAH'                    => $row['AX'],
                                    'NAMA_IBU'                      => $row['AY'],
                                    'NIK_IBU'                       => $row['AZ'],
                                    'TEMPAT_LAHIR_IBU'              => $row['BA'],
                                    'TANGGAL_LAHIR_IBU'             => $row['BB'],
                                    'NOMOR_HANDPHONE_IBU'           => $row['BC'],
                                    'PENDIDIKAN_IBU'                => $row['BD'],
                                    'PEKERJAAN_IBU'                 => $row['BE'],
                                    'INSTANSI_IBU'                  => $row['BF'],
                                    'ALAMAT_INSTANSI_IBU'           => $row['BG'],
                                    'NOMOR_TELEPON_INSTANSI_IBU'    => $row['BH'],
                                    'PENGHASILAN_IBU'               => $row['BI'],
                                    'EMAIL_IBU'                     => $row['BJ'],
                                    'NAMA_WALI'                     => $row['BK'],
                                    'NIK_WALI'                      => $row['BL'],
                                    'TEMPAT_LAHIR_WALI'             => $row['BM'],
                                    'TANGGAL_LAHIR_WALI'            => $row['BN'],
                                    'NOMOR_HANDPHONE_WALI'          => $row['BO'],
                                    'PENDIDIKAN_WALI'               => $row['BP'],
                                    'PEKERJAAN_WALI'                => $row['BQ'],
                                    'INSTANSI_WALI'                 => $row['BR'],
                                    'ALAMAT_INSTANSI_WALI'          => $row['BS'],
                                    'NOMOR_TELEPON_INSTANSI_WALI'   => $row['BT'],
                                    'PENGHASILAN_WALI'              => $row['BU'],
                                    'EMAIL_WALI'                    => $row['BV'],
                                    'TAHUN_MASUK'                   => $row['BW'],
                                    'NOMOR_DAFTAR_ULANG'            => $row['BX'],
                                    'LEVEL'                         => "PAUD",
                                    'PASSWORD'                      => "12345678"
                                ));
                    }
                $numrow++;
            }
            $this->db->insert_batch('tb_siswa', $data);
            //delete file from server
            unlink(realpath('upload/excel/excel-siswa/'.$data_upload['file_name'].'- PAUD'));

            //upload success
            $this->session->set_flashdata('notif', '<div class="alert alert-success"><b>PROSES IMPORT BERHASIL!</b> Data berhasil diimport!</div>');
            //redirect halaman
            redirect('sd/admin/import-siswa/');

        }
    }
    
    public function doImportPegawai()
    {
		$this->cek_sesi();
        // Load plugin PHPExcel nya
        include APPPATH.'third_party/PHPExcel/PHPExcel.php';

        $config['upload_path']      = './upload/excel/excel-pegawai';
        $config['allowed_types']    = 'xlsx|xls|csv';
        $config['max_size']         = '10000';
        $config['encrypt_name']     = true;

        $this->load->library('upload', $config);
		$this->upload->initialize($config);
        if (!$this->upload->do_upload()) {

            //upload gagal
            $this->session->set_flashdata('notif', '<div class="alert alert-danger"><b>PROSES IMPORT GAGAL!</b> '.$this->upload->display_errors().'</div>');

            redirect('sd/admin/import-pegawai/');
        } else {

            $data_upload = $this->upload->data();

            $excelreader     = new PHPExcel_Reader_Excel2007();
            $loadexcel         = $excelreader->load('upload/excel/excel-pegawai/'.$data_upload['file_name'].''); // Load file yang telah diupload ke folder excel
            $sheet             = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);

            $data = array();

            $numrow = 1;
            foreach($sheet as $row){
                            if($numrow > 1){
                                array_push($data, array(
                                    'NIP'               => $row['A'],
                                    'NUPTK'             => $row['B'],
                                    'NAMA_LENGKAP'      => $row['C'],
                                    'TEMPAT_LAHIR'      => $row['D'],
                                    'TANGGAL_LAHIR'     => $row['E'],
                                    'ALAMAT'            => $row['F'],
                                    'EMAIL'             => $row['G'],
                                    'JENIS_KELAMIN'     => $row['H'],
                                    'STATUS_PEGAWAI'    => $row['I'],
                                    'NOMOR_TELEPON'     => $row['J'],
                                    'NOMOR_HANDPHONE'   => $row['K'],
                                    'NO_FINGERPRINT'    => $row['L'],
                                    'MULAI_BEKERJA'     => $row['M'],
                                    'LEVEL'             => "PAUD",
                                    'PASSWORD'          => "12345678"
                                ));
                    }
                $numrow++;
            }
            $this->db->insert_batch('tb_pegawai', $data);
            //delete file from server
            unlink(realpath('upload/excel/excel-pegawai/'.$data_upload['file_name'].''));

            //upload success
            $this->session->set_flashdata('notif', '<div class="alert alert-success"><b>PROSES IMPORT BERHASIL!</b> Data berhasil diimport!</div>');
            //redirect halaman
            redirect('sd/admin/import-pegawai/');

        }
    }

}
?>